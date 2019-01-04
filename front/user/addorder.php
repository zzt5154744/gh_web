<?php 
require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
include_once ROOT_PATH.'model/Orderlist.class.php';
include_once ROOT_PATH.'model/Orderrelation.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
    $user = new User();
    $pdo = new MyPDO();
    $shopping = new Shopping();
    $orderlist  = new Orderlist();
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
        $o_id  = $_POST['o_id'];
        $address  = $_POST['address'];
        $sum = $_POST['sum'];
        $consignee = $_POST['consignee'];
        $photonumber = $_POST['photonumber'];
        $state_id = 2;
        $data = [
            'o_id' => $o_id,
            'user_id' => $user_id,
            'address' => $address,
            'sum' => $sum,
            'consignee' => $consignee,
            'state_id' => $state_id,
            'photonumber'=> $photonumber,
            'addtime' => date('y-m-d H:i:s',time())
        ];
        $result = $orderlist->add($data);