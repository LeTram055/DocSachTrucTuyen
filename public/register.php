<?php
include __DIR__ . '/../src/connect.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = trim($_POST['password']);
    $password_confirm = $_POST['password_confirm'];

    if (strlen($fullname) < 5) {
        $errors['fullname'] = "Họ tên ít nhất 5 kí tự";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email không hợp lệ";
    }

    if (strlen($password) < 8) {
        $errors['password'] = "Mật khẩu ít nhất 8 kí tự";
    }

    if ($password_confirm !== $password) {
        $errors['password_confirm'] = "Mật khẩu không khớp";
    }

    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        echo "<script>
                    alert ('Hãy đăng ký bằng email khác.');
                </script>";
    } else {
        // Nếu không có lỗi, thêm người dùng mới vào cơ sở dữ liệu
        if (empty($errors) && empty($error_message)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO user (email, fullname, password) VALUES (?, ?, ?)");
            if ($stmt->execute([$email, $fullname, $hashed_password])) {
                
                echo "<script>
                        alert ('Đăng ký thành công!');
                        window.location.href = 'login.php';
                    </script>";

                exit();
            } else {
                echo "<script>
                        alert ('Đã xảy ra lỗi khi đăng ký. Vui lòng thử lại sau.');
                        window.location.href = 'register.php';
                    </script>";
            }
        }
    }

    
}

?>

<?php
include_once __DIR__. '/../src/partials/header.php'
?>

<div class="container flex-grow-1">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h2 class="text-center my-4">ĐĂNG KÝ</h2>
            <form id="registerForm" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                        id="email" name="email"
                        value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
                        placeholder="Nhập email" required>
                    <?php if (isset($errors['email'])) : ?>
                    <span class="text-danger"><?= $errors['email'] ?></span>
                    <?php endif ?>
                </div>

                <div class="mb-3">
                    <label for="fullname" class="form-label">Họ và tên:</label>
                    <input type="text" class="form-control <?= isset($errors['fullname']) ? 'is-invalid' : '' ?>"
                        id="fullname" name="fullname"
                        value="<?= isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : '' ?>"
                        placeholder="Nhập họ và tên" required>
                    <?php if (isset($errors['fullname'])) : ?>
                    <span class="text-danger">
                        <strong><?=$errors['fullname'] ?></strong>
                    </span>
                    <?php endif ?>
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu:</label>
                    <input type="password" class="form-control <?= isset($errors['password']) ? ' is-invalid' : '' ?>"
                        id="password" name="password" placeholder="Nhập mật khẩu" required>
                    <?php if (isset($errors['password'])) : ?>
                    <span class="text-danger"><?= $errors['password'] ?></span>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label for="password_confirm" class="form-label">Nhập lại mật khẩu:</label>
                    <input type="password"
                        class="form-control <?= isset($errors['password_confirm']) ? ' is-invalid' : '' ?>"
                        id="password_confirm" name="password_confirm" placeholder="Nhập lại mật khẩu" required>
                    <?php if (isset($errors['password_confirm'])) : ?>
                    <span class="text-danger"><?= $errors['password_confirm'] ?></span>
                    <?php endif ?>
                </div>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </form>
            <div class="text-center my-3">
                <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập ngay</a>.</p>
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>
<?php
include_once __DIR__. '/../src/partials/footer.php'
?>