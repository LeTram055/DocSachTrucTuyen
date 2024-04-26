<?php
require_once __DIR__ . '/../src/connect.php';

$genre = $_GET['name_genre'] ??'';
$sort = $_GET['sort'] ??'';

if(isset($sort) && $sort=='asc'){

$sql = "SELECT id_book, image_book, name_book
        FROM book
        WHERE id_genre = (SELECT id_genre FROM genre WHERE name_genre = ?)
        ORDER BY name_book ASC";

} else if(isset($sort) && $sort== "desc"){
$sql = "SELECT id_book, image_book, name_book
        FROM book
        WHERE id_genre = (SELECT id_genre FROM genre WHERE name_genre = ?)
        ORDER BY name_book DESC";

}else{
$sql = "SELECT id_book, image_book, name_book
        FROM book
        WHERE id_genre = (SELECT id_genre FROM genre WHERE name_genre = ?)";
}

$stmt = $pdo->prepare($sql);
$stmt->execute([$genre]);
$rows = $stmt->fetchALL(PDO::FETCH_ASSOC);

include_once __DIR__. '/../src/partials/header.php';
?>

<div class="container flex-grow-1">
    <div class="row my-5">
        <h2 class="text-center mb-4"><?= mb_strtoupper($genre) ?></h2>
        <div class="row">
            <div class="dropdown">
                <a class="btn btn-outline-dark dropdown-toggle sort-btn" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Sắp xếp
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="book.php?name_genre=<?= urlencode($genre) ?>&sort=asc">A-Z</a>
                    </li>
                    <li><a class="dropdown-item" href="book.php?name_genre=<?= urlencode($genre) ?>&sort=desc">Z-A</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <?php foreach ($rows as $row) : ?>
            <div class="col-md-3 col-sm-6">
                <a href="detail_book.php?id_book=<?= $row['id_book'] ?>" class="book-link">
                    <div class="book-item">
                        <img src="<?= $row['image_book'] ?>" alt="<?= html_escape($row['name_book']) ?>"
                            class="img-fluid book-image">
                        <h5><?= html_escape($row['name_book']) ?></h5>
                    </div>
                </a>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?php
include_once __DIR__. '/../src/partials/footer.php'
?>