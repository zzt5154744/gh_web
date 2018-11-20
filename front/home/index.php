<?php

include_once '../../start.php';
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Category.class.php';
$vinegar = new Vinegar();
$category = new Category();
// $int= 1;
// $category_result = $category->selectcategoryMany(['category_id' => 1]);
// var_dump($category_result);
$result=  $vinegar->selectMany(['category_id' => 1]);
$data = $result;
$category_result2 =  $vinegar->selectMany(['category_id' => 2]);
$category_result3 =  $vinegar->selectMany(['category_id' => 3]);
$category_result4 =  $vinegar->selectMany(['category_id' => 4]);
$category_result5 =  $vinegar->selectMany(['category_id' => 5]);
// var_dump($data);
// $newflower = $flower->selectMany(null,'0,6',['addtime'=> 'desc']);
include_once ROOT_PATH.'view/front/home/index.html';