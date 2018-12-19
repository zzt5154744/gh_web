
<?php
require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
function dopost(){
    $id = $_GET['id'];
    // $price = $_GET['id']['price'];
    // echo $price;
    // echo $id;
    $shopping = new Shopping();
    if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['id'];
    }else{
    $user_id = "";
    }
    
    
$data  = [
    'user_id' => $user_id,
    'v_id' => $id,
    'addtime' => date('y-m-d H:i:s',time()),
];


    $result = $shopping->add($data);
    // echo $result;
    // if($result == 1){
    //     "<script>alert('已经加入购物车,请到购物车中查看您的商品');</script>";
    // }
    $shopresult = $shopping->selectMany(['user_id'=>$user_id]);
   
    header("location:details.php?id=$id");
    
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    dopost();
        // echo "成功";
    // include_once ROOT_PATH."view/admin/user/admin-list.html";
}else{
    // $resultuser= $shopping->select(['user_id'=>$user_id]);
    // var_dump($resultuser);
    // echo $resultuser;
    // dopost();
    // $shopresult = $shopping->selectMany([['user_id']=>$user_id]);
    // var_dump($shopresult);
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





