<?php 
require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
include_once ROOT_PATH.'model/Orderrelation.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
    $user = new User();
    $pdo = new MyPDO();
    $shopping = new Shopping();
    $orderrelation = new Orderrelation();

    //生成一个9位的随机数
    // function GetRandStr($len) 
    // { 
    //     $chars = array( 
    //         "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",  
    //         "0", "1", "2",  "3", "4", "5", "6", "7", "8", "9" 
    //     ); 
    //     $charsLen = count($chars) - 1; 
    //     shuffle($chars);   
    //     $output = "A"; 
    //     for ($i=0; $i<$len; $i++) 
    //     { 
    //         $output .= $chars[mt_rand(0, $charsLen)]; 
    //     }  
    //     return $output;  
    // } 

    // $random = GetRandStr(9);
       
    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user']['id'];
        $username = $_SESSION['user']['username'];
        }else{
        $user_id = "";
        }
        echo $username;
        $s_id  = $_POST['s_id'];
        $v_id  = $_POST['v_id'];
        $total = $_POST['total'];
        $o_id  = $_POST['o_id'];
        $data = [
            's_id' => $s_id,
            'v_id' => $v_id,
            'user_id' => $user_id,
            'total' => $total,
            'o_id' => $o_id
        ];
        $result = $orderrelation->add($data);