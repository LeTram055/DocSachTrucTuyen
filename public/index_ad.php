<?php
require_once __DIR__ . '/../src/connect.php';


// Số thể loại
$sql_count_genres = "SELECT COUNT(*) AS total_genres FROM genre";
$stmt_count_genres = $pdo->prepare($sql_count_genres);
$stmt_count_genres->execute();
$result = $stmt_count_genres->fetch(PDO::FETCH_ASSOC);
$total_genres = $result['total_genres'];

// Số lượng sách 
$sql_count_books = "SELECT COUNT(*) AS total_books FROM book";
$stmt_count_books = $pdo->prepare($sql_count_books);
$stmt_count_books->execute();
$result = $stmt_count_books->fetch(PDO::FETCH_ASSOC);
$total_books = $result['total_books'];

// Số lượng người dùng
$sql_users_count = "SELECT COUNT(*) AS total_users FROM user";
$stmt_users_count = $pdo->prepare($sql_users_count);
$stmt_users_count->execute(); 
$result = $stmt_users_count->fetch(PDO::FETCH_ASSOC);
$total_users = $result['total_users'];

// Số lượng sách được yêu thích
$sql_favourites_count = "SELECT COUNT(DISTINCT id_book) AS total_favourites FROM favourite";
$stmt_favourites_count = $pdo->prepare($sql_favourites_count);
$stmt_favourites_count->execute(); 
$result = $stmt_favourites_count->fetch(PDO::FETCH_ASSOC);
$total_favourites = $result['total_favourites'];

// Số lượng sách đã đọc
$sql_books_read_count = "SELECT COUNT(DISTINCT id_book) AS total_books_read FROM readingHistory";
$stmt_books_read_count = $pdo->prepare($sql_books_read_count);
$stmt_books_read_count->execute(); 
$result = $stmt_books_read_count->fetch(PDO::FETCH_ASSOC);
$total_books_read = $result['total_books_read'];

// Số lượng đánh giá sách
$sql_book_reviews_count = "SELECT COUNT(*) AS total_book_reviews FROM review";
$stmt_book_reviews_count = $pdo->prepare($sql_book_reviews_count);
$stmt_book_reviews_count->execute(); 
$result = $stmt_book_reviews_count->fetch(PDO::FETCH_ASSOC);
$total_book_reviews = $result['total_book_reviews'];


include_once __DIR__. '/../src/partials/header_ad.php'
?>

<div class="container-fluid flex-grow-1">
    <div class="row">
        <div class="col-2">
            <?php include_once __DIR__. '/../src/partials/slidebar_ad.php' ?>

        </div>

        <div class="col-10 ">
            <div class="row justify-content-center m-4">
                <h2 class="text-center">TRANG CHỦ</h2>
            </div>

            <div class="row m-3">

                <div class="col-md-4 col-sm-6">
                    <div class="text-center bg-danger text-white m-2 p-3 rounded-4">

                        <p class="fs-2"><i class="fa-solid fa-list"></i></p>
                        <p class="fs-4">Thể loại</p>
                        <p class="fs-1"><?= $total_genres ?></p>
                    </div>

                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="text-center bg-danger-subtle m-2 p-3 rounded-4">

                        <p class="fs-2"><i class="fa-solid fa-book"></i></p>
                        <p class="fs-4">Sách</p>
                        <p class="fs-1"><?= $total_books ?></p>
                    </div>

                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="text-center bg-warning text-white m-2 p-3 rounded-4">

                        <p class="fs-2"><i class="fa-solid fa-user"></i></p>
                        <p class="fs-4">Người dùng</p>
                        <p class="fs-1"><?= $total_users ?></p>
                    </div>

                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="text-center bg-primary-subtle m-2 p-3 rounded-4">

                        <p class="fs-2"><i class="fa-solid fa-heart"></i></p>
                        <p class="fs-4">Sách yêu thích</p>
                        <p class="fs-1"><?= $total_favourites ?></p>
                    </div>

                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="text-center bg-primary text-white m-2 p-3 rounded-4">

                        <p class="fs-2"><i class="fa-solid fa-book-open-reader"></i></p>
                        <p class="fs-4">Sách được đọc</p>
                        <p class="fs-1"><?= $total_books_read ?></p>
                    </div>

                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="text-center bg-info-subtle m-2 p-3 rounded-4">

                        <p class="fs-2"><i class="fa-solid fa-pen-to-square"></i></p>
                        <p class="fs-4">Đánh giá</p>
                        <p class="fs-1"><?= $total_book_reviews ?></p>
                    </div>

                </div>


            </div>

        </div>


    </div>

    <?php
include_once __DIR__. '/../src/partials/footer_ad.php'
?>