<?php
session_start();
require_once __DIR__ . '/../src/connect.php';

$error_message = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Kiểm tra xem có tồn tại email và password không
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        
        // Kiểm tra thông tin đăng nhập
        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if(password_verify($password, $user['password'])) {
                $_SESSION['user'] = [];
                // Đăng nhập thành công
                $_SESSION['user']['email'] = $user['email'];
                $_SESSION['user']['role'] = $user['role'];

                
                if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') {
                    
                    redirect('index_ad.php');
                } else {
                    redirect('index.php');
                }
                
            } else {
                $error_message = "Mật khẩu không đúng.";
            }
        } else {
            // Đăng nhập thất bại
            $error_message = "Email chưa đăng ký tài khoản.";
        }
    }else {
        $error_message = "Vui lòng nhập đầy đủ thông tin.";
    }
    
}
if ($error_message) {
    include __DIR__ . '/../src/partials/show_error.php';
}
?>

<?php
include_once __DIR__. '/../src/partials/header.php'
?>
<div class="container flex-grow-1">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h2 class="text-center my-4">ĐĂNG NHẬP</h2>
            <form method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Nhập mật khẩu" required>

                </div>
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </form>
            <div class="text-center mt-3">
                <p>Bạn chưa có tài khoản? <a href="register.php">Đăng ký ngay</a>.</p>
            </div>
        </div>
    </div>
</div>
<?php
include_once __DIR__. '/../src/partials/footer.php'
?>