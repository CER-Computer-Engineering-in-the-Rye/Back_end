<?php

if (!isset($token)) {
	header("HTTP/1.1 400 Bad Request");
	echo json_encode(array('message' => '토큰이 필요합니다.'));
	exit();
}

$token_idx = openssl_decrypt($token, 'aes-256-cbc', TOKEN_PASSWORD, false, str_repeat(chr(0), 16));

$select_query = 'delete from token where idx = '.$token_idx.';';
$result_query = mysqli_query($conn, $select_query);
if (!$result_query) {
	// 쿼리 실패
	header("HTTP/1.1 500 Internal Server Error");
	echo json_encode(array('message' => '토큰을 제거하지 못했습니다.'));
	exit();
}

mysqli_close($conn);