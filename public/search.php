<?php
require_once __DIR__ . '/../src/connect.php';

if (isset($_GET['search'])) {
  $search_term = $_GET['search'];

  $genre = $_GET['name_genre'] ??'';
    $sort = $_GET['sort'] ??'';

    if(isset($sort) && $sort=='asc'){

    $sql = "SELECT b.id_book, b.name_book, b.image_book FROM book b 
            JOIN genre g
            ON g.id_genre = b.id_genre
            WHERE name_book LIKE concat('%', ?, '%')
            OR name_genre LIKE concat('%', ?, '%')
            ORDER BY name_book ASC";

    } else if(isset($sort) && $sort== "desc"){
    $sql = "SELECT b.id_book, b.name_book, b.image_book FROM book b 
            JOIN genre g
            ON g.id_genre = b.id_genre
            WHERE name_book LIKE concat('%', ?, '%')
            OR name_genre LIKE concat('%', ?, '%')
            ORDER BY name_book DESC";

    }else{

    $sql = "SELECT b.id_book, b.name_book, b.image_book FROM book b 
            JOIN genre g
            ON g.id_genre = b.id_genre
            WHERE name_book LIKE concat('%', ?, '%')
            OR name_genre LIKE concat('%', ?, '%')";
    }
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$search_term, $search_term]);
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
  
}

include_once __DIR__. '/../src/partials/header.php';
?>

<div class="container flex-grow-1">
    <div class="row my-5">
        <h2 class="text-center mb-4"> KẾT QUẢ TÌM KIẾM SẢN PHẨM VỚI TỪ KHÓA "<?= $search_term ?>"</h2>
        <div class="row">
            <div class="dropdown">
                <a class="btn btn-outline-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Sắp xếp
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="search.php?search=<?= $search_term ?>&sort=asc">A-Z</a></li>
                    <li><a class="dropdown-item" href="search.php?search=<?= $search_term ?>&sort=desc">Z-A</a></li>
                </ul>

            </div>
        </div>
        <div class="row">
            <?php foreach ($rows as $row) : ?>
            <div class="col-md-3 col-sm-6">
                <a href="detail_book.php?id_book=<?= $row['id_book'] ?>" class="book-link">
                    <div class="book-item">
                        <img src="<?= $row['image_book'] ?>" alt="<?= html_escape($book['name_book']) ?>"
                            class="img-fluid book-image">
                        <h5><?= html_escape($row['name_book']) ?></h5>
                    </div>
                </a>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?php
include_once __DIR__. '/../src/partials/footer.php'
?>