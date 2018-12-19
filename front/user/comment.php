
<?php
require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Comment.class.php';
function dopost(){
    $id = $_GET['id'];
    $comment = new Comment();
    $content = $_POST['comment'];
    if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['id'];
    // echo $user_id;
    }else{
    $user_id = "";
    }  
$data  = [
    'user_id' => $user_id,
    'content' => $content,
    'v_id' => $id,
    'addtime' => date('y-m-d H:i:s',time()),
];


    $result = $comment->add($data);
    header("location:details.php?id=$id");
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    dopost();
    include_once ROOT_PATH."view/front/user/details.html";
        // echo "成功";
    // include_once ROOT_PATH."view/admin/user/admin-list.html";
}else{
    // $vinegar = new Vinegar();
    // $comment = new Comment();
    // $reply_view = new Reply_view();
    // // $v_comment = new V_comment();
    // $user = new User();
    // $pdo = new MyPDO();
    // include_once ROOT_PATH."front/vinegar/nav_hide.php";
    // $id = $_GET['id'];
    // // $id = $_POST['id'];
    // $data_id = ['id'=> $id];
    // $result_id = $vinegar->select($data_id);
    // $data_id  = $result_id;
    // $sql  = "select * from comment_view where v_id = $id";
    // $result_comment = $pdo->selectAll($sql);
    
    // $result = $comment->add($data);

    include_once ROOT_PATH."view/front/user/details.html";
}
// var_dump($data);

// $category_id = $category->select($id);
// $result=  $flower->getFlowerById($id);
// $categoryModel = new Category();
// $flowercategrow = $categoryModel->select(['id'=>$result['category_id']]);
// $relateFlower = $flower->getAllFlowers(['category_id'=>$result['category_id']]);
// $data = $result;
// include_once ROOT_PATH.'view/front/flower/show.html';





