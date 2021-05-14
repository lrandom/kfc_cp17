<?php
require_once './../../Config.php';
require_once './../../dal/User.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="./../../public/lib/jquery-3.6.0.min.js"></script>
    <script src="./../../public/lib/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="./../../public/lib/bootstrap/css/bootstrap.css"/>
</head>
<body>
<div class="container">
    <?php
    require_once './../commons/nav.php';
    ?>
    <?php
    $userDal = new Users();
    //nếu như có tồn tại một dữ liệu name
    if (isset($_POST['full_name'])) {
        if (isset($_POST['email'])) {
            if (isset($_POST['password'])) {
                if (isset($_POST['level'])) {
                    $userDal->add($_POST);
                }
            }
        }
    }
    ?>

    <form method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">FullName</label>
            <input type="text" class="form-control" name="full_name" placeholder="Full Name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="PassWord">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Level</label>
            <!-- <input type="number" class="form-control" name="level" placeholder="Level">-->
            <select name="level" class="form-control">
                <option value="1">Admin</option>
                <option value="0">Staff</option>
            </select>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Thêm</button>
        </div>
    </form>

</div>
</body>
</html>