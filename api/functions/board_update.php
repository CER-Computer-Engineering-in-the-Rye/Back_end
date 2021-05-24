<?php

$idx=$_GET['idx'];
$subject=$_POST['sub'];
$content=$_POST['cnt'];

if($subject==""){
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(array('message'=>'제목이 비어있습니다'));
    exit();
}
if($content==""){
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(array('message'=>'내용이 비어있습니다'));
    exit();
}

$select_query = 'update board set subject="'.$subject.'", content="'.$content.'", date=now() where idx="'.$idx.'";';
$result_query = mysqli_query($conn, $select_query);

if($result_query){
    echo json_encode(array('result' => true));
}
mysqli_close($conn);
?>