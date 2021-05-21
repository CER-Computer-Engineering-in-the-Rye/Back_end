<?php
$idx=$_GET['idx'];
$select_query = 'delete from board where idx="'.$idx.'"';
$result_query = mysqli_query($conn, $select_query);

if($result_query){
    echo json_encode(array('result' => true));
}
mysqli_close($conn);
?>