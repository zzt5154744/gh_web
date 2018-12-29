<?php
include_once '../../start.php';
require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Comment.class.php';
include_once ROOT_PATH.'model/Milestone.class.php';
$vinegar = new Vinegar();
$comment = new Comment();
// $v_comment = new V_comment();
$user = new User();
$pdo = new MyPDO();
$milestone = new Milestone();
$result = $milestone->selectMany();
include_once ROOT_PATH."front/vinegar/nav_hide.php";
include_once ROOT_PATH.'view/front/about/about2.html';
