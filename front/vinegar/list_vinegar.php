<?php

require_once "../../start.php";
function dopost(){
    include_once ROOT_PATH.'model/Vinegar.class.php';
    $vinegar = new Vinegar();
    include_once ROOT_PATH."front/vinegar/nav_hide.php";
    $v_name = $_POST['v_name'];
    $pdo = new MyPDO();
    $sql = "select * from vinegar where name like '%$v_name%'";
    $result = $pdo->selectAll($sql); 
    if($result == []){
        include_once ROOT_PATH."view/front/vinegar/info.html";
    }
    include_once ROOT_PATH."view/front/vinegar/list_vinagar.html";
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    dopost();
}   
else
{
    include_once ROOT_PATH.'model/Vinegar.class.php';
    $vinegar = new Vinegar();
include_once ROOT_PATH."front/vinegar/nav_hide.php";
    $result = $vinegar->selectMany();
    include_once ROOT_PATH."view/front/vinegar/list_vinagar.html";
}
