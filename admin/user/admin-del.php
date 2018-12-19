<?php

include_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
Helper::checkLogin();
$user = new User();

$id = $_POST['id'];
echo $id;
$data = ['id'=>$id];
$result = $user->delete($data);
// include_once ROOT_PATH."view/admin/user/admin-list.html";