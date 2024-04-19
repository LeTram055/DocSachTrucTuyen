<?php
session_start();
require_once __DIR__ . '/../src/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_book']) && isset($_POST['content'])) {
    $id_book = $_POST['id_book'];
    $content = $_POST['content'];
    if (isset($_SESSION['user']) && isset($_SESSION['user']['email'])) {
        $email = $_SESSION['user']['email'];
        // Thêm đánh giá vào cơ sở dữ liệu
        $sql_insert_review = "INSERT INTO review (content, date_review, email, id_book) VALUES (?, NOW(), ?, ?)";
        $stmt_insert_review = $pdo->prepare($sql_insert_review);
        $stmt_insert_review->execute([$content, $email, $id_book]);
        redirect("detail_book.php?id_book=$id_book");
    } else {
    // Người dùng chưa đăng nhập
    echo '<script>
            alert("Vui lòng đăng nhập để thêm bình luận.");
            window.history.back();
        </script>';
    }

}
?>