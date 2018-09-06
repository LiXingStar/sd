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

    $pdo->exec($sql);




}

