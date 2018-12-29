<?php

include_once "../../start.php";

$role = $_SESSION['user']['role'];
if($role ==1 ){
    Helper::checkLogin();
    include_once ROOT_PATH."model/User.class.php";
$user = new User();
if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['id'];
    }else{
    $user_id = "";
    }

$user_name = $user->select(['id' => $user_id]);
$username = $user_name['username'];
}else{
    header("location:../../admin/user/admin-login.php");
}

// echo $username;
include_once ROOT_PATH."view/admin/home/index.html";

