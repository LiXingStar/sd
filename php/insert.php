<?php
$lists = $_POST['lists'];

include_once 'db.php';
foreach($lists as $key => &$value){
//    $value['classes'] = substr($value['number'],8,2);

    $keys = array_keys($value);
    $values = array_values($value);

    $strKey = join(',',$keys);
    $strValues = join("','",$values);

    $strValues = "'".$strValues."'";


    $sql="insert into parents($strKey) value($strValues)";

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
}

