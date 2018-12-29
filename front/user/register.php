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
        $arr = [];
        $mark = "";
        $data = $user->selectMany();
        foreach ($data as $item) {
         array_push($arr,$item['username']);
        }
        // var_dump($arr);
        if (in_array($username, $arr)) {
            $mark = "1";
        } else {
            $mark = "0";
            $data = [
            'username' => $username,
            'phone_number' => $phone_number,
            'image' => $img,
            'password' => $password,
            'role'=> 0,
            'email' => $email,
            'addtime' => date('y-m-d H:i:s', time())
        ];
            $result = $user->add($data);
        }
    }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            dopost();
        }   
        else
        {
            include_once ROOT_PATH."view/front/user/register.html";
        }
         
        // var_dump($arr);
       

     