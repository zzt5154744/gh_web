<?php

    include_once '../../start.php';
    include_once ROOT_PATH.'model/User.class.php';
    $user = new User();
    $result=  $user->selectMany();
    $data = $result;
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        if(isset($_POST['remember'])){
    
            setcookie('username',$username,time()+360);
            // setcookie('password',$password,time()+3600);
        }
        $model = new User();
        $user = $model->select(['username'=>$username,'password'=>$password]);
    
        if(!empty($user)){
            $_SESSION['user'] = $user;
            $url=isset($_GET['returnUrl'])?$_GET['returnUrl']:"../home/index.php";
            header("location:$url");
        }else{
            $msg = "用户名或者密码错误!";
            $username  = "";
            include_once ROOT_PATH."view/front/user/login.html";
        }
    }else{
    
        $username = "";
        $msg = "";
        if(isset($_COOKIE['username']))
        {
            $username = $_COOKIE['username'];
        }
        
        //根目录 ROOT_PATH
    include_once ROOT_PATH.'view/front/user/login.html';
    }
