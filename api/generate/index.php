<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/sveta/avito_test/db_connect.php'); 

$random_number = mt_rand(0, 1000);
$sql = $pdo->prepare("INSERT INTO table_val (value)VALUES('$random_number')");
$sql->execute();
$id = $pdo->lastInsertId();  
$time = date('H:i:s');
$result['result'] = 'true';
$result['id'] = $id;
$result['request_time'] = $time;
$res = json_encode($result);
echo($res); 
