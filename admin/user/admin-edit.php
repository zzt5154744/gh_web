<?php 

include_once "../../start.php";
include_once "../../model/User.class.php";
$user = new User();
Helper::checkLogin();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$id = $_GET['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$sex = $_POST['sex'];
$email =  $_POST['email'];
$phone_number = $_POST['phone_number'];
$oldimg = $_POST['oldimg'];
$role = $_POST['role'];
if($_FILES['image']['error']==0)
{
    $ext_arr=array('jpg','jpeg','gif','bmp');   
    $file_arr=explode('.',$_FILES['image']['name']);
    $file_ext=array_pop($file_arr);
    $file_ext=trim($file_ext);
    $file_ext=strtolower($file_ext);
    if(in_array($file_ext,$ext_arr)===false) //上传文件的扩展名不在扩展名数组中
    {
        $img=$oldimg;
    }else
    {
        $img=time().".".$file_ext;
        move_uploaded_file($_FILES['image']['tmp_name'],UPLOAD_PATH.$img);
    }
}else //不成功时，文件为空
{
    $img=$oldimg;
}


$data = [
    "username" => $username,
    "password" => $password,
    "sex" => $sex,
    "email" => $email,
    "phone_number" => $phone_number,
    "role" => $role,
    "image" => $img,
    "addtime" => date('y-m-d H:i:s',time())
];
$result = $user->update($data,$id);
if($result == 1){
    echo "<script type='text/javascript'>
        var index = parent.layer.getFrameIndex(window.name);
         parent.layer.close(index);
        window.alert('编辑成功');
        </script>";
    }
}
else
{  
    $id = $_GET['id'];
    $data = ['id'=> $id];
    $result = $user->select($data);
    $data = $result;
    include_once ROOT_PATH."view/admin/user/admin-edit.html";
}    
