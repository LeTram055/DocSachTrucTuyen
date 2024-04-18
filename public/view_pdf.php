<?php
require_once __DIR__ . '/../src/connect.php';

if (isset($_GET['id_book'])) {
    $id_book = $_GET['id_book'];
    $sql = "SELECT file
            FROM book
            WHERE id_book = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_book]);
    $pdf_path = $stmt->fetch(PDO::FETCH_ASSOC);
}

include_once __DIR__. '/../src/partials/header.php';
?>

<div class="container">
    <iframe src="<?= $pdf_path['file'] ?>" width="100%" height="650px"></iframe>
</div>

<?php
include_once __DIR__. '/../src/partials/footer.php'
?>