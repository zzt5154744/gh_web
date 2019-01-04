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
            $user = new User();
        $uid = $_GET['id'];
        $password = $_POST['password'];
        $result_id = $user->select(['id'=>$uid]);
        if($password == $result_id['password']){
            $mark = 1;
            echo "成功";
            include_once ROOT_PATH."view/front/home/index.html";
        }else{
            $mark = 0;
            echo "密码错误";
        }
        

