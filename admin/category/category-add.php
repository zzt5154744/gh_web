<?php

    include_once "../../start.php";
    require_once ROOT_PATH."model/Category.class.php";
    Helper::checkLogin();
    function dopost(){
        $category = new Category();
        $category_name = $_POST['category_name'];
        $description = $_POST['description'];
        $data = [
            'category_name' => $category_name,
            'description' => $description
        ];

        $result = $category->add($data);
        if($result == 1){
            echo "<script type='text/javascript'>
                var index = parent.layer.getFrameIndex(window.name);
                 parent.layer.close(index);
                window.alert('添加成功');
                </script>";
            }
    }

     if($_SERVER['REQUEST_METHOD'] == 'POST')
     {
        
        dopost();
      
     }else{

        include_once ROOT_PATH.'view/admin/category/category-add.html';
     }