<?php 
require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
include_once ROOT_PATH.'model/Orderlist.class.php';
include_once ROOT_PATH.'model/Orderitem.class.php';
include_once ROOT_PATH.'model/Oraddress.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
include_once ROOT_PATH.'model/Orderstate.class.php';
    $vinegar = new Vinegar();
    $user = new User();
    $pdo = new MyPDO();
    $shopping = new Shopping();
    $orderlist  = new Orderlist();
    $orderitem = new Orderitem();
    $orderstate = new Orderstate();
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
    
        include_once ROOT_PATH."front/vinegar/nav_hide.php";
            $user = new User();
        if (isset($_GET['state_id'])) {
            $state_id = $_GET['state_id'];
        }else{
            $state_id = "";
        }
            
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
            $username = $_SESSION['user']['username'];
            }else{
            $user_id = "";
            }
            
            $sqll = "select * from orderstate order by id asc";
            $allorder = $pdo->selectAll($sqll);
            // 所有订单
            if($state_id == ""){
                $sqld = "select * from orderlist where user_id = $user_id";
            }else{
                $sqld = "select * from orderlist where user_id = $user_id and state_id = $state_id";
            }
            

            // $result = $orderlist->selectMany(['user_id'=>$user_id],['state_id'=>$state_id]);
            // var_dump($result);
            $result = $pdo->selectAll($sqld);
            // if($state_id == 3 && $result == null){
            //     echo "没有待收货的物品";
            // }

            // if($state_id == 4 && $result == null){
            //     echo "没有已经取消的物品";
            // }
            // var_dump($result);
            // $allorder = $orderstate->selectMany();
            // $allorder = $orderstate->select(['id' => 1])['state'];
            // $await = $orderstate->select(['id'=>2])['state'];
            // $take = $orderstate->select(['id'=>3])['state'];
            // $cancel = $orderstate->select(['id'=>4])['state'];
            // echo $allorder;
            // var_dump($allorder);
            // echo $allorder['state'];
            // var_dump($resultstate);
            $data = $result;
            $o_id = null;
            $arr = [];
            foreach($data as $item){
                $o_id = $item['o_id'];
                // echo $o_id."</br>";
                $sql  = "select * from orderrelation_view where o_id = '$o_id' ";
                $result_produce = $pdo->selectAll($sql);
                $arr[] =  $result_produce;
            }

            include_once ROOT_PATH."view/front/user/order.html";
    }