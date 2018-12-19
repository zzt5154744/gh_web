<?php

require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Comment.class.php';
include_once ROOT_PATH.'model/Comment_view.class.php';
    $pdo = new MyPDO();
    // $comment = new Comment();
    $Comment_view = new Comment_view();
    $user = new User();
    $vinegar = new Vinegar();
    // $Comment_view->selectMany();
    $sql  = "select * from comment_view";
    // $result = $comment->select();
    $result_comment = $pdo->selectAll($sql);

    $u_count  = count($result_comment);
    
    include_once ROOT_PATH."view/admin/comment/comment-list.html";