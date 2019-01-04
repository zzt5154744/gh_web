
<?php
require_once "../../start.php";
require_once ROOT_PATH."model/User.class.php";
include_once ROOT_PATH.'model/Vinegar.class.php';
include_once ROOT_PATH.'model/Shopping.class.php';
function dopost(){
    $id = $_GET['id'];
    $shopping = new Shopping();
    if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['id'];
    }else{
    $user_id = "";
    }

$data  = [
    'user_id' => $user_id,
    'v_id' => $id,
    'num' => 1,
    'addtime' => date('y-m-d H:i:s',time()),
];

    $result = $shopping->add($data);
    $shopresult = $shopping->selectMany(['user_id'=>$user_id]);
    header("location:details.php?id=$id");
    
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    dopost();
 
}else{

    include_once ROOT_PATH."view/front/user/details.html";
}






