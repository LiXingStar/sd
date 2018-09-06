<?php
include_once 'db.php';

$sql = "select *  from student , parents where student.cardid=parents.cardid";

$result = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

echo json_encode($result);