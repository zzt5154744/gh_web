<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/12
 * Time: 16:29
 */
class Model
{
    private $_table;//表名和model名存在对应关系
    protected $mypdo; //原来是自由的，改成protected,是为了对于条件复杂的查询，子类可以直接使用它。
    //protected $model;//model类的名字,但是目前看不出子类要它有什么用
    public function __construct()
    {
        $this->mypdo=new MyPDO();
        //get_class返回的是当前的表名
        $this->_table =  get_class($this);

    }

    public function add($data)
    {
        //sprintf() 函数把格式化的字符串写入变量中
        $sql=sprintf("insert into %s (%s) values (%s)",$this->_table,
        //formatFields()函数表示序列化$data形参.例如:id,name,decriction     
        //formatInsertFields()函数表示实参:id,:name,:decriction  
            $this->formatFields($data),$this->formatInsertFields($data));
        return  $this->mypdo->nonQuery($sql,$data);
    }
    public function delete($data)
    {
        $sql=sprintf("delete from %s where %s",$this->_table,$this->formatConditionFields($data));
        return  $this->mypdo->nonQuery($sql,$data);
    }
    public function update($data,$id)
    {
        $sql=sprintf("update %s set %s  where id=%s",$this->_table,
            $this->formatUpdateFields($data),$id);

        return $this->mypdo->nonQuery($sql,$data);
    }

    public function categoryupdate($data,$id)
    {
        $sql=sprintf("update %s set %s  where category_id=%s",$this->_table,
            $this->formatUpdateFields($data),$id);

        return $this->mypdo->nonQuery($sql,$data);
    }
    /*
     * select one record
     *
     * */
    // $data:["sex"=>"男","address"=>"丹东"]  查询丹东人的男人  。这里只能查==
    public function select($data)
    {

        $sql=sprintf("select * from %s where %s",$this->_table,
            $this->formatConditionFields($data));
        return $this->mypdo->selectOne($sql,$data);
    }
    /*
     *
     * $data:["sex"=>"男","address"=>"丹东"]  查询丹东人的男人  。这里只能查==
     * $orderby   ["id"=>"asc","name"=>"desc"]
     * LIMIT 接受一个或两个数字参数。参数必须是整数常量。如果给定两个参数，
     * 第一个参数指定第一个返回记录行的偏移量，第二个参数指定返回记录行的最大数目。
     * 初始记录行的偏移量是 0(而不是 1)：最后一个参数是-1表示到最后一个记录
     * 例如 limit LIMIT [offset,] rows
     *  $count : “5” 或   "5,10"
     *
     */
    public function selectMany($conditionData=null,$count=null,$orderby=null)
    {

        $sql="";
        if($count==null ){
            $countSQL='';
        }else{
            $countSQL="  limit ".$count;
        }
        if($orderby==null){
            $orderbySQL=' order by id desc ';
        }else
        {
            $orderbySQL=" order by ";
            foreach($orderby as $key=>$value)
            {
                $orderSQL="  ".$key."  ".$value;
                $orderbySQL .= $orderSQL.',';
            }
            //去除字符串最后一个字符
            $orderbySQL=substr($orderbySQL,0,strlen($orderbySQL)-1);
        }
        if(!isset($conditionData)) {
            $sql=sprintf("select * from %s  ",$this->_table);
        }else{
            $sql=sprintf("select * from %s where %s ",$this->_table,
                $this->formatConditionFields($conditionData));

        }
        $sql=$sql.$orderbySQL.$countSQL;

        return $this->mypdo->selectAll($sql,$conditionData);
    }


    public function selectreplyMany($conditionData=null,$count=null,$orderby=null)
    {

        $sql="";
        if($count==null ){
            $countSQL='';
        }else{
            $countSQL="  limit ".$count;
        }
        if($orderby==null){
            $orderbySQL=' order by r_id desc ';
        }else
        {
            $orderbySQL=" order by ";
            foreach($orderby as $key=>$value)
            {
                $orderSQL="  ".$key."  ".$value;
                $orderbySQL .= $orderSQL.',';
            }
            //去除字符串最后一个字符
            $orderbySQL=substr($orderbySQL,0,strlen($orderbySQL)-1);
        }
        if(!isset($conditionData)) {
            $sql=sprintf("select * from %s  ",$this->_table);
        }else{
            $sql=sprintf("select * from %s where %s ",$this->_table,
                $this->formatConditionFields($conditionData));

        }
        $sql=$sql.$orderbySQL.$countSQL;

        return $this->mypdo->selectAll($sql,$conditionData);
    }


