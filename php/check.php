<?php
$cardid = $_GET['cardid'];
include_once 'db.php';

$sql = "select * from student where cardid='{$cardid}'";

$result = $mysql->query($sql)->fetch_assoc();



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