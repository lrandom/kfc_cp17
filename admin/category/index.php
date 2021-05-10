<?php
require_once './../../Config.php';
require_once './../../dal/Category.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="<?php echo BASE_URL ?>public/lib/jquery-3.6.0.min.js"></script>
    <script src="<?php echo BASE_URL ?>public/lib/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/lib/bootstrap/css/bootstrap.css"/>
</head>
<body>
<div class="container">

    <?php
    require_once './../commons/nav.php';
    ?>

    <?php
    $categoryDal = new Category();
    $totalPage = $categoryDal->getTotalPage();
    $page = isset($_GET['page']) ? $_GET['page'] : 1; //toán tử ba ngôi
    /*if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }*/
    $list = $categoryDal->getList($page);
    ?>
    <a href="add.php" class="btn btn-primary">Thêm</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($list as $r) {
            ?>
            <tr>
                <th scope="row"><?php echo $r->id; ?></th>
                <td><?php echo $r->name; ?></td>
                <td>
                    <a href="delete.php?id=<?php echo $r->id; ?>">Xoá</a>
                    <a href="edit.php?id=<?php echo $r->id; ?>">Sửa</a>
                </td>
            </tr>

            <?php
        }
        ?>

        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            for ($i = 1;
                 $i <= $totalPage;
                 $i++) {
                ?>
                <li class="page-item <?php if ($page == $i) {
                    echo 'active';
                } ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php
            }
            ?>


        </ul>
    </nav>
</div>
</body>
</html>