    public function selectManyview($conditionData=null,$count=null,$orderby=null)
    {

        $sql="";
        if($count==null ){
            $countSQL='';
        }else{
            $countSQL="  limit ".$count;
        }
        if($orderby==null){
        }else
        {
            foreach($orderby as $key=>$value)
            {
                $orderSQL="  ".$key."  ".$value;
                $orderbySQL .= $orderSQL.',';
            }
            //去除字符串最后一个字符
            $orderbySQL=substr($orderbySQL,0,strlen($orderbySQL)-1);
        }
        if(!isset($conditionData)) {
            $sql=sprintf("select * view %s  ",$this->_table);
        }else{
            $sql=sprintf("select * view %s where %s ",$this->_table,
                $this->formatConditionFields($conditionData));

        }
        $sql=$sql.$orderbySQL.$countSQL;

        return $this->mypdo->selectAll($sql,$conditionData);
    }

    public function selectcategoryMany($conditionData=null,$count=null,$orderby=null)
    {

        $sql="";
        if($count==null ){
            $countSQL='';
        }else{
            $countSQL="  limit ".$count;
        }
        if($orderby==null){
            $orderbySQL=' order by category_id asc ';
        }else
        {
            $orderbySQL=" order by ";
            foreach($orderby as $key=>$value)
            {
                $orderSQL="  ".$key."  ".$value;
                $orderbySQL .= $orderSQL.',';
            }
            //去除字符串最后一个字符
            $orderbySQL=substr($orderbySQL,0,strlen($orderbySQL)-1);
        }
        if(!isset($conditionData)) {
            $sql=sprintf("select * from %s  ",$this->_table);
        }else{
            $sql=sprintf("select * from %s where %s ",$this->_table,
                $this->formatConditionFields($conditionData));

        }
        $sql=$sql.$orderbySQL.$countSQL;

        return $this->mypdo->selectAll($sql,$conditionData);
    }

    // name,age,sex,address
    private function formatFields($data)
    {
        $array=[];
        foreach($data as $key=>$value)
        {
            $array[]=$key;
        }
        $fields= implode(",",$array);
        return $fields;
    }
    //name=:name,age=:age,address=:address
    private function formatUpdateFields($data)
    {
        $array=[];
        foreach($data as $key=>$value)
        {
            $array[]=$key."=:".$key;
        }
        $fields= implode(",",$array);
        return $fields;
    }
    private function formatInsertFields($data)
    {
        $array=[];
        foreach($data as $key=>$value)
        {
            $array[]=":".$key;
        }
        $fields= implode(",",$array);
        return $fields;
    }
    private function formatConditionFields($data)
    {
        $array=[];
        foreach($data as $key=>$value)
        {
            $array[]=$key."=:".$key;
        }
        $fields= implode(" and ",$array);
        return $fields;
    }
    //张三，15，丹东
    private function createValues($data)
    {
        $array=[];
        foreach($data as $key=>$value)
        {
            $array[]=$value;
        }
        $fields= implode(",",$array);
        return $fields;
    }
    //pagerData=[PageSize PageIndex ]
    public function queryPage(&$pagerData,$condition=null)
    {
        if(isset($condition)){
            $sql=sprintf("select count(id)  from %s where %s",$this->_table,$this->formatConditionFields($condition));
        }else{
            $sql=sprintf("select count(id) from %s ",$this->_table);
        }
        $totalNum=$this->mypdo->selectOne($sql,$condition);

        $totalNum=$totalNum['count(id)']  ;//总记录数；
        $pageSize=$pagerData['pageSize'];
        $pageIndex=$pagerData['pageIndex'];
        $pageCount=ceil($totalNum/$pageSize);
        //使用sql语句时，注意有些变量应取出赋值。
        $pre = ($pageIndex-1)*$pageSize;
        $tmp=sprintf(" limit %s ,%s",$pre,$pageSize);
        if(isset($condition)){
            $sql=sprintf("select *  from %s where %s",$this->_table,$this->formatConditionFields($condition));
        }else{
            $sql=sprintf("select * from %s ",$this->_table);
        }

        $sql=$sql.$tmp;
        //echo "查询的语句".$sql;
        $result=$this->mypdo->selectAll($sql,$condition);

        $pagerData['pageCount']=$pageCount;
        return $result;
    }
}