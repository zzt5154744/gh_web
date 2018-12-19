<?php
//以前的数据库连接
// require_once('config.php');
// $pdo = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}","{$config['user']}","{$config['passsword']}");
// $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// $pdo->exec("set names {$config['charset']}");
require_once "../../start.php";
// Helper::checkLogin();
require_once ROOT_PATH.'model/User.class.php';
Helper::checkLogin();
$user = new User();
$result = $user->selectMany();
$pdo = new MyPDO();
$sql = "select * from user";
$result = $pdo->selectAll($sql);
$data = $result;
$u_count = count($result);
include ROOT_PATH."view/admin/user/admin-list.html";
// include ROOT_PATH."view/admin/index.html";

?>