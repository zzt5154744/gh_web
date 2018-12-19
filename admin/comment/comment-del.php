<?php

require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Comment.class.php';
include_once ROOT_PATH.'model/Comment_view.class.php';
$comment = new Comment();
$id = $_POST['id'];
// echo $id;
$data = ['id' => $id];
$result =  $comment->delete($data);




