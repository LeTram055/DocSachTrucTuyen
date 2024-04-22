<?php
session_start();
require_once __DIR__ . '/../src/connect.php';

$email = $_SESSION['user']['email'];
$type = isset($_GET['type']) ? $_GET['type'] : 'read';

if ($type === 'read') {
    // Truy vấn sách đã đọc
    $sql = "SELECT b.id_book, b.image, b.name_book 
            FROM readingHistory rh
            JOIN book b 
            ON rh.id_book = b.id_book
            WHERE rh.email = ?";
} elseif ($type === 'favourite') {
    // Truy vấn sách yêu thích
    $sql = "SELECT b.id_book, b.image, b.name_book 
            FROM favourite f
            JOIN book b 
            ON f.id_book = b.id_book
            WHERE f.email = ?";
}

$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


include_once __DIR__. '/../src/partials/header.php'
?>

<div class="container flex-grow-1">
    <div class="row justify-content-center m-5">
        <?php if ($type === 'read') {
            echo '<h2 class="text-center mb-5">SÁCH ĐÃ ĐỌC</h2>';
        } elseif ($type === 'favourite') {
            echo '<h2 class="text-center mb-5">SÁCH YÊU THÍCH</h2>';
        }
            ?>

        <div class="row">
            <div class="col-2">
                <ul class="list-group list-group-flush  border rounded-2">
                    <li class="list-group-item p-2 <?php echo $type === 'read' ? 'selected' : ''; ?>"><a
                            href="?type=read" class="link"><i class="fa-solid fa-heart"></i> Sách đã đọc</a></li>
                    <li class="list-group-item p-2 <?php echo $type === 'favourite' ? 'selected' : ''; ?>"><a
                            href="?type=favourite" class="link"><i class="fa-solid fa-book-open-reader"></i> Sách yêu
                            thích</a></li>

                </ul>
            </div>
            <div class="col-10 border rounded-2">
                <div class="row">
                    <?php foreach ($rows as $row) : ?>
                    <div class="col-md-4 col-sm-6">
                        <a href="detail_book.php?id_book=<?= $row['id_book'] ?>" class="book-link">
                            <div class="book-item">
                                <img src="<?= $row['image'] ?>" alt="<?= html_escape($row['name_book']) ?>"
                                    class="img-fluid book-image">
                                <h5><?= html_escape($row['name_book']) ?></h5>
                            </div>
                        </a>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>

        </div>

    </div>
</div>

<?php
include_once __DIR__. '/../src/partials/footer.php'
?>