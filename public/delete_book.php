<?php
require_once __DIR__ . '/../src/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_book'])) {
    $id_book = $_POST['id_book'];
    // nếu sách có trong bảng review thì xóa 
    $sql_delete_review = "DELETE FROM review WHERE id_book = ?";
    $stmt_delete_review = $pdo->prepare($sql_delete_review);
    $stmt_delete_review->execute([$id_book]);

    // nếu sách có trong bảng readingHistory thì xóa 
    $sql_delete_readinghistory = "DELETE FROM readingHistory WHERE id_book = ?";
    $stmt_delete_readinghistory = $pdo->prepare($sql_delete_readinghistory);
    $stmt_delete_readinghistory->execute([$id_book]);
    
    // nếu sách có trong bảng favourite thì xóa 
    $sql_delete_favourite = "DELETE FROM favourite WHERE id_book = ?";
    $stmt_delete_favourite = $pdo->prepare($sql_delete_favourite);
    $stmt_delete_favourite->execute([$id_book]);
    
    
    // Truy vấn để lấy đường dẫn của hình ảnh sách và file sách cần xóa
    $sql_get_image_path = "SELECT image_book, file_book FROM book WHERE id_book = ?";
    $stmt_get_image_path = $pdo->prepare($sql_get_image_path);
    $stmt_get_image_path->execute([$id_book]);
    $row = $stmt_get_image_path->fetch(PDO::FETCH_ASSOC);

    $image_path = $row['image_book'];
    $file_path = $row['file_book'];

    // Xóa hình ảnh sách từ thư mục
    if ($image_path && file_exists($image_path)) {
        unlink($image_path);
    }

    // Xóa file sách từ thư mục
    if ($file_path && file_exists($file_path)) {
        unlink($file_path);
    }



    // xóa sách
    $sql = "DELETE FROM book WHERE id_book = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_book]);

    redirect("manage_book.php");
    
}

?>