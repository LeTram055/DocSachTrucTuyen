<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (isset($_SESSION['user']["email"])){
        $email = $_SESSION['user']["email"];
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $_SESSION['user']['fullname'] = $row['fullname'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kho sách online</title>
    <link href="images/ebook.png" rel="shortcut icon" type="image" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css" />

</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="my-1">
                <a href="index_ad.php"><img id="logo" src="images/logo.png" height="50px" /></a>
            </div>

            <div class="dropdown">
                <a class="dropdown-toggle link text-white px-3" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <?php if(isset($_SESSION['user']['fullname'])): ?>
                    Xin chào, <?php echo $_SESSION['user']['fullname']; ?>
                    <?php endif; ?>
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>

                </ul>
            </div>

        </div>

    </div>