<?php
session_start();
require_once __DIR__ . '/../src/connect.php';

if (isset($_SESSION['user'])&& isset($_SESSION['user']['email']) && isset($_POST['id_book'])) {
    $id_book = $_POST['id_book'];
    $email = $_SESSION['user']['email'];
    
    // Kiểm tra xem sách đã được thêm vào yêu thích chưa
    $stmt_check = $pdo->prepare("SELECT * FROM favourite WHERE email = ? AND id_book = ?");
    $stmt_check->execute([$email, $id_book]);
    if ($stmt_check->rowCount() == 0) {
        // Nếu sách chưa được thêm vào yêu thích, thêm vào danh sách yêu thích
        $stmt_insert = $pdo->prepare("INSERT INTO favourite (email, id_book) VALUES (?, ?)");
        if ($stmt_insert->execute([$email, $id_book])) {
            // Đã thêm vào yêu thích thành công
            echo "added";
        } else {
            // Lỗi khi thêm vào yêu thích
            echo "error";
        }
    } else {
        // Sách đã có trong danh sách yêu thích, xóa khỏi danh sách yêu thích
        $stmt_remove = $pdo->prepare("DELETE FROM favourite WHERE email = ? AND id_book = ?");
        if ($stmt_remove->execute([$email, $id_book])) {
            // Đã xóa khỏi yêu thích thành công
            echo "removed";
        } else {
            // Lỗi khi xóa khỏi yêu thích
            echo "error";
        }
    }
} else {
    // Người dùng chưa đăng nhập
    echo '<script>
            alert("Vui lòng đăng nhập để thêm vào yêu thích.");
            window.history.back();
        </script>';
}
?>