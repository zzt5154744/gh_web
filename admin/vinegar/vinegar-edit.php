<?php 

include_once "../../start.php";
include_once "../../model/Vinegar.class.php";
$vinegar = new Vinegar();
Helper::checkLogin();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$id = $_GET['id'];
echo $id;
$name = $_POST['name'];
$price = $_POST['price'];
$ml = $_POST['ml'];
$oldimg = $_POST['oldimg'];
$category = $_POST['category_id'];
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
    "name" => $name,
    "price" => $price,
    "image" => $img,
    "ml" => $ml,
    'category_id' => $category,
    "addtime" => date('y-m-d H:i:s',time())
];
$result = $vinegar->update($data,$id);
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
    include_once ROOT_PATH."model/Category.class.php";
     $catemodel = new Category();
    $categorys = $catemodel ->selectcategoryMany();
    $id = $_GET['id'];
    $data = ['id'=> $id];
    $result = $vinegar->select($data);
    $data = $result;
    include_once ROOT_PATH."view/admin/vinegar/vinegar-edit.html";
}    
