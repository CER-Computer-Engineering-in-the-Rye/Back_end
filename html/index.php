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

/**
 *
 * Functions
 *
 */

if (false) {
	//
}
else if ($uri[1] === 'signup' && $requestMethod === 'POST') {
	require_once 'functions/signup.php';
}
else if ($uri[1] === 'login' && $requestMethod === 'POST') {
	require_once 'functions/login.php';
}
else if ($uri[1] === 'logout' && $requestMethod === 'GET') {
	$token = $uri[2];
	require_once 'functions/logout.php';
}
else if ($uri[1] === 'user' && $uri[2] === 'id' & $requestMethod === 'GET') {
	$idx = (int)$uri[3];
	require_once 'functions/user_id.php';
}
else if ($uri[1] === 'user' && $requestMethod === 'GET') {
	$token = $uri[2];
	require_once 'functions/user.php';
}
else if ($uri[1] === 'board' && $uri[2] === 'info' && $requestMethod === 'GET') {
	$idx = isset($uri[3]) ? (int)$uri[3] : 0;
	require_once 'functions/board_info.php';
}
else if ($uri[1] === 'board' && $uri[2] === 'write' && $requestMethod === 'POST') {
	require_once 'functions/board_write.php';
}
else if ($uri[1] === 'board' && $uri[2] === 'delete' && $requestMethod === 'GET') {
	$idx = (int)$uri[3];
	require_once 'functions/board_delete.php';
}
else if ($uri[1] === 'board' && $uri[2] === 'update' && $requestMethod === 'POST') {
	$idx = (int)$uri[3];
	require_once 'functions/board_update.php';
}
else {
	header("HTTP/1.1 404 Not Found");
	exit();
}