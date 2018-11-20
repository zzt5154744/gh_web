<?php

    include_once "../../start.php";
    require_once ROOT_PATH."model/Category.class.php";
    $category = new Category();
    $id = $_POST['id'];
    echo $id;
    $data = ['category_id'=>$id];
    $result = $category->delete($data);



    