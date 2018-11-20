<?php

    require_once "../../start.php";
    require_once ROOT_PATH."model/User.class.php";

    function dopost(){
        $user = new User();
        $username = $_POST['username'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $data = [
        'username' => $username,
        'phone_number' => $phone_number,
        'password' => $password,
        'email' => $email,
        'addtime' => date('y-m-d H:i:s',time())
    ];
     $result = $user->add($data);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        dopost();
        echo "注册成功！";
    }   
    else
    {
        include_once ROOT_PATH."view/front/user/register.html";
    }