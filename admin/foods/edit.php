<?php
require_once './../../Config.php';
require_once './../../dal/Food.php';
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
    $categoryDal->setPerPage(100);
    $categoryList = $categoryDal->getList(1);
    $foodDal = new Food();
    //nếu như có tồn tại một dữ liệu name
    if (isset($_POST['name'])) {
        $foodDal->update($_POST['id'], $_POST);
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (!is_numeric($id)) {
            header('Location:index.php');
        }

        $obj = $foodDal->getById($id);
    }
    ?>

    <form method="post">
        <input type="hidden" name="id" value="<?php echo $obj->id; ?>">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên món</label>
            <input type="text" class="form-control" name="name" value="<?php echo $obj->name; ?>"
                   placeholder="Tên món">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Giá</label>
            <input type="text" class="form-control" name="price" placeholder="Giá" value="<?php echo $obj->price; ?>">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Danh mục</label>
            <select class="form-control" name="category_id">
                <?php
                foreach ($categoryList as $r) {
                    ?>

                    <option <?php if ($r->id == $obj->category_id) {
                        echo 'selected="selected"';
                    } ?> value="<?php echo $r->id; ?>"><?php echo $r->name; ?></option>

                    <?php
                }
                ?>

            </select>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Sửa</button>
        </div>
    </form>

</div>
</body>
</html>