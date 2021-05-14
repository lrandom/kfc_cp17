<?php
require_once './../../dal/User.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //xoá theo id;
    $userDal = new Users();
    $userDal->delete($id);
    header('Location: index.php');
}
?>