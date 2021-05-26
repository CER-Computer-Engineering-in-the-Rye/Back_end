<?php

$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);

header('Content-Type: application/json; charset=UTF-8');
switch ($_SERVER['HTTP_ORIGIN']) {
	case 'null': {
		// local test용
		header('Access-Control-Allow-Origin: null');
	}
	case 'http://meetyourmeat.dothome.co.kr': {
		header('Access-Control-Allow-Origin: http://meetyourmeat.dothome.co.kr');
	}
}
header('Access-Control-Allow-Methods: GET, POST, PATCH, DELETE');
header('Access-Control-Allow-Headers: X-Access-Token');
header('HTTP/1.1 200 OK');