<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 16:42
 */
class Helper{

    public static function checkLogin()
    {
        if(isset($_SESSION["user"]))//这里改了,将此用户的信息放入user
        {
            return  ;
        }
        else
        {
            $returnUrl=$_SERVER["REQUEST_URI"];
            header("Location:../../admin/user/admin-login.php?returnUrl=".$returnUrl);
            exit;
        }
    }
    public static function checkLogin_f()
    {
        if(isset($_SESSION["user_f"]))//这里改了,将此用户的信息放入user
        {
            return  ;
        }
        else
        {
            $returnUrl=$_SERVER["REQUEST_URI"];
            header("Location:../../front/user/admin-login.php?returnUrl=".$returnUrl);
            exit;
        }
    }


    /*
     * $url :   子模块名/php文件名
     * */
    public static function renderPartialView($url)
    {
        //http://www.jb51.net/article/25193.htm
        $ary= explode("/",$_SERVER['PHP_SELF'] );

        array_pop($ary);//过滤页面文件

        array_pop($ary);//过滤子目录

        $fullUrl ="Http://".$_SERVER['HTTP_HOST'].implode("/",$ary)."/".$url;

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $fullUrl);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);    //超时时间30s
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }
}