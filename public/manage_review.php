<?php
require_once __DIR__ . '/../src/connect.php';
require_once __DIR__ . '/../vendor/autoload.php'; 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

function exportToExcel($data) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Thiết lập header
    $header = ['Mã đánh giá','Email người đánh giá', 'Tên người đánh giá', 'Tên sách', 'Nội dung đánh giá', 'Ngày đánh giá'];
    $sheet->fromArray($header, NULL, 'A1');

    // Ghi dữ liệu
    $rowIndex = 2;
    foreach ($data as $row) {
        $sheet->fromArray($row, NULL, 'A' . $rowIndex);
        $rowIndex++;
    }

    // Thiết lập response header để tải file về
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="danhgia.xls"');
    header('Cache-Control: max-age=0');

    // Tạo một file Excel tạm thời và ghi dữ liệu vào nó
    $writer = new Xls($spreadsheet);
    $writer->save('php://output');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $sql = "SELECT r.id_review, u.email, u.fullname, b.name_book, r.content, r.date_review
            FROM review r
            JOIN user u ON u.email = r.email
            JOIN book b ON b.id_book = r.id_book
            WHERE u.email LIKE concat('%', ? '%') 
            OR u.fullname LIKE concat('%', ? '%')
            OR b.name_book LIKE concat('%', ? '%')
            ORDER BY r.id_review ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$keyword, $keyword, $keyword]);
} else {

    $sql = "SELECT r.id_review, u.email, u.fullname, b.name_book, r.content, r.date_review
            FROM review r
            JOIN user u ON u.email = r.email
            JOIN book b ON b.id_book = r.id_book
            ORDER BY r.id_review ASC";
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
                <h2 class="text-center">QUẢN LÝ ĐÁNH GIÁ</h2>
            </div>

            <div class="row mb-3">
                <div class="col">

                </div>

                <div class="col d-flex justify-content-center ">
                    <form class="d-flex" role="search" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Nhập tên hoặc email hoặc tên sách"
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
                                <th class="align-content-start">Mã đánh giá</th>
                                <th class="align-content-start">Email người đánh giá</th>
                                <th class="align-content-start">Tên người đánh giá</th>
                                <th class="align-content-start">Tên sách</th>
                                <th class="align-content-start">Nội dung đánh giá</th>
                                <th class="align-content-start">Ngày đánh giá</th>
                                <th class="text-center align-content-start">Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($rows as $row) : ?>

                            <tr>
                                <td><?= html_escape($row['id_review']) ?></td>
                                <td><?= html_escape($row['email']) ?></td>
                                <td><?= html_escape($row['fullname']) ?></td>
                                <td><?= html_escape($row['name_book']) ?></td>
                                <td><?= html_escape($row['content']) ?></td>
                                <td><?= html_escape($row['date_review']) ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">

                                        <form class="form-inline mx-1" action="/delete_review.php" method="POST">
                                            <input type="hidden" name="id_review" value="<?= $row['id_review'] ?>">
                                            <button id="delete-review-btn" type="button"
                                                class="btn btn-xs btn-danger  delete-review-btn" data-toggle="modal"
                                                name="delete-review" data-target="#delete-confirm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>

                                </td>
                            </tr>


                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <div id="delete-confirm" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Xác nhận</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger"
                                        id="delete">Xóa</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


</div>

<?php
include_once __DIR__. '/../src/partials/footer_ad.php'
?>