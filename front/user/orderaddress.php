<?php

    include_once "../../start.php";
    include_once ROOT_PATH."model/User.class.php";
    function fn(){
        $user = new User();
        $userid = $_GET['id'];
        $result = $user->select(['id'=>$userid]);
        // $data = $result;
        $username = $_POST['username'];
        $email  = $_POST['email'];
        $description = $_POST['description'];
        echo $description;
        $data = [
            'user_id' => $userid,
            'o_name' => $username,
            'o_phone' => $email,
            'address' => $description
        ];
        
        $result = $user->update($data,$userid);
        header("location:shadowsocks.php");
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        fn();        
    }else{
        $user = new User();
        $userid = $_SESSION['user']['id'];
        $result = $user->select(['id'=>$userid]);
        $data = $result;
        var_dump($data);
        include_once ROOT_PATH."view/front/user/shadowsocks.html";
    }

  



