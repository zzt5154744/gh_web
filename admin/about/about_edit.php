<?php
    require_once "../../start.php";
    include_once ROOT_PATH."model/Company.class.php";
    Helper::checkLogin();
    $company = new Company();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $introduce = $_POST['introduce'];
    $introduce_j = $_POST['introduce_j'];
    $introduce_h = $_POST['introduce_h'];
    $data = [
        "id" => $id,
        "title" => $title,
        "introduce" => $introduce,
        "introduce_j" => $introduce_j,
        "introduce_h" => $introduce_h,
    ];
    $result = $company->update($data,$id);
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
        $result = $company->select($data);
        $data = $result;
        include_once ROOT_PATH."view/admin/about/about_edit.html";
    }