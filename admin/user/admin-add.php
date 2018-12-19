<?php
require_once "../../start.php";
Helper::checkLogin();
require_once ROOT_PATH."model/User.class.php";
function dopost(){
    $user = new User();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $sex = $_POST['sex'];
    $role = $_POST['role'];


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
        'username' => $username,
        'password' => $password,
        'email' => $email,
        'phone_number' => $phone_number,
        'sex' => $sex,
        'role' => $role,
        'image' => $img,
        'addtime' => date('y-m-d H:i:s',time())
    ];
    
    $result = $user->add($data);
    // var_dump($result);
    if($result == 1){
    echo "<script type='text/javascript'>
        var index = parent.layer.getFrameIndex(window.name);
         parent.layer.close(index);
        </script>";
    }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        dopost();
        include_once ROOT_PATH."view/admin/user/admin-add.html";
        // include_once ROOT_PATH."view/admin/user/admin-list.html";
    }else{
        // dopost();
        include_once ROOT_PATH."view/admin/user/admin-add.html";
    }
    