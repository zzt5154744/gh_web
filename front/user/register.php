<?php

    require_once "../../start.php";
    require_once ROOT_PATH."model/User.class.php";
    function dopost(){
        $user = new User();
        $username = $_POST['username'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $img = "qq.jpg";
    $data = [
        'username' => $username,
        'phone_number' => $phone_number,
        'image' => $img,
        'password' => $password,
        'email' => $email,
        'addtime' => date('y-m-d H:i:s',time())
    ];
        $result = $user->add($data);
        header("location:register.php");
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        dopost();
    }   
    else
    {
        include_once ROOT_PATH."view/front/user/register.html";
    }