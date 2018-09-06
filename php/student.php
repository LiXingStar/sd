<?php
include_once 'db.php';

$sql = "select * from student";

$result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

echo json_encode($result);