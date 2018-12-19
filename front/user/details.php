<?php
    require_once "../../start.php";
    require_once ROOT_PATH."model/User.class.php";
    include_once ROOT_PATH.'model/Vinegar.class.php';
    include_once ROOT_PATH.'model/Comment.class.php';
    include_once ROOT_PATH.'model/Reply_view.class.php';
    include_once ROOT_PATH.'model/Shopping.class.php';
    $vinegar = new Vinegar();
    $comment = new Comment();
    $reply_view = new Reply_view();
    $shopping = new Shopping();
    // $v_comment = new V_comment();
    if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user']['id'];
        }else{
            $user_id="";
        }
    $user = new User();
    $pdo = new MyPDO();
    include_once ROOT_PATH."front/vinegar/nav_hide.php";
    $id = $_GET['id'];
    // echo $id;
    // $id = $_POST['id'];
    $data_id = ['id'=> $id];
    $result_id = $vinegar->select($data_id);
    // var_dump($result_id);
    $data_id  = $result_id;
    $sql  = "select * from comment_view where v_id = $id order by addtime desc ";
    $result_comment = $pdo->selectAll($sql);
    // var_dump($result_comment);
    $resultuser= $shopping->selectMany(['user_id'=>$user_id]);
    // var_dump($resultuser);
    // var_dump($result_id[]);
    // echo($result_id['id']);
    // var_dump($resultuser['user_id']);
    $arr2=[];
    foreach($resultuser as $item){
        $arr2[] = $item['v_id'];
        // echo $item['v_id']."<br>";
    }
    // var_dump($arr2);
    // echo $arr2['v_id'];
    // echo $arr2;
    // var_dump($arr);
    // echo($zztid);
    // echo($resultuser['v_id']);



    // $result_reply = $reply_view->select(['c_id'=> $id]);
    // var_dump($result_reply);

    // var_dump($result_reply);
    // echo (gettype($result_comment));
    // $result_reply = [];
    // $arr = [];
    $dataresult = [];
    foreach ($result_comment as $item){
        $c_id = [];
        $c_id = $item['c_id'];
        // echo $c_id;
        $arr[] = $c_id;
        $sql2  = "select * from reply_view where c_id = $c_id";
        // $result_reply = $reply_view->selectMany(['c_id'=> $c_id]);
        $result_reply[] = $pdo->selectAll($sql2);
        // print_r($result_reply);
        $dataresult = $result_reply;
    }
    // var_dump($dataresult);
//    var_dump($data_arr);
//     if($dataresult == null){
//         return;
// }else{
    $ccc = [];
    foreach ($dataresult as $key => $value) {
        foreach ($value as $item) {
            $ccc[] = $item['c_id'];
            $r_userid = $item['r_user_id'];
            $r_username = $item['r_username'];
            $r_addtime = $item['r_addtime'];
            $r_content = $item['r_content'];
        }
    }

        foreach($ccc as $item){

            $ddd = $item;
            // echo $item;
        }

// }



    // echo $item['c_id'];
    // echo $item['c_id'];
    // var_dump($r_username);
    // var_dump($arr);
    
    // $c_id = $item['c_id'];
    // $sql2  = "select * from reply_view where c_id = $c_id";
    // $result_reply = $pdo->selectAll($sql2);

    // var_dump ($c_id);
    // $sql2  = "select * from reply_view where c_id = $c_id";
    // $result_reply = $pdo->selectAll($sql2);
    // var_dump($result_reply);
    // }
    // $data_result = $result_reply;
    // var_dump($result_reply); 

     
    // var_dump($c_id);
// $reply_view->selectMany()
    
    // foreach($result_reply as $item){
    //     $r_id = $item['r_id'];
    // }
    // echo $r_id;
       
    // foreach($result_comment as $item){
    //     if(count($item['username'])<=0){
    //         $index = 
    //     } 

    // }
    // $result_comuser = $result_comment['username'];
    // var_dump($result_comment);


    // $result_comment = $v_comment->selectMany();
    // var_dump($result_comment);
    // if(isset($_SESSION['user']['id']))
    // {
    //     $result = $user->getAllUsers(['user_id'=>$_SESSION['user']['id']]);
    //     $user_image = $user->select(['user_id'=>$_SESSION['user']['id']])['image'];
    // }else{
    //     $result = $user->getAllUsers();
    //     $category_name="";
    // }
    // $data = $result;
    // $comment = $_POST['comment'];
    // $text = $_POST['text'];
    // $data = [
    //     'content' => $comment,
    //     'addtime' => date('y-m-d H:i:s',time())
    // ];
    include_once ROOT_PATH."view/front/user/details.html";
    // var_dump($data);
    // $category_id = $category->select($id);
    // $result=  $flower->getFlowerById($id);
    // $categoryModel = new Category();
    // $flowercategrow = $categoryModel->select(['id'=>$result['category_id']]);
    // $relateFlower = $flower->getAllFlowers(['category_id'=>$result['category_id']]);
    // $data = $result;
    // include_once ROOT_PATH.'view/front/flower/show.html';





