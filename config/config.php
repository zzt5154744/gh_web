<?php
    $config = [
        "host"=>"127.0.0.1",
        "port"=>3306,
        "user"=>"root",
        "password"=>"123456", 
        "db_name"=>"gh_web",
        "charset"=>"utf8"
    ];
    define('DB_HOST',$config['host']);
    define('DB_NAME',$config['db_name']);
    define('DB_USER',$config['user']);
    define('DB_PASSWORD',$config['password']);
    define('DB_CHARSET',$config['charset']);

?>