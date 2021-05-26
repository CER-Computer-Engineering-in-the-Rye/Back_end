<?php

$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);

header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, DELETE');
header('Access-Control-Allow-Headers: X-Access-Token');
header('HTTP/1.1 200 OK');