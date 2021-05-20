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
else {
	header("HTTP/1.1 404 Not Found");
	exit();
}