<?php  
/*ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);*/

require_once($_SERVER['DOCUMENT_ROOT'].'/sveta/avito_test/db_connect.php');

$id = $_GET['id'];
$sql = $pdo->prepare("SELECT * FROM table_val WHERE id='$id' "); 
$sql->execute();
$result = $sql->fetch();
$gen_id = $result['id'];

	if (!empty($id) && $id == $gen_id) {
		$time = date('H:i:s');
		$result['request_time'] = $time;
		$add = ['result' => 'true'];
		$result = array_merge($add, $result);
		$res = json_encode($result);
		echo($res);
	}elseif ($_GET['id'] != $gen_id) { 
		$result['result'] = 'false';
		$result['error'] = 'this id is not in data base';
		$res = json_encode($result);
		echo($res);
	}else{
		$result['result'] = 'false';
		$result['error'] = 'id not found';
		$res = json_encode($result);
		echo($res);
	} 
