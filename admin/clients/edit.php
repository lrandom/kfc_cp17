<?php
require_once './../../Config.php';
require_once './../../dal/Client.php';
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
    $clientDal = new Clients();
    //nếu như có tồn tại một dữ liệu name email password
    if (isset($_POST['full_name'])) {
        if(isset($_POST['email'])){
            if(isset($_POST['password'])){
                    $clientDal->update($_POST['id'], $_POST);
                }
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (!is_numeric($id)) {
            header('Location:index.php');
        }

        $obj =   $clientDal->getById($id);
    }
    ?>

    <form method="post">
        <input type="hidden" name="id" value="<?php echo $obj->id; ?>">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="full_name" value="<?php echo $obj->full_name; ?>" placeholder="Tên danh mục">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $obj->email; ?>" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo $obj->password; ?>" placeholder="Password">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Sửa</button>
        </div>
    </form>

</div>
</body>
</html>