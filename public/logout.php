<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    echo "<script>
            alert('Bạn đã đăng xuất.');
            localStorage.removeItem('nightModeEnabled');
            window.location.href = 'index.php';
        </script>";
    exit();
}
?>