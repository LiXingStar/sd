<?php
//$cardid = $_GET['cardid'];
$cardid = '142726200112260343';
include_once 'db.php';

$sql = "select * from student where cardid='{$cardid}'";

$result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

if(count($result)>0){
    $msg = [
        'code'=>0,
        'msg'=>'身份证输入正确'
    ];
}else{
    $msg = [
        'code'=>1,
        'msg'=>'身份证输入有误'
    ];
}

echo json_encode($msg);