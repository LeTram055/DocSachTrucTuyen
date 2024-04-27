<?php
require_once __DIR__ . '/../src/connect.php';
$error_message = '';

if (isset($_GET['id_book'])) {
    $id_book = $_GET['id_book'];

    // Lấy thông tin loại từ cơ sở dữ liệu để hiển thị trên form
    $sql = "SELECT * FROM book WHERE id_book = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_book]);
    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //$id_book = isset($_POST['id_book']) ? $_POST['id_book'] : '';
        $name_book = isset($_POST['name_book']) ? $_POST['name_book'] : '';
        $author = isset($_POST['author']) ? $_POST['author'] : '';
        $describe = isset($_POST['describe']) ? $_POST['describe'] : '';
        $id_genre = isset($_POST['genre']) ? $_POST['genre'] : '';
        
        $sql_genres = "SELECT name_genre FROM genre WHERE id_genre = ?";
        $stmt_genres = $pdo->prepare($sql_genres);
        $stmt_genres->execute([$id_genre]);
        $row_genre = $stmt_genres->fetch(PDO::FETCH_ASSOC);
        $name_genre = $row_genre['name_genre'];

        //Xử lý ảnh
        $image = $book['image_book'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image_name = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_folder = 'images/' . $name_genre . '/';
            $image_path = $image_folder . $image_name;

            // Di chuyển hình ảnh vào thư mục lưu trữ
            if (move_uploaded_file($image_tmp, $image_path)) {
                $image = $image_path; 
                // Xóa file cũ
                if ($book['image_book'] && file_exists($book['image_book'])) {
                    unlink($book['image_book']);
                }
                
            } else {
                $error_message = "Không thể tải lên hình sản phẩm.";
            }
        }

        //Xử lí file
        $file = $book['file_book'];
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_folder = 'files/' . $name_genre . '/';
            $file_path = $file_folder . $file_name;

            // Di chuyển hình ảnh vào thư mục lưu trữ
            if (move_uploaded_file($file_tmp, $file_path)) {
                $file = $file_path; 
                // Xóa file cũ
                if ($book['file_book'] && file_exists($book['file_book'])) {
                    unlink($book['file_book']);
                }
            } else {
                $error_message = "Không thể tải lên hình sản phẩm.";
            }
        }


        // Thực hiện cập nhật
        $sql = "UPDATE book SET name_book = ?, author = ?, describe_book = ?, image_book = ?, file_book = ?, id_genre = ? WHERE id_book = ?";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$name_book, $author, $describe, $image, $file, $id_genre, $id_book]);

        // Kiểm tra kết quả cập nhật
        if ($result) {
            // Thêm loại thành công
            redirect("manage_book.php");
        } else {
            // Thêm loại không thành công
            echo '<script>alert("Cập nhật sách không thành công. Vui lòng kiểm tra lại thông tin.");</script>';
        }
        
    }
}

if ($error_message) {
    include __DIR__ . '/../src/partials/show_error.php';
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
                    <h2 class="text-center">CẬP NHẬT SÁCH</h2>
                    <form method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id_book" value="<?= $id_book ?>">

                        <!-- Mã loại -->
                        <div class="form-group m-1">
                            <label for="id_book">Mã sách:</label>
                            <input type="text" name="id_book" class="form-control" maxlen="10" id="id_book"
                                placeholder="Nhập mã sách" value="<?= html_escape($id_book) ?>" readonly />
                        </div>

                        <!-- Tên loại -->
                        <div class="form-group m-1">
                            <label for="name_book">Tên sách:</label>
                            <input type="text" name="name_book" class="form-control" maxlen="100" id="name_book"
                                placeholder="Nhập tên sách" value="<?= html_escape($book['name_book']) ?>" required />
                        </div>

                        <!-- Tác giả -->
                        <div class="form-group m-1">
                            <label for="author">Tác giả:</label>
                            <input type="text" name="author" class="form-control" maxlen="50" id="author"
                                placeholder="Nhập tên tác giả" value="<?= html_escape($book['author']) ?>" />
                        </div>

                        <!-- Mô tả -->
                        <div class="form-group m-1">
                            <label for="describe">Mô tả:</label>
                            <input type="text" name="describe" class="form-control" maxlen="50" id="describe"
                                placeholder="Nhập tên mô tả" value="<?= html_escape($book['describe_book']) ?>" />
                        </div>

                        <!-- Ảnh bìa sách -->
                        <div class="form-group m-1 my-3">
                            <label for="image">Ảnh bìa sách: </label>
                            <?php if (!empty($book['image_book']) && file_exists($book['image_book'])) : ?>
                            <image src="<?= $book['image_book'] ?>" id="book-preview" alt="book" width="40px"
                                height="60px">
                                <?php endif; ?>

                                <input type="file" name="image" id="image" class="form-control-file" id="image" />
                        </div>

                        <!-- File -->
                        <div class="form-group m-1 my-3">
                            <label for="file">File pdf: </label>
                            <?php if (!empty($book['file_book']) && file_exists($book['file_book'])) : ?>
                            <a class="link" href="<?= $book['file_book'] ?>"
                                target="_blank"><?= basename(html_escape($book['file_book'])) ?></a>
                            <?php endif; ?>
                            <input type="file" name="file" class="form-control-file" id="file" accept=".pdf">
                        </div>

                        <!-- Tên thể loại -->
                        <div class="form-group m-1">
                            <label for="genre">Tên thể loại</label>
                            <select name="genre" id="genre" class="form-control" required>
                                <option value="">Chọn thể loại</option>
                                <?php
                                $sql_genres = "SELECT id_genre, name_genre FROM genre";
                                $stmt_genres = $pdo->prepare($sql_genres);
                                $stmt_genres->execute();
                                while ($row_genre = $stmt_genres->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='" . $row_genre['id_genre'] . "'";
                                    if ($row_genre['id_genre'] == $book['id_genre']) {
                                        echo " selected";
                                    }
                                    echo ">" . $row_genre['name_genre'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Submit -->
                        <div class="text-center m-3">

                            <button type="submit" name="submit" class="btn btn-primary">Cập nhật sách</button>
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