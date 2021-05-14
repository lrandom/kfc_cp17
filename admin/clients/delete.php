<?php
require_once './../../dal/Client.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //xoá theo id;
    $clientDal = new Clients();
    $clientDal->delete($id);
    header('Location: index.php');
}
?>