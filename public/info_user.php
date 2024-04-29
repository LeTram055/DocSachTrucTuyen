<?php
session_start();
require_once __DIR__ . '/../src/connect.php';

$email = $_SESSION['user']['email'];
$fullname = $_SESSION['user']['fullname'];
$type = isset($_GET['type']) ? $_GET['type'] : 'read';

if ($type === 'read') {
    // Truy vấn sách đã đọc
    $sql = "SELECT b.id_book, b.image_book, b.name_book 
            FROM readingHistory rh
            JOIN book b 
            ON rh.id_book = b.id_book
            WHERE rh.email = ?";
} elseif ($type === 'favourite') {
    // Truy vấn sách yêu thích
    $sql = "SELECT b.id_book, b.image_book, b.name_book 
            FROM favourite f
            JOIN book b 
            ON f.id_book = b.id_book
            WHERE f.email = ?";
}

$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Truy vấn để lấy số sách đã đọc của người dùng
$sql_read = "SELECT COUNT(*) AS read_book FROM readingHistory WHERE email = ?";
$stmt_read = $pdo->prepare($sql_read);
$stmt_read->execute([$email]);
$read = $stmt_read->fetch(PDO::FETCH_ASSOC)['read_book'];

// Truy vấn để lấy số sách đã đọc của người dùng
$sql_favourite = "SELECT COUNT(*) AS favourite_book FROM favourite WHERE email = ?";
$stmt_favourite = $pdo->prepare($sql_favourite);
$stmt_favourite->execute([$email]);
$favourite = $stmt_favourite->fetch(PDO::FETCH_ASSOC)['favourite_book'];

$sql_date = "SELECT date_reading
            FROM readingHistory
            WHERE email = ?
            ORDER BY date_reading DESC
            LIMIT 1";
$stmt_date = $pdo->prepare($sql_date);
$stmt_date->execute([$email]);
$date = '';
$row = $stmt_date->fetch(PDO::FETCH_ASSOC);
if ($row !== false) {
    $date = $row['date_reading'];
}



include_once __DIR__. '/../src/partials/header.php'
?>

<div class="container flex-grow-1">

    <div class="row justify-content-center m-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">THÔNG TIN NGƯỜI DÙNG</h2>
                </div>
                <div class="card-body">

                    <p><strong>Email:</strong> <?php echo $email; ?></p>
                    <p><strong>Tên:</strong> <?php echo $fullname ?></p>
                    <p><strong>Số sách đã đọc:</strong> <?php echo $read; ?></p>
                    <p><strong>Số sách yêu thích:</strong> <?php echo $favourite; ?></p>
                    <?php if ($date !== '') :?>
                    <p><strong>Ngày đọc sách gần nhất:</strong> <?php echo date("d/m/Y", strtotime($date)); ?></p>
                    <?php endif;?>

                    <div class="form-check form-switch form-check-reverse d-flex justify-content-start">
                        <label class="form-check-label" for="nightModeToggle">Chế độ nền tối: &nbsp;</label>
                        <input style="height: 20px; width: 40px" class="form-check-input" type="checkbox" role="switch"
                            id="nightModeToggle">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center m-5">
        <?php if ($type === 'read') {
            echo '<h2 class="text-center mb-4">SÁCH ĐÃ ĐỌC</h2>';
        } elseif ($type === 'favourite') {
            echo '<h2 class="text-center mb-4">SÁCH YÊU THÍCH</h2>';
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

    </div>
</div>

<?php
include_once __DIR__. '/../src/partials/footer.php'
?>