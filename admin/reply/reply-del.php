<?php

require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Reply.class.php';
include_once ROOT_PATH.'model/Comment.class.php';
include_once ROOT_PATH.'model/Comment_view.class.php';
$reply = new Reply();
$id = $_POST['id'];
// echo $id;
$data = ['id' => $id];
$result =  $reply->delete($data);




