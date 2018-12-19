<?php

require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(isset($_POST['remember'])){

        setcookie('username',$username,time()+3600);
    }
    $model = new User();
    $user = $model->select(['username'=>$username,'password'=>$password]);

    $data = [
        "username" => $username,
        "password" => $password
    ];

    if(!empty($user)){
        $_SESSION['user'] = $user;
        if($user['role'] == 1){
        $url=isset($_GET['returnUrl'])?$_GET['returnUrl']:"../home/index.php";
        header("location:$url");
        }
    }else{

        $msg = "用户名或者密码错误!";
        $username  = "";
        include_once ROOT_PATH."view/admin/user/admin-login.html";
    }
}else{

    $username = "";
    $msg = "";
    if(isset($_COOKIE['username']))
    {
        $username = $_COOKIE['username'];
    }
    //根目录 ROOT_PATH
    include_once ROOT_PATH."view/admin/user/admin-login.html";
}