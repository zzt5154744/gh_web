<?php

    include_once "../../start.php";
    require_once ROOT_PATH."model/Category.class.php";

    function dopost(){
        $category = new Category();
        $category_name = $_POST['category_name'];
        $description = $_POST['description'];
        // echo $category_name;
        $data = [
            'category_name' => $category_name,
            'description' => $description
        ];

        $category->add($data);
    }

     if($_SERVER['REQUEST_METHOD'] == 'POST')
     {
        
        dopost();
        
     }else{

        include_once ROOT_PATH.'view/admin/category/category-add.html';
     }