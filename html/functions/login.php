<?php

$id = $_POST['id'];
$password = $_POST['password'];

$select_query = 'select idx, password from user where id = "'.$id.'";';
$result_query = mysqli_query($conn, $select_query);
if (!$result_query) {
	// 쿼리 실패
	header("HTTP/1.1 500 Internal Server Error");
	echo json_encode(array('message' => '정보를 불러오지 못했습니다.'));
	exit();
}
$result_model = $result_query->fetch_array();
if (!$result_model) {
	header("HTTP/1.1 400 Bad Request");
	echo json_encode(array('message' => '존재하지 않는 아이디입니다.'));
	exit();
}
$idx = (int)$result_model[0];
if (!password_verify($password, $result_model[1])) {
	header("HTTP/1.1 400 Bad Request");
	echo json_encode(array('message' => '비밀번호가 일치하지 않습니다.'));
	exit();
}

session_start();
$_SESSION['user_idx'] = $idx;
echo json_encode(array('idx' => $idx, 'id' => $id));

mysqli_close($conn);