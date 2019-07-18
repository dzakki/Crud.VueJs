<?php 

header('Content-Type: application/json');

$con = mysqli_connect('localhost','root','','vue_todolist');
$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
	case 'GET':
		$sql = 'SELECT * FROM todo';
		$results = mysqli_query($con, $sql);
		if (mysqli_num_rows($results) > 0) {
			echo json_encode(mysqli_fetch_all($results, MYSQLI_ASSOC));
			http_response_code(200);
			die();
		}
		break;
	case 'POST':
		$text = $_POST['text'];
		$done = $_POST['done'];
		if (!isset($text)) {
			http_response_code(400);
			die();
		}else{
			$sql = "INSERT INTO todo (text, done) VALUES ('$text', $done) ";
			$results = mysqli_query($con, $sql);
			echo 'berhasil';
			http_response_code(200);
			die();
		}
		break;
	case 'PATCH':
		$id  = $_GET['id'];
		$done = $_GET['done'];
		if (!isset($id)) {
			http_response_code(400);
			die();
		}else{
			$sql = "UPDATE todo SET done = $done WHERE id = $id ";
			$results = mysqli_query($con, $sql);
			echo 'berhasil';
			http_response_code(200);
			die();
		}
		break;
	case 'DELETE':
		$id  = $_GET['id'];
		if (!isset($id)) {
			http_response_code(400);
			die();
		}else{
			$sql = "DELETE FROM todo WHERE id = $id ";
			$results = mysqli_query($con, $sql);
			echo 'berhasil';
			http_response_code(200);
			die();
		}
		break;		
	default:
		// code...
		break;
}

if ($request == 'GET') {
	
}else if($request == 'POST'){
	// die(print_r($_POST));
	
}else if($request = 'PATCH'){
	
}