<?php 
require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
include_once ROOT_PATH.'model/Orderitem.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
    $user = new User();
    $pdo = new MyPDO();
    $shopping = new Shopping();
    $orderitem = new Orderitem();
    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user']['id'];
        $username = $_SESSION['user']['username'];
        }else{
        $user_id = "";
        }
        $s_id=$_POST['s_id'];
        $v_id=$_POST['v_id'];
        $total=$_POST['total'];
        $data = [
            'v_id' => $v_id,
            's_id' => $s_id,
            'user_id' => $user_id,
            'total' => $total,
        ];
        $result = $orderitem->add($data);
        // foreach($orderitem as $item){
        //     if($item['s_id'] != $s_id){
        //         ;
        //     } 
        // }
        // $result = $pdo->nonQuery($sql,$data);
        