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
    
    // xóa sách
    $sql = "DELETE FROM book WHERE id_book = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_book]);

    redirect("manage_book.php");
    
}

?>