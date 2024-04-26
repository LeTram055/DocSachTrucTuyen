<?php
session_start();
require_once __DIR__ . '/../src/connect.php';

if (isset($_GET['id_book'])) {
    $id_book = $_GET['id_book'];
    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if (isset($_SESSION['user']) && isset($_SESSION['user']['email'])) {
        // Lấy thông tin người dùng đang đọc sách
        $email = $_SESSION['user']['email'];
        
        // Kiểm tra xem đã có thông tin về cuốn sách trong bảng readingHistory chưa
        $sql_check = "SELECT * FROM readingHistory WHERE id_book = ? AND email = ?";
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->execute([$id_book, $email]);
        $existing_record = $stmt_check->fetch(PDO::FETCH_ASSOC);
        
        if ($existing_record) {
            // Nếu đã tồn tại thông tin, cập nhật ngày
            $sql_update = "UPDATE readingHistory SET date_reading = NOW() WHERE id_book = ? AND email = ?";
            $stmt_update = $pdo->prepare($sql_update);
            $stmt_update->execute([$id_book, $email]);
        } else {
            // Nếu chưa có thông tin, chèn bản ghi mới
            $sql_insert = "INSERT INTO readingHistory (id_book, email, date_reading) VALUES (?, ?, NOW())";
            $stmt_insert = $pdo->prepare($sql_insert);
            $stmt_insert->execute([$id_book, $email]);
        }
    } else {
        // Nếu người dùng chưa đăng nhập, hiển thị thông báo yêu cầu đăng nhập
        echo '<script>alert("Vui lòng đăng nhập để lưu thông tin sách đã đọc.");</script>';
    }

    $sql = "SELECT file_book
            FROM book
            WHERE id_book = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_book]);
    $pdf_path = $stmt->fetch(PDO::FETCH_ASSOC);

}

include_once __DIR__. '/../src/partials/header.php';
?>

<div class="container flex-grow-1">

    <iframe id="view-pdf" src="<?= $pdf_path['file_book'] ?>" width="100%" height="650px"></iframe>
</div>


<?php
include_once __DIR__. '/../src/partials/footer.php'
?>