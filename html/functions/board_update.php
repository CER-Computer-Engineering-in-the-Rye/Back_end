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

$select_query = 'update board set title="'.$subject.'", content="'.$content.'", date=now() where idx="'.$idx.'";';
$result_query = mysqli_query($conn, $select_query);
$result_model = $result_query->fetch_array();

if($result_query){
    echo json_encode(array('result' => true));
}

else{
    // 쿼리 실패
	header("HTTP/1.1 500 Internal Server Error");
	echo json_encode(array('message' => '업데이트 하는데 실패했습니다.'));
	exit();
}
mysqli_close($conn);
?>