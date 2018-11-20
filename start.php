<?php
session_start();
define('ROOT_PATH',__DIR__.'/');//_DIR_获取的是它所处于的原始文件的路径。
define('PUBLIC_PATH',ROOT_PATH.'public/');
define('UPLOAD_PATH',PUBLIC_PATH.'upload/');
require_once ROOT_PATH.'config/config.php';
require_once ROOT_PATH.'lib/MyPDO.class.php';
require_once ROOT_PATH.'lib/Model.class.php';
require_once ROOT_PATH.'lib/Helper.class.php';
    