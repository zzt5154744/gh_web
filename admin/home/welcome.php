<?php
include_once "../../start.php";
include_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH."model/Vinegar.class.php";
include_once ROOT_PATH."model/Comment.class.php";
include_once ROOT_PATH."model/Category.class.php";
include_once ROOT_PATH."model/reply_view.class.php";

$role = $_SESSION['user']['role'];
if($role ==1 ){
    Helper::checkLogin();
}
$user = new User();
$vinegar = new Vinegar();
$comment = new Comment();
$reply_view = new Reply_view();
// echo PHP_VERSION;
$category  = new Category();
$u_result = $user->selectMany();

$u_count = count($u_result);
// echo($u_count);
$v_result = $vinegar->selectMany();
$v_count = count($v_result);
// echo $v_count;
$c_result = $comment->selectMany();
$c_count = count($c_result);

$ca_result = $category->selectcategoryMany();
$ca_count = count($ca_result);

$re_result = $reply_view->selectreplyMany();
$re_count  = count($re_result);


if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['id'];
    }else{
    $user_id = "";
    }

$user_name = $user->select(['id' => $user_id]);
$username = $user_name['username'];
// echo $username;

include_once ROOT_PATH."view/admin/home/welcome.html";

