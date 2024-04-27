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
        <nav class="navbar navbar-expand-lg">
            <div class=" container-fluid">
                <a href="index.php"><img id="logo" src="images/logo.png" height="60px" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-reset" aria-current="page" href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Thể loại
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                // Truy vấn SQL để lấy danh sách các loại sách
                                $sql_genre = "SELECT * FROM genre";
                                $stmt_genre = $pdo->prepare($sql_genre);
                                $stmt_genre->execute();
                                while ($row_genre = $stmt_genre->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<li><a class='dropdown-item' href='book.php?name_genre=" . urlencode($row_genre['name_genre']) . "'>" . $row_genre['name_genre'] . "</a></li>";
                                }
                                ?>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active text-reset" href="introduce.php">Giới thiệu</a>
                        </li>

                    </ul>


                    <form class="d-flex mx-3 my-2" role="search" method="GET" action="search.php">
                        <input id="search" class="form-control me-2" type="search" placeholder="Bạn đang tìm gì?"
                            aria-label="Search" name="search" />
                        <button class="btn btn-outline-light" type="submit">Tìm</button>
                    </form>

                    <div class="d-flex my-2">
                        <?php if(isset($_SESSION['user']['email'])): ?>

                        <?php 
                            
                            $fullnameParts = explode(' ', $_SESSION['user']['fullname']);
                            $lastname = end($fullnameParts);
                        ?>
                        <a class="btn btn-success me-2 header-button" href="info_user.php"> <i
                                class="fa-regular fa-user"></i> <?= $lastname ?></a>
                        <a class="btn btn-secondary header-button" href="logout.php">Đăng xuất</a>

                        <?php else: ?>
                        <a class="btn btn btn-success me-2 header-button" href="login.php">Đăng nhập</a>
                        <a class="btn btn-secondary header-button" href="register.php">Đăng ký</a>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
        </nav>
    </div>

    </div>