<?php

    require_once "../../start.php";
    require_once ROOT_PATH."model/Category.class.php";
    $category = new Category();
    $pdo = new MyPDO();
    $sql = "select * from category";
    $result = $pdo->selectall($sql);
    $data = $result;
    include ROOT_PATH."view/admin/category/category-list.html";
?>
