<?php
require_once __DIR__ . '/../src/connect.php';

if (isset($_GET['id_genre'])) {
    $id_genre = $_GET['id_genre'];

    // Lấy thông tin loại từ cơ sở dữ liệu để hiển thị trên form
    $sql = "SELECT * FROM genre WHERE id_genre = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_genre]);
    $genre = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name_genre = isset($_POST['name_genre']) ? $_POST['name_genre'] : '';
    
        $old_name_genre = $genre['name_genre'];
        
        // Cập nhật thông tin loại trong cơ sở dữ liệu
        $sql_update = "UPDATE genre SET name_genre = ? WHERE id_genre = ?";
        $stmt_update = $pdo->prepare($sql_update);
        $result = $stmt_update->execute([$name_genre, $id_genre]);

        if ($result) {
            //Cập nhật tên thư mục
            $old_image_folder = 'images/' . $old_name_genre;
            $new_image_folder = 'images/' . $name_genre;
            $old_file_folder = 'files/' . $old_name_genre;
            $new_file_folder = 'files/' . $name_genre;

            if (file_exists($old_image_folder)) {
            rename($old_image_folder, $new_image_folder);
            }
            
            if (file_exists($old_file_folder)) {
                rename($old_file_folder, $new_file_folder);
            }

            // Nếu cập nhật thành công, chuyển hướng về trang quản lý loại
           echo "<script>
                        alert ('Cập nhật thể loại thành công!');
                        window.location.href = 'manage_genre.php';
                    </script>";
        } else {
            // Nếu cập nhật không thành công, hiển thị thông báo lỗi
            echo '<script>alert("Cập nhật loại không thành công. Vui lòng kiểm tra lại thông tin.");</script>';
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
                    <h2 class="text-center">CẬP NHẬT THỂ LOẠI</h2>
                    <form method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id_genre" value="<?= $id_genre ?>">

                        <!-- Mã loại -->
                        <div class="form-group m-1">
                            <label for="id_genre">Mã thể loại</label>
                            <input type="text" name="id_genre" class="form-control" maxlen="10" id="id_genre"
                                placeholder="Nhập mã thể loại" value="<?= html_escape($genre['id_genre'])?>" readonly />
                        </div>

                        <!-- Tên loại -->
                        <div class="form-group m-1">
                            <label for="name_genre">Tên thể loại</label>
                            <input type="text" name="name_genre" class="form-control" maxlen="100" id="name_genre"
                                placeholder="Nhập tên thể loại" value="<?= html_escape($genre['name_genre']) ?>"
                                required />
                        </div>

                        <!-- Submit -->
                        <div class="text-center m-3">
                            <!-- Đây là phần chỉnh sửa -->
                            <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
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