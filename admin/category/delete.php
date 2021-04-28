<?php
require_once './../../dal/Category.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //xoá theo id;
    $categoryDal = new Category();
    $categoryDal->delete($id);
    header('Location: index.php');
}
?>