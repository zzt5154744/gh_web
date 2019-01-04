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
        }else{
        $user_id = "";
        }
        // $id = $_GET['id'];
        $s_id = $_POST['s_id'];
        $num = $_POST['num'];
        echo $num;
        $sql  = "update shopping set num = $num where id = $s_id";
        $data = [
            'num' => $num
        ];
        $result = $pdo->nonQuery($sql,$data);
    