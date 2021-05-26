<?php

$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);

header('Content-Type: application/json; charset=UTF-8');
header('HTTP/1.1 200 OK');