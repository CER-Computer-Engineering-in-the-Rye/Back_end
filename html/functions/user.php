<?php

if (!isset($token)) {
	header("HTTP/1.1 400 Bad Request");
	echo json_encode(array('message' => '토큰이 필요합니다.'));
	exit();
}

$token_idx = openssl_decrypt($token, 'aes-256-cbc', TOKEN_PASSWORD, false, str_repeat(chr(0), 16));

// 토큰 유효성 검사
$select_query = 'select user_idx, created from token where idx = "'.$token_idx.'";';
$result_query = mysqli_query($conn, $select_query);
if (!$result_query) {
	// 쿼리 실패
	header("HTTP/1.1 500 Internal Server Error");
	echo json_encode(array('message' => '토큰을 불러오지 못했습니다.'));
	exit();
}
$result_model = $result_query->fetch_array();
if (!$result_model) {
	header("HTTP/1.1 400 Bad Request");
	echo json_encode(array('message' => '존재하지 않는 토큰입니다.'));
	exit();
}
$idx = $result_model[0];
$token_created = new DateTime($result_model[1]);
$now = new DateTime();
if ($now->getTimestamp() - $token_created->getTimestamp() > TOKEN_EXPIRE_SECOND) {
	$select_query = 'delete from token where idx = "'.$token_idx.'";';
	$result_query = mysqli_query($conn, $select_query);
	if (!$result_query) {
		// 쿼리 실패
		header("HTTP/1.1 500 Internal Server Error");
		echo json_encode(array('message' => '토큰을 제거하지 못했습니다.'));
		exit();
	}
	header("HTTP/1.1 400 Bad Request");
	echo json_encode(array('message' => '만료된 토큰입니다.'));
	exit();
}

// 유저 정보 가져오기
$select_query = 'select id from user where idx = "'.$idx.'";';
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
	echo json_encode(array('message' => '존재하지 않는 계정입니다.'));
	exit();
}
$id = $result_model[0];

// 토큰 (재)발급
$select_query = 'update token set created = now() where idx = '.$token_idx.';';

echo json_encode(array('idx' => (int)$idx, 'id' => $id));

mysqli_close($conn);