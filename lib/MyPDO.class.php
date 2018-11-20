<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/28
 * Time: 7:37
 */
// require_once "config/config.php";
class MyPDO{
    protected $pdo;
    public function __construct()
    {
        $dsn="mysql:host=".DB_HOST.";dbname=".DB_NAME;
        $username=DB_USER;
        $password=DB_PASSWORD;
        $this->pdo=new PDO($dsn,$username,$password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec("set names ".DB_CHARSET);
    }

    public function selectOne($sql,$data=[])
    {
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($data);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result=$stmt->fetch();
        return $result;
    }

    public function selectAll($sql,$data=[])
    {
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($data);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result=$stmt->fetchAll();
        return $result;
    }

    public function nonQuery($sql,$data=[])
    {
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->rowCount();
    }
}