<?php

require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Reply.class.php';
include_once ROOT_PATH.'model/Reply_view.class.php';
    $pdo = new MyPDO();
    // $comment = new Comment();
    $Reply_view = new Reply_view();
    $user = new User();
    $vinegar = new Vinegar();
    $sql  = "select * from reply_view";
    $result_reply = $pdo->selectAll($sql);

    $u_count  = count($result_reply);
    
    include_once ROOT_PATH."view/admin/reply/reply-list.html";