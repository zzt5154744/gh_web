<?php 
require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
    $vinegar = new Vinegar();
    // $comment = new Comment();
    // $v_comment = new V_comment();
    $user = new User();
    $pdo = new MyPDO();
    $shopping = new Shopping();
    if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['id'];
    }else{
    $user_id = "";
    }
    // $id = $_GET['id'];
    // $data_id = ['id'=> $id];
    // $result_id = $vinegar->select($data_id);
    // $data_id  = $result_id;
    $sql  = "select * from shopping_view where user_id = $user_id";
    $result_shopping = $pdo->selectAll($sql);
    $sum = 0;
    foreach($result_shopping as $item){
        $sum += $item['price'];
        $username = $item['username'];
        // echo($sum);
    }
    $shoppingcount = count($result_shopping);
    include_once ROOT_PATH."view/front/user/shoppingcar.html";


?>