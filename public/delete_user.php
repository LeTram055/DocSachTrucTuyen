<?php
require_once __DIR__ . '/../src/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];
    // nếu user có trong bảng review thì xóa 
    $sql_delete_review = "DELETE FROM review WHERE email = ?";
    $stmt_delete_review = $pdo->prepare($sql_delete_review);
    $stmt_delete_review->execute([$email]);

    // nếu user có trong bảng readingHistory thì xóa 
    $sql_delete_readinghistory = "DELETE FROM readingHistory WHERE email = ?";
    $stmt_delete_readinghistory = $pdo->prepare($sql_delete_readinghistory);
    $stmt_delete_readinghistory->execute([$email]);
    
    // nếu user có trong bảng favourite thì xóa 
    $sql_delete_favourite = "DELETE FROM favourite WHERE email = ?";
    $stmt_delete_favourite = $pdo->prepare($sql_delete_favourite);
    $stmt_delete_favourite->execute([$email]);
    

    // xóa user
    $sql = "DELETE FROM user WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    redirect("manage_user.php");
    
}

?>