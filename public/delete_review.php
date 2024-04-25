<?php
require_once __DIR__ . '/../src/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_review'])) {
    $id_review = $_POST['id_review'];

    // xóa revieww
    $sql = "DELETE FROM review WHERE id_review = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_review]);

    // Quay lại trang trước đó
    if(isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        // Nếu không có trang trước đó, chuyển hướng về trang chính
        header("Location: index.php");
    }
    exit();
    
}

?>