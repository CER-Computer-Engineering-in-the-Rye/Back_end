<?php

$idx=$_GET['idx'];
$subject=$_POST['sub'];
$content=$_POST['cnt'];

$select_query = 'update board set subject="'.$subject.'", content="'.$content.'", date=now() where idx="'.$idx.'";';
$result_query = mysqli_query($conn, $select_query);

if($result_query){
    echo json_encode(array('result' => true));
}
mysqli_close($conn);
?>