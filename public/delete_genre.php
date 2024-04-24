<?php
require_once __DIR__ . '/../src/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_genre'])) {
    $id_genre = $_POST['id_genre'];

    // $sql_check = "SELECT COUNT(*) FROM book
    //                     WHERE id_genre = ?";
    // $stmt_check = $pdo->prepare($sql_check);
    // $stmt_check->execute([$id_genre]);
    // $order_count = $stmt_check->fetchColumn();

    // if ($order_count > 0) {
    //     echo "<script>
    //             alert('Không thể xóa vì loại hàng này đang có sản phẩm tham chiếu.');
    //             window.location.href = 'manage_genre.php';
    //         </script>";
    //     exit(); 
    // }

    // xóa loại
    $sql = "DELETE FROM loai WHERE maloai = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_genre]);

    redirect("manage_genre.php");
    
}

?>