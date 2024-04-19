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

// Xử lý khi người dùng gửi đánh giá
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_book']) && isset($_POST['content'])) {
    $id_book = $_POST['id_book'];
    $content = $_POST['content'];
    if (isset($_SESSION['user']) && isset($_SESSION['user']['email'])) {
        $email = $_SESSION['user']['email'];
        // Thêm đánh giá vào cơ sở dữ liệu
        $sql_insert_review = "INSERT INTO review (content, date_review, email, id_book) VALUES (?, NOW(), ?, ?)";
        $stmt_insert_review = $pdo->prepare($sql_insert_review);
        $stmt_insert_review->execute([$content, $email, $id_book]);
    }
}

// Lấy tất cả đánh giá của cuốn sách
$sql_reviews = "SELECT r.content, r.date_review, u.fullname 
                FROM review r
                JOIN user u ON r.email = u.email
                WHERE r.id_book = ?";
$stmt_reviews = $pdo->prepare($sql_reviews);
$stmt_reviews->execute([$id_book]);
$reviews = $stmt_reviews->fetchAll(PDO::FETCH_ASSOC);

include_once __DIR__. '/../src/partials/header.php';
?>

<div class="container">
    <div class="row justify-content-center m-5">
        <h2 class="text-center mb-5">CHI TIẾT SÁCH</h2>
        <div class="col-md-4 col-sm p-2 d-flex justify-content-center align-items-center">
            <img class="detail-book-image" src="<?= $row['image'] ?>" alt="<?= html_escape($row['name_book']) ?>">
        </div>
        <div class="col-md-8 col-sm p-2">
            <div>
                <h4 class="detail-book-name"><?= html_escape($row['name_book']) ?></h4>
                <p style="text-align: justify;">Tác giả: <?= html_escape($row['author']) ?></p>
                <p style="text-align: justify;">Thể loại: <?= html_escape($row['name_genre']) ?></p>
                <p style="text-align: justify;"><?= html_escape($row['describe']) ?></p>
            </div>

            <div class="d-flex justify-content-start">
                <a href="view_pdf.php?id_book=<?= $id_book ?>" class="btn btn-primary mx-3">Đọc sách</a>

                <form method="post" action="toggle_favorite.php">
                    <input type="hidden" id="id_book" name="id_book" value="<?= $id_book ?>">
                    <!-- Nút yêu thích -->
                    <button id="favoriteBtn" class="favorite-btn">
                        <i id="favoriteIcon" class="favorite-icon far fa-heart"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>

    <div class="row">
        <div>
            <h3>Đánh giá sách</h3>
            <?php foreach ($reviews as $review): ?>
            <div>
                <p><strong><?= html_escape($review['fullname']) ?>:</strong> <?= html_escape($review['content']) ?></p>
                <p><em><?= html_escape($review['date_review']) ?></em></p>
            </div>
            <?php endforeach; ?>
        </div>

        <form method="post" action="submit_review.php">
            <input type="hidden" name="id_book" value="<?= $id_book ?>">
            <textarea name="content" placeholder="Nhập đánh giá của bạn..." required></textarea>
            <button type="submit">Gửi</button>
        </form>
    </div>

</div>

<?php
include_once __DIR__. '/../src/partials/footer.php'
?>