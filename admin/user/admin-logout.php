<?php
    include_once '../../start.php';
    if(isset($_SESSION['user']))
    {
        unset($_SESSION['user']);
    }
    // include_once 'login.php';
    // header("location:index.php");
    include_once ROOT_PATH."admin/user/admin-login.php";