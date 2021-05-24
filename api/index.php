<?php

require_once '../config.php';
include './db_info.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];
switch ($requestMethod) {
	case 'GET': case 'POST': case 'PATCH': case 'DELETE': break;
	default: {
		header("HTTP/1.1 403 Forbidden");
		exit();
	}
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);
array_shift($uri);
$requestURI = implode('/', $uri);

/**
 *
 * Functions
 *
 */

if ($requestURI === 'test' && $requestMethod === 'GET') {
	require_once 'functions/test.php';
}
else if ($requestURI === 'signup' && $requestMethod === 'POST') {
	require_once 'functions/signup.php';
}
else if ($requestURI === 'login' && $requestMethod === 'POST') {
	require_once 'functions/login.php';
}
else if ($requestURI === 'logout' && $requestMethod === 'GET') {
	require_once 'functions/logout.php';
}
else if ($requestURI === 'user' && $requestMethod === 'GET') {
	require_once 'functions/user.php';
}
else if ($requestURI === 'board/info' && $requestMethod === 'GET') {
	require_once 'functions/board_info.php';
}
else if ($requestURI === 'board/write' && $requestMethod === 'POST') {
	require_once 'functions/board_write.php';
}
else if ($requestURI === 'board/delete' && $requestMethod === 'DELETE') {
	require_once 'functions/board_delete.php';
}
else if ($requestURI === 'board/update' && $requestMethod === 'POST') {
	require_once 'functions/board_update.php';
}
else {
	header("HTTP/1.1 404 Not Found");
	exit();
}