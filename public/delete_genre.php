<?php
require_once __DIR__ . '/../src/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_genre'])) {
    $id_genre = $_POST['id_genre'];

    $sql_check = "SELECT COUNT(*) FROM book
                        WHERE id_genre = ?";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([$id_genre]);
    $order_count = $stmt_check->fetchColumn();

    if ($order_count > 0) {
        echo "<script>
                alert('Không thể xóa vì thể loại hàng này đang có sách tham chiếu.');
                window.location.href = 'manage_genre.php';
            </script>";
        exit(); 
    }

    //lấy tên loại
    $sql_get_name_genre = "SELECT name_genre FROM genre WHERE id_genre = ?";
    $stmt_get_name_genre = $pdo->prepare($sql_get_name_genre);
    $stmt_get_name_genre->execute([$id_genre]);
    $name_genre = $stmt_get_name_genre->fetchColumn();

    // xóa loại
    $sql = "DELETE FROM genre WHERE id_genre = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_genre]);

    //Xóa thư mục
    $image_folder = 'images/' . $name_genre;
    $file_folder = 'files/' . $name_genre;

    if (file_exists($image_folder)) {
        rmdir($image_folder);
    }

    if (file_exists($file_folder)) {
        rmdir($file_folder);
    }


    redirect("manage_genre.php");
    
}

?>