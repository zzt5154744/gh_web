<?php 
require_once "../../start.php";
include_once ROOT_PATH.'model/Orderlist.class.php';
include_once ROOT_PATH.'model/Orderrelation.class.php';
    $pdo = new MyPDO();
    $orderlist  = new Orderlist();
    $orderrelation = new Orderrelation();

    $o_id = $_POST['id'];
    // $id = $_POST['id'];
    // echo $id;
    $data = ['o_id'=>$o_id];
    // $result = $orderlist->delete($data);
    // $result = $orderlist ->select(['o_id' => $o_id]);
    // echo($result);
    // $resultid = $result['o_id'];
    // $num =  3;
    $sql = "update orderlist set state_id = 3 where o_id = '$o_id' ";
    $result = $pdo->nonQuery($sql);
    // $data = [
    //     'state_id' => $num
    // ];
    // $resulted = $orderlist->update($data,$o_id);


    