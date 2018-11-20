<?php 

include_once "../../start.php";
include_once "../../model/User.class.php";
$user = new User();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$id = $_GET['id'];
echo $id;
$username = $_POST['username'];
$password = $_POST['password'];
$sex = $_POST['sex'];
$email =  $_POST['email'];
$phone_number = $_POST['phone_number'];
$role = $_POST['role'];
// $img  = $_POST['image'];
// echo $img;
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
    $img="";
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
var_dump($data);
$result = $user->update($data,$id);
echo $result;
}
else
{  
    $id = $_GET['id'];
    echo $id;
    $data = ['id'=> $id];
    $result = $user->select($data);
    $data = $result;
    include_once ROOT_PATH."view/admin/user/admin-edit.html";
}    
