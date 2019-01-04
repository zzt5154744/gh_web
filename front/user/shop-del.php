<?php

include_once "../../start.php";
require_once ROOT_PATH."model/Shopping.class.php";
Helper::checkLogin();
$shopping = new Shopping();

$id = $_POST['id'];
echo $id;
$data = ['id'=>$id];
$result = $shopping->delete($data);
// include_once ROOT_PATH."view/admin/user/admin-list.html";