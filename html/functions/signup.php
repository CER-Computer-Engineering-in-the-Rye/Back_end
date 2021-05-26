<?php

$id = $_POST['id'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);

// id 중복 확인
$select_query = 'select idx from user where id = "'.$id.'";';
$result_query = mysqli_query($conn, $select_query);
if (!$result_query) {
	header("HTTP/1.1 500 Internal Server Error");
	echo json_encode(array('message' => '정보를 불러오지 못했습니다.'));
	exit();
}
$result_model = $result_query->fetch_array();
if ($result_model) {
	header("HTTP/1.1 400 Bad Request");
	echo json_encode(array('message' => '존재하는 아이디입니다.'));
	exit();
}

// 회원가입
$select_query = 'insert into user(id, password) values("'.$id.'", "'.$password.'");';
$result_query = mysqli_query($conn, $select_query);
if (!$result_query) {
	header("HTTP/1.1 500 Internal Server Error");
	echo json_encode(array('message' => '등록에 실패하였습니다.'));
	exit();
}

mysqli_close($conn);