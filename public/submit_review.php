<?php
session_start();
require_once __DIR__ . '/../src/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_book']) && isset($_POST['content'])) {
    $id_book = $_POST['id_book'];
    $content = $_POST['content'];
    
    if (isset($_SESSION['user']) && isset($_SESSION['user']['email'])) {
        $email = $_SESSION['user']['email'];

        // Kiểm tra xem người dùng đã đọc sách đó chưa
        $sql_check_reading = "SELECT * FROM readinghistory WHERE email = ? AND id_book = ?";
        $stmt_check_reading = $pdo->prepare($sql_check_reading);
        $stmt_check_reading->execute([$email, $id_book]);

        if ($stmt_check_reading->rowCount() > 0) {
            // Thêm đánh giá vào cơ sở dữ liệu
            $sql_insert_review = "INSERT INTO review (content, date_review, email, id_book) VALUES (?, NOW(), ?, ?)";
            $stmt_insert_review = $pdo->prepare($sql_insert_review);
            $stmt_insert_review->execute([$content, $email, $id_book]);
            redirect("detail_book.php?id_book=$id_book");
        } else {
            // Người dùng chưa đọc sách
            echo '<script>
            alert("Bạn cần đọc sách trước khi đánh giá.");
            window.history.back();
        </script>';
        }
    } else {
    // Người dùng chưa đăng nhập
    echo '<script>
            alert("Vui lòng đăng nhập để thêm đánh giá.");
            window.history.back();
        </script>';
    }

}
?>