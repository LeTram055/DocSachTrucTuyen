<?php
require_once __DIR__ . '/../src/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_genre = isset($_POST['id_genre']) ? $_POST['id_genre'] : '';
    $name_genre = isset($_POST['name_genre']) ? $_POST['name_genre'] : '';

    $sql_check = "SELECT COUNT(*) AS count FROM genre WHERE id_genre = ?";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([$id_genre]);
    $row = $stmt_check->fetch(PDO::FETCH_ASSOC);
    if ($row['count'] > 0) {
        echo '<script>alert("Mã thể loại đã tồn tại. Vui lòng chọn mã thể loại khác.");</script>';
       
    } else {
        // Thực hiện chèn loại vào cơ sở dữ liệu
        $sql = "INSERT INTO genre (id_genre, name_genre) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$id_genre, $name_genre]);

        // Kiểm tra kết quả cập nhật
        if ($result) {
            // Thêm loại thành công
            $image_folder = 'images/' . $name_genre;
            $file_folder = 'files/' . $name_genre;
            
            // Kiểm tra và tạo thư mục nếu chưa tồn tại
            if (!file_exists($image_folder)) {
                mkdir($image_folder, 0777, true);
            }
            if (!file_exists($file_folder)) {
                mkdir($file_folder, 0777, true);
            }
            redirect("manage_genre.php");
        } else {
            // Thêm loại không thành công
            echo '<script>alert("Thêm loại không thành công. Vui lòng kiểm tra lại thông tin.");</script>';
        }
    }
}

include_once __DIR__. '/../src/partials/header_ad.php'
?>

<div class="container-fluid flex-grow-1">
    <div class="row">
        <div class="col-2">
            <?php include_once __DIR__. '/../src/partials/slidebar_ad.php' ?>

        </div>

        <div class="col-10">

            <div class="row mt-3">
                <div class="col">
                    <button class="btn btn-light" id="goBackBtn"><i class="fa-solid fa-chevron-left"></i></button>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6 border-form">
                    <h2 class="text-center">THÊM THỂ LOẠI</h2>
                    <form method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id_genre" value="<?= $id_genre ?>">

                        <!-- Mã loại -->
                        <div class="form-group m-1">
                            <label for="id_genre">Mã thể loại</label>
                            <input type="text" name="id_genre" class="form-control" maxlen="10" id="id_genre"
                                placeholder="Nhập mã thể loại"
                                value="<?= isset($_POST['id_genre']) ? html_escape($_POST['id_genre']) : '' ?>"
                                required />
                        </div>

                        <!-- Tên loại -->
                        <div class="form-group m-1">
                            <label for="name_genre">Tên thể loại</label>
                            <input type="text" name="name_genre" class="form-control" maxlen="100" id="name_genre"
                                placeholder="Nhập tên thể loại"
                                value="<?= isset($_POST['name_genre']) ? html_escape($_POST['name_genre']) : '' ?>"
                                required />
                        </div>

                        <!-- Submit -->
                        <div class="text-center m-3">

                            <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>


                </div>

            </div>


        </div>

    </div>


</div>

<?php
include_once __DIR__. '/../src/partials/footer_ad.php'
?>