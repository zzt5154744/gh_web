<?php
    require_once "../../start.php";
    require_once ROOT_PATH."model/User.class.php";
    include_once ROOT_PATH.'model/Vinegar.class.php';
    include_once ROOT_PATH.'model/Comment.class.php';
    include_once ROOT_PATH.'model/Reply_view.class.php';
    include_once ROOT_PATH.'model/Shopping.class.php';
    $vinegar = new Vinegar();
    $comment = new Comment();
    $reply_view = new Reply_view();
    $shopping = new Shopping();
    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user']['id'];
        }else{
            $user_id="";
        }
    $user = new User();
    $pdo = new MyPDO();
    include_once ROOT_PATH."front/vinegar/nav_hide.php";
    $id = $_GET['id'];
    $data_id = ['id'=> $id];
    $result_id = $vinegar->select($data_id);
    $data_id  = $result_id;
    $sql  = "select * from comment_view where v_id = $id order by addtime desc ";
    $result_comment = $pdo->selectAll($sql);
    $resultuser= $shopping->selectMany(['user_id'=>$user_id]);
    $arr2=[];
    foreach($resultuser as $item){
        $arr2[] = $item['v_id'];
    }
    $dataresult = [];
    foreach ($result_comment as $item){
        $c_id = [];
        $c_id = $item['c_id'];
        $arr[] = $c_id;
        $sql2  = "select * from reply_view where c_id = $c_id";
        $result_reply[] = $pdo->selectAll($sql2);
        $dataresult = $result_reply;
    }
    $ccc = [];
    foreach ($dataresult as $key => $value) {
        foreach ($value as $item) {
            $ccc[] = $item['c_id'];
            $r_userid = $item['r_user_id'];
            $r_username = $item['r_username'];
            $r_addtime = $item['r_addtime'];
            $r_content = $item['r_content'];
        }
    }

        foreach($ccc as $item){

            $ddd = $item;
        }

    include_once ROOT_PATH."view/front/user/details.html";





