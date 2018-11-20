<?php
    require_once "../../start.php";
    include_once "../../model/Category.class.php";
    $category = new Category();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $category_name = $_POST['category_name'];
    $description = $_POST['description'];
    $data = [
        "category_name" => $category_name,
        "description" => $description
    ];
    var_dump($data);
    $category->update($data,$id);
    }
    else
    {
        $id = $_GET['id'];
        echo $id;
        $data = ['category_id' => $id];
        $result = $category->select($data);
        $data = $result;
        include_once ROOT_PATH."view/admin/category/category-edit.html";
    }