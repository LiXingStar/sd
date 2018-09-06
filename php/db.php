<?php
/*$pdo = new PDO('mysql:host=127.0.0.1;dbname=shanda','root','');
$pdo->exec("set names utf8");*/
 $mysql = new mysqli('localhost','root','','shanda',3306);

 $mysql->query("set names utf8");