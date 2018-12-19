<?php
require_once "../../start.php";
// Helper::checkLogin();
require_once ROOT_PATH.'model/Vinegar.class.php';
Helper::checkLogin();
function dopost(){
    $vinegar = new Vinegar();
    $name = $_POST['name'];
    $price = $_POST['price'];
    $ml = $_POST['ml'];
    $category_id = $_POST['category_id'];
    if($_FILES['image']['error']==0)
    {
        echo "asdas";
        $ext_arr=array('jpg','jpeg','gif','bmp','png');
        $file_arr=explode('.',$_FILES['image']['name']);
        $file_ext=array_pop($file_arr);
        $file_ext=trim($file_ext);
        $file_ext=strtolower($file_ext);
        if(in_array($file_ext,$ext_arr)===false) //上传文件的扩展名不在扩展名数组中
        {
            $img="";
            echo "上传文件的扩展名不在数组中";
        }else
        {
            $img=time().".".$file_ext;
            move_uploaded_file($_FILES['image']['tmp_name'],'../../public/upload/'.$img);
        }
    }
    else{
    $img = '';
    }


    $data = [
        'name' => $name,
        'price' => $price,
        'ml' => $ml,
        'image' => $img,
        'addtime' => date('y-m-d H:i:s',time()),
        'category_id' => $category_id
    ];
    
    $result = $vinegar->add($data);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        dopost();
    }else{
        include_once ROOT_PATH."model/Category.class.php";
        $catemodel = new Category();
        $result = $catemodel ->selectcategoryMany();
        $categorydata = $result;
        include_once ROOT_PATH."view/admin/vinegar/vinegar-add.html";
    }
    