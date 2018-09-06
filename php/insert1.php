<?php
$cardid = $_POST['cardid'];
unset($_POST['cardid']);
$value = $_POST;

include_once 'db.php';
$sql ="update parents set ";
foreach ($value as $k=>$v){
    $sql .= $k ."='".$v."',";
}
$sql = substr($sql,0,-1) ."where cardid='{$cardid}'";
$mysql->query($sql);

if($mysql->affected_rows == 1){
    $msg =  [
        'code'=>0,
        'msg'=>'操作成功'
    ] ;
}else{
    $msg =  [
        'code'=>0,
        'msg'=>'操作成功'
    ] ;
}
echo json_encode($msg);

