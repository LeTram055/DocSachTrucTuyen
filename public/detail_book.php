<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../src/connect.php';
$id_book = $_GET['id_book'];

if ($id_book) {
    $id_book = $_GET['id_book'];
    $sql = "SELECT b.name_book, b.author, b.image_book, b.describe_book, g.name_genre
            FROM book b
            JOIN genre g
            ON b.id_genre = g.id_genre
            WHERE b.id_book = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_book]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

//Nút yêu thích

$is_favorite = false;
if (isset($_SESSION['user']['email'])) {
    $email = $_SESSION['user']['email'];
    $sql_check_favorite = "SELECT * FROM favourite WHERE email = ? AND id_book = ?";
    $stmt_check_favorite = $pdo->prepare($sql_check_favorite);
    $stmt_check_favorite->execute([$email, $id_book]);
    $is_favorite = $stmt_check_favorite->rowCount() > 0; 
}


// Lấy tất cả đánh giá của cuốn sách
$sort = $_GET['sort'] ??'';
if(isset($sort) && $sort=='asc'){

    $sql_reviews = "SELECT r.content, r.date_review, u.fullname 
                FROM review r
                JOIN user u ON r.email = u.email
                WHERE r.id_book = ?
                ORDER BY r.date_review ASC";

} else if(isset($sort) && $sort== "desc"){
    $sql_reviews = "SELECT r.content, r.date_review, u.fullname 
                FROM review r
                JOIN user u ON r.email = u.email
                WHERE r.id_book = ?
                ORDER BY r.date_review DESC";

}else{
    $sql_reviews = "SELECT r.content, r.date_review, u.fullname 
                FROM review r
                JOIN user u ON r.email = u.email
                WHERE r.id_book = ?";
}

$stmt_reviews = $pdo->prepare($sql_reviews);
$stmt_reviews->execute([$id_book]);
$reviews = $stmt_reviews->fetchAll(PDO::FETCH_ASSOC);

include_once __DIR__. '/../src/partials/header.php';
?>

<div class="container flex-grow-1">
    <div class="row justify-content-center m-4">
        <h2 class="text-center mb-4">CHI TIẾT SÁCH</h2>

        <div class="row mb-3 p-0">
            <div class="col">
                <button class="btn btn-light" id="goBackBtn"><i class="fa-solid fa-chevron-left"></i></button>
            </div>
        </div>


        <div class="col-md-4 col-sm pe-5 d-flex justify-content-center align-items-start">
            <div class="image-container">
                <img class="detail-book-image" src="<?= $row['image_book'] ?>"
                    alt="<?= html_escape($row['name_book']) ?>">
            </div>

        </div>
        <div class="col-md-8 col-sm ps-3">
            <div class="row">
                <div>
                    <h4 class="detail-book-name"><?= html_escape($row['name_book']) ?></h4>
                    <p style="text-align: justify;"><strong>Tác giả: </strong><?= html_escape($row['author']) ?></p>
                    <p style="text-align: justify;"><strong>Thể loại: </strong><?= html_escape($row['name_genre']) ?>
                    </p>
                    <p style="text-align: justify;"><?= html_escape($row['describe_book']) ?></p>
                </div>

                <div class="d-flex justify-content-start my-2">
                    <!-- Nút đọc sách -->
                    <a href="view_pdf.php?id_book=<?= $id_book ?>" class="read-btn me-3"><i
                            class="fas fa-book-open"></i> Đọc sách</a>
                    <!-- Nút tải sách -->
                    <a href="download_book.php?id_book=<?= $id_book ?>" class="download-btn me-3"><i
                            class="fas fa-download"></i> Tải sách</a>


                    <form method="post" action="toggle_favorite.php">
                        <input type="hidden" id="id_book" name="id_book" value="<?= $id_book ?>">
                        <!-- Nút yêu thích -->
                        <?php if ($is_favorite) :?>
                        <button id="favoriteBtn" class="favorite-btn">
                            <i id="favoriteIcon" class="favorite-icon fas fa-heart"></i>
                        </button>
                        <?php else: ?>
                        <button id="favoriteBtn" class="favorite-btn">
                            <i id="favoriteIcon" class="favorite-icon far fa-heart"></i>
                        </button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>

            <div class="row mt-4">
                <div class="border rounded-2 p-3 mx-3">
                    <div class="d-flex justify-content-between">
                        <h5 class="align-content-center">ĐÁNH GIÁ SÁCH (<?= count($reviews) ?>)</h5>
                        <div class="dropdown">
                            <a class="btn btn-outline-dark dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Sắp xếp
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="detail_book.php?id_book=<?= $id_book ?>&sort=asc">Cũ
                                        nhất</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="detail_book.php?id_book=<?= $id_book ?>&sort=desc">Mới nhất</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <hr>
                    <div class="m-2">
                        <?php foreach ($reviews as $review): ?>
                        <div class="m-2">
                            <p><strong style="color: #2c00bf"><?= html_escape($review['fullname']) ?></strong>
                                <span class="date-review"><i class="fa-regular fa-clock"></i>
                                    <?= html_escape($review['date_review']) ?></span>
                            </p>

                            <p class="ps-3">
                                <?= html_escape($review['content']) ?>
                            </p>
                        </div>
                        <?php endforeach; ?>

                        <form method="post" action="submit_review.php">
                            <input type="hidden" name="id_book" value="<?= $id_book ?>">
                            <textarea class="w-100" name="content" placeholder="Viết đánh giá..." required></textarea>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>

<?php
include_once __DIR__. '/../src/partials/footer.php'
?>