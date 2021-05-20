<?php

$id = $_POST['id'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);

// id 중복 확인
$select_query = 'select id from user where id = "'.$id.'";';
$result_query = mysqli_query($conn, $select_query);
$result_model = $result_query->fetch_array();
if ($result_model != 0) {
	echo json_encode(array('result' => false));
	exit();
}

// 회원가입
$select_query = 'insert into user(id, pwd) values("'.$id.'", "'.$password.'");';
$result_query = mysqli_query($conn, $select_query);
if ($result_query) {
	echo json_encode(array('result' => true));
}

mysqli_close($conn);