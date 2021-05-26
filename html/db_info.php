<?php

$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);

header('Content-Type: application/json; charset=UTF-8');
switch ($_SERVER['HTTP_ORIGIN']) {
	case 'null': {
		// local test용
		header('Access-Control-Allow-Origin: null');
		break;
	}
	case 'http://meetyourmeat.dothome.co.kr': {
		header('Access-Control-Allow-Origin: http://meetyourmeat.dothome.co.kr');
		break;
	}
}
header('Access-Control-Allow-Methods: GET, POST, PATCH, DELETE');
header('HTTP/1.1 200 OK');