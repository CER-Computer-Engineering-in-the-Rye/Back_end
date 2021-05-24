<?php
$idx=$_POST['idx'];
$select_query = 'delete from board where idx="'.$idx.'"';
$result_query = mysqli_query($conn, $select_query);


if($result_query){
    echo json_encode(array('result' => true));
}
else{
    // 쿼리 실패
	header("HTTP/1.1 500 Internal Server Error");
	echo json_encode(array('message' => '삭제하는데 실패했습니다.'));
	exit();
}
mysqli_close($conn);
?>