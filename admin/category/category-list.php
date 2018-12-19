<?php

    require_once "../../start.php";
    require_once ROOT_PATH."model/Category.class.php";
    Helper::checkLogin();
    $category = new Category();
    $pdo = new MyPDO();
    $sql = "select * from category";
    $result = $pdo->selectall($sql);
    $data = $result;
    $category  = new Category();
    // $u_result = $user->selectMany();
    // $u_count = count($u_result);
    $ca_result = $category->selectcategoryMany();
    $ca_count = count($ca_result);
    include ROOT_PATH."view/admin/category/category-list.html";
?>
