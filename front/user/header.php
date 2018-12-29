<?php
    require_once "../../start.php";
    require_once ROOT_PATH."model/User.class.php";
    include_once ROOT_PATH.'model/Vinegar.class.php';
    include_once ROOT_PATH.'model/Comment.class.php';
    include_once ROOT_PATH.'model/V_comment.class.php';
    $vinegar = new Vinegar();
    $comment = new Comment();
    $v_comment = new V_comment();
    $user = new User();
    $pdo = new MyPDO();

    

    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user']['id'];
        }else{
        $user_id = "";
        }
        // $result_id = $vinegar->select($data_id);
        // $data_id  = $result_id;
        $sql  = "select * from shopping_view where user_id = $user_id";
        $result_id = $user->select(['id'=>$user_id]);
        // var_dump($result_id);
        // echo $result_id['role'];
        $result_shopping = $pdo->selectAll($sql);
        $count = count($result_shopping);
        // echo($count);
        $sum = 0;
        foreach($result_shopping as $item){
            $sum += $item['price'];
            // echo($sum);
        }

         include_once ROOT_PATH."view/front/header.html";