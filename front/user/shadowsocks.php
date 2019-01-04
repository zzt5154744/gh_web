<?php 
require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
include_once ROOT_PATH.'model/Orderitem.class.php';
include_once ROOT_PATH.'model/Oraddress.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
    $vinegar = new Vinegar();
    $user = new User();
    $pdo = new MyPDO();
    $shopping = new Shopping();
    $orderitem = new Orderitem();
    // $oraddress = new Oraddress();
    function fn(){
        $user = new User();
        $userid = $_GET['id'];
        $result = $user->select(['id'=>$userid]);
        $o_name = $_POST['o_name'];
        $o_phone  = $_POST['o_phone'];
        $address = $_POST['address'];
        $data = [
            'o_name' => $o_name,
            'o_phone' => $o_phone,
            'address' => $address
        ];
        
        
        $result = $user->update($data,$userid);
        header("location:shadowsocks.php");
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        fn();        
    }else{
            $user = new User();
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
            $username = $_SESSION['user']['username'];
            }else{
            $user_id = "";
            }
            $result = $user->select(['id'=>$user_id]);
            $data = $result;
            $sql  = "select * from orderitem_view where user_id = $user_id";
            $result_shopping = $pdo->selectAll($sql);
            $sum = 0;
            foreach($result_shopping as $item){
                $sum += $item['price'] * $item['num'];
                $num = $item['num'];
            }
            $shoppingcount = count($result_shopping);
            include_once ROOT_PATH."view/front/user/shadowsocks.html";
    }
   