<?php
require_once __DIR__ . '/../src/connect.php';
require_once __DIR__ . '/../vendor/autoload.php'; 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

function exportToExcel($data) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Thiết lập header
    $header = ['Mã sách','Tên sách', 'Nơi chứa ảnh', 'Tác giả', 'Mô tả', 'Nơi chứa file', 'Tên thể loại', 'Số lượt đọc'];
    $sheet->fromArray($header, NULL, 'A1');

    // Ghi dữ liệu
    $rowIndex = 2;
    foreach ($data as $row) {
        $sheet->fromArray($row, NULL, 'A' . $rowIndex);
        $rowIndex++;
    }

    // Thiết lập response header để tải file về
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="sachdocnhieu.xls"');
    header('Cache-Control: max-age=0');

    // Tạo một file Excel tạm thời và ghi dữ liệu vào nó
    $writer = new Xls($spreadsheet);
    $writer->save('php://output');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $sql = "SELECT b.id_book, b.name_book, b.image_book, b.author, b.describe_book, b.file_book, g.name_genre, 
            (SELECT COUNT(*) FROM read WHERE id_book = b.id_book) AS read_count
            FROM book b
            JOIN genre g
            ON b.id_genre = g.id_genre
            WHERE name_book LIKE concat('%', ? '%') 
            OR id_book LIKE ?
            HAVING read_count > 0";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$keyword, $keyword]);
} else {
    $sql = "SELECT b.id_book, b.name_book, b.image_book, b.author, b.describe_book, b.file_book, g.name_genre, 
            (SELECT COUNT(*) FROM readingHistory WHERE id_book = b.id_book) AS read_count
            FROM book b
            JOIN genre g
            ON b.id_genre = g.id_genre
            HAVING read_count > 0
            ORDER BY read_count DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['export'])) {
  // Xuất file Excel
  exportToExcel($rows);
}

include_once __DIR__. '/../src/partials/header_ad.php'
?>

<div class="container-fluid flex-grow-1">
    <div class="row">
        <div class="col-2">
            <?php include_once __DIR__. '/../src/partials/slidebar_ad.php' ?>

        </div>

        <div class="col-10">
            <div class="row justify-content-center m-5">
                <h2 class="text-center">SÁCH ĐƯỢC ĐỌC</h2>
            </div>

            <div class="row mb-3">
                <div class="col">

                </div>

                <div class="col d-flex justify-content-center ">
                    <form class="d-flex" role="search" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Nhập tên hoặc mã sách"
                            aria-label="Search" name="keyword"
                            value="<?= isset($_GET['keyword']) ? html_escape($_GET['keyword']) : '' ?>">
                        <button class="btn btn-outline-dark" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>

                <div class="col d-flex justify-content-end">
                    <form method="post">
                        <button class="btn btn-success" type="submit" name="export">
                            Xuất Excel
                        </button>
                    </form>
                </div>
            </div>

            <div class="row my-3">
                <div class="col">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="align-content-start">Mã sách</th>
                                <th class="align-content-start">Tên sách</th>
                                <th class="align-content-start">Ảnh bìa sách</th>
                                <th class="align-content-start">Tác giả</th>
                                <th class="align-content-start">Mô tả</th>
                                <th class="align-content-start">Tên file</th>
                                <th class="align-content-start">Tên thể loại</th>
                                <th class="text-center align-content-start">Số lượt đọc</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($rows as $row) : ?>

                            <tr>
                                <td><?= html_escape($row['id_book']) ?></td>
                                <td><?= html_escape($row['name_book']) ?></td>
                                <td><img width="80px" height="120px" src="<?= $row['image_book'] ?>"
                                        alt="<?= $row['name_book']?>"></td>
                                <td><?= html_escape($row['author']) ?></td>
                                <td><?= html_escape($row['describe_book']) ?></td>
                                <td><?= basename(html_escape($row['file_book'])) ?></td>
                                <td><?= html_escape($row['name_genre']) ?></td>
                                <td class="text-center"><?= $row['read_count'] ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>


</div>

<?php
include_once __DIR__. '/../src/partials/footer_ad.php'
?>