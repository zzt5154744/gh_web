<?php

    include_once "../../start.php";
    require_once ROOT_PATH."model/Vinegar.class.php";
    $vinegar = new Vinegar();
    $id = $_POST['id'];
    echo $id;
    $data = ['id'=>$id];
    $result = $vinegar->delete($data);



    