<?php 
require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
    $vinegar = new Vinegar();
    $user = new User();
    $pdo = new MyPDO();
    $shopping = new Shopping();

    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user']['id'];
        $username = $_SESSION['user']['username'];
        }else{
        $user_id = "";
        }


            $sql  = "select * from shopping_view where user_id = $user_id";
            $result_shopping = $pdo->selectAll($sql);
            $sum = 0;
            foreach($result_shopping as $item){
                $sum += $item['price'] * $item['num'];
                // $username = $item['username'];
                $num = $item['num'];
            }
        
            $shoppingcount = count($result_shopping);
            include_once ROOT_PATH."view/front/user/shoppingcar.html";
        