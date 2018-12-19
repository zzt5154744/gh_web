<?php

include_once '../../start.php';
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Category.class.php';
$vinegar = new Vinegar();
$category = new Category();
include_once ROOT_PATH."front/vinegar/nav_hide.php";
// var_dump($data);
$result =  $vinegar->selectMany(['tab'=>1],'0,5',['addtime'=>'desc']);
$result_two =  $vinegar->selectMany(['tab'=>1],'5,10',['addtime'=>'desc']);
$data = $result;

$datatwo = $result_two;
include_once ROOT_PATH.'view/front/home/index.html';