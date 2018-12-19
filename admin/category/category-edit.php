<?php
    require_once "../../start.php";
    include_once ROOT_PATH."model/Category.class.php";
    Helper::checkLogin();
    $category = new Category();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $category_name = $_POST['category_name'];
    $description = $_POST['description'];
    $data = [
        "category_id" => $id,
        "category_name" => $category_name,
        "description" => $description
    ];
    $result = $category->categoryupdate($data,$id);
        echo "<script type='text/javascript'>
            var index = parent.layer.getFrameIndex(window.name);
             parent.layer.close(index);
            window.alert('编辑成功');
            </script>";
    }
    else
    {
        $id = $_GET['id'];
        $data = ['category_id' => $id];
        $result = $category->select($data);
        $data = $result;
        include_once ROOT_PATH."view/admin/category/category-edit.html";
    }