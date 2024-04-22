<?php
require_once __DIR__ . '/../src/connect.php';

$id_book = $_GET['id_book'];

// Lấy thông tin về sách cần tải
$sql = "SELECT file FROM book WHERE id_book = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_book]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if ($book) {
    // Đường dẫn đến tệp sách
    $file_path = $book['file'];

    if (file_exists($file_path)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        header('Content-Length: ' . filesize($file_path));

        // Đọc và gửi dữ liệu từ tệp cho người dùng
        readfile($file_path);
        exit; 
    } else {
        exit("Tệp không tồn tại");
    }
} else {
    exit("Không tìm thấy thông tin sách");
}
?>