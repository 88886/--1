<?php
    $server="localhost";//主机
    $db_username="localhost";//你的数据库用户名

    $con = mysql_connect($server,$db_username);//链接数据库
    if(!$con){
        die("can't connect".mysql_error());//如果链接失败输出错误
    }
    
    mysql_select_db('vehicle',$con);//选择数据库（我的是test）
    mysql_query("set names utf8");
?>