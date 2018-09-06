<?php
$cardid = $_GET['cardid'];
include_once 'db.php';

$sql = "select * from student where cardid='{$cardid}'";

$result = $mysql->query($sql)->fetch_assoc();

echo  json_encode($result);