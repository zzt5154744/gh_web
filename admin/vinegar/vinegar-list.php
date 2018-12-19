<?php
//以前的数据库连接
// require_once('config.php');
// $pdo = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}","{$config['user']}","{$config['passsword']}");
// $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// $pdo->exec("set names {$config['charset']}");
require_once "../../start.php";
// Helper::checkLogin();
require_once ROOT_PATH.'model/Vinegar.class.php';
require_once ROOT_PATH.'model/Category.class.php';
Helper::checkLogin();
$categoryModel = new Category();
$vinegar = new Vinegar();
// $pdo = new MyPDO();
if(isset($_POST['category_id']))
{
    $result = $vinegar->getAllVinegars(['category_id'=>$_POST['category_id']]);
    var_dump($result);
    $category_name = $categoryModel->select(['category_id'=>$_POST['category_id']])['name'];
}else{
    $result = $vinegar->getAllVinegars();
    // var_dump($result);
    $category_name="";
}
$data = $result;
$v_result = $vinegar->selectMany();

$v_count = count($v_result);

$categorys = $categoryModel ->selectcategoryMany();
    // $id = $_GET['id'];
    // $data = ['id'=> $id];
    // $result = $vinegar->select($data);
    // $data = $result;
// $flowercategrow = $categoryModel->select(['category_id'=>$result['category_id']]);
// $relateFlower = $flower->getAllFlowers(['category_id'=>$result['category_id']]);
// $sql = "select * from vinegar";
// $result = $pdo->selectAll($sql);
// $data = $result;

include ROOT_PATH."view/admin/vinegar/vinegar-list.html";
// include ROOT_PATH."view/admin/index.html";

// $result=  $flower->getFlowerById($id);
// $categoryModel = new Category();
// $flowercategrow = $categoryModel->select(['id'=>$result['category_id']]);
// $relateFlower = $flower->getAllFlowers(['category_id'=>$result['category_id']]);
// $data = $result;
?>