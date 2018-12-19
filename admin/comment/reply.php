<?php

    include_once "../../start.php";
    require_once ROOT_PATH."model/Reply.class.php";
    require_once ROOT_PATH."model/Comment.class.php";
    require_once ROOT_PATH."model/Reply_view.class.php";
    Helper::checkLogin();
    function dopost(){
        $reply = new Reply();
        $comment = new Comment();
        $c_id = $_GET['id'];

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
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
            $user_name = $_SESSION['user']['username'];
            $user_img = $_SESSION['user']['image'];
            }else{
            $user_id = "";
            }
        // $username = $user_name;
        // echo($username);
        $resultcom =  $comment->select(['id' => $c_id]);
        $v_id = $resultcom['v_id'];
        $user_id = $resultcom['user_id'];
        $reply_data = $_POST['reply'];
        $data = [
            'r_user_id' => $user_id,
            'r_username' => $user_name,
            'c_id' => $c_id,
            'v_id' => $v_id,
            'user_id' => $user_id,
            'content' => $reply_data,
            'r_image' => $user_img,
            'addtime' => date('y-m-d H:i:s',time()) 
        ];

        $result = $reply->add($data);
        if($result == 1){
            echo "<script type='text/javascript'>
                var index = parent.layer.getFrameIndex(window.name);
                 parent.layer.close(index);
                window.alert('评论成功');
                </script>";
            }
    }

     if($_SERVER['REQUEST_METHOD'] == 'POST')
     {
        
        dopost();
        
     }else{

        include_once ROOT_PATH.'view/admin/comment/reply.html';
     }
