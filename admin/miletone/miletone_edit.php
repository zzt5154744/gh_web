<?php
    require_once "../../start.php";
    include_once ROOT_PATH."model/Milestone.class.php";
    Helper::checkLogin();
    $miestone = new Milestone();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $introduce = $_POST['introduce'];
    $year = $_POST['year'];
    $data = [
        "id" => $id,
        "title" => $title,
        "description" => $description,
        "year" => $year,
        "introduce" => $introduce
    ];
    $result = $miestone->update($data,$id);
        echo "<script type='text/javascript'>
            var index = parent.layer.getFrameIndex(window.name);
             parent.layer.close(index);
            window.alert('编辑成功');
            </script>";
    }
    else
    {
        $id = $_GET['id'];
        $data = ['id' => $id];
        $result = $miestone->select($data);
        $data = $result;
        include_once ROOT_PATH."view/admin/miletone/miletone_edit.html";
    }