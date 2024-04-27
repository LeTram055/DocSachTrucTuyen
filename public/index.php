<?php
require_once __DIR__ . '/../src/connect.php';
require_once __DIR__ . '/../vendor/autoload.php'; 

// Mảng chứa các loại sản phẩm
$sql_genre = "SELECT name_genre FROM genre";
$stmt_genre = $pdo->prepare($sql_genre);
$stmt_genre->execute();
$genres = $stmt_genre->fetchAll(PDO::FETCH_ASSOC);


$sql_popular = "SELECT b.id_book, b.name_book, b.image_book, COUNT(r.id_book) AS reading_count
        FROM book b
        LEFT JOIN readinghistory r 
        ON b.id_book = r.id_book
        GROUP BY b.id_book
        ORDER BY reading_count DESC
        LIMIT 4";
$stmt_popular = $pdo->prepare($sql_popular);
$stmt_popular->execute();
$popular = $stmt_popular->fetchAll(PDO::FETCH_ASSOC);


include_once __DIR__. '/../src/partials/header.php'
?>

<div class="container">
    <div class="row">

        <div class="col">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/banner1.jpg" class="d-block w-100 h-50" alt="banner1">
                    </div>
                    <div class="carousel-item">
                        <img src="images/banner2.jpg" class="d-block w-100 h-50" alt="banner2">
                    </div>
                    <div class="carousel-item">
                        <img src="images/banner3.jpg" class="d-block w-100 h-50" alt="banner3">
                    </div>
                    <div class="carousel-item">
                        <img src="images/banner4.jpg" class="d-block w-100 h-50" alt="banner4">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>

    <div class="row my-5">
        <div class="row">
            <div class="col-6">
                <h2>SÁCH PHỔ BIẾN</h2>
            </div>

        </div>
        <hr class="line">
        <div class="row justify-content-center">
            <?php foreach ($popular as $row) : ?>
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


    <?php foreach ($genres as $genre) : ?>
    <?php
    $sql = "SELECT name_book, image_book, id_book
            FROM book
            WHERE id_genre = (SELECT id_genre FROM genre WHERE name_genre = ?)
            LIMIT 4";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$genre['name_genre']]);
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="row my-5">
        <div class="row">
            <div class="col-6">
                <h2><?= mb_strtoupper($genre['name_genre']) ?></h2>
            </div>
            <div class="col-6 text-end pt-2">
                <a href="book.php?name_genre=<?= urlencode($genre['name_genre']) ?>" class="link view-all">Xem tất cả
                    sách
                    &gt;</a>
            </div>
        </div>
        <hr class="line">
        <div class="row justify-content-center">
            <?php foreach ($books as $book) : ?>
            <div class="col-md-3 col-sm-6">
                <a href="detail_book.php?id_book=<?= $book['id_book'] ?>" class="book-link">
                    <div class="book-item">
                        <img src="<?= $book['image_book'] ?>" alt="<?= html_escape($book['name_book']) ?>"
                            class="img-fluid book-image">
                        <h5><?= html_escape($book['name_book']) ?></h5>
                    </div>
                </a>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <?php endforeach ?>


</div>

<?php
include_once __DIR__. '/../src/partials/footer.php'
?>