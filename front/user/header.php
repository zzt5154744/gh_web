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

    
    function dopost(){
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
            }else{
            $user_id = "";
            }
            $user = new User();
        $uid = $_GET['id'];
        $password = $_POST['password'];
        $result_id = $user->select(['id'=>$uid]);
        if($password == $result_id['password']){
            $mark = 1;
        }
        include_once ROOT_PATH."view/front/home/index.html";
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
    dopost();
    }
    else{
        $mark = 0;
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
            }else{
            $user_id = "";
            }
            $sql  = "select * from shopping_view where user_id = $user_id";
            $result_id = $user->select(['id'=>$user_id]);
            $result_shopping = $pdo->selectAll($sql);
            $count = count($result_shopping);
            $sum = 0;
            foreach($result_shopping as $item){
                $sum += $item['price'];
            }
            $user = new User();
            $userid = $_SESSION['user']['id'];
            $result22 = $user->select(['id'=>$userid]);
            $dataresult = $result22;
             include_once ROOT_PATH."view/front/header.html";

    }
    

    