<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../src/connect.php';

if (isset($_GET['id_book'])) {
    $id_book = $_GET['id_book'];
    $sql = "SELECT b.name_book, b.author, b.image, b.describe, g.name_genre
            FROM book b
            JOIN genre g
            ON b.id_genre = g.id_genre
            WHERE b.id_book = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_book]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

include_once __DIR__. '/../src/partials/header.php';
?>

<div class="container">
    <div class="row justify-content-center m-5">
        <h2 class="text-center mb-5">CHI TIẾT SÁCH</h2>
        <div class="col-md-4 col-sm p-2 d-flex justify-content-center align-items-center">
            <img class="detail-book-image" src="<?= $row['image'] ?>" alt="<?= html_escape($row['name_book']) ?>">
        </div>
        <div class="col-md-8 col-sm p-2">
            <h4 class="detail-book-name"><?= html_escape($row['name_book']) ?></h4>
            <p style="text-align: justify;">Tác giả: <?= html_escape($row['author']) ?></p>
            <p style="text-align: justify;">Thể loại: <?= html_escape($row['name_genre']) ?></p>
            <p style="text-align: justify;"><?= html_escape($row['describe']) ?></p>
            <a href="view_pdf.php?id_book=<?= $id_book ?>" class="btn btn-primary">Đọc sách</a>
        </div>

    </div>

</div>

<?php
include_once __DIR__. '/../src/partials/footer.php'
?>