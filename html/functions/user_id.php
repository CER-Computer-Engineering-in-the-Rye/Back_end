<?php

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

echo json_encode(array('id' => $id));

mysqli_close($conn);