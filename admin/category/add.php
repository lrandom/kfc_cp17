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
    //nếu như có tồn tại một dữ liệu name
    if (isset($_POST['name'])) {
        $categoryDal->add($_POST);
    }
    ?>

    <form method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" name="name" placeholder="Tên danh mục">
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Thêm</button>
        </div>
    </form>

</div>
</body>
</html>