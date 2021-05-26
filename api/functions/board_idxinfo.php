<?php

$select_query = 'select *from board order by idx';
$result_query = mysqli_query($conn, $select_query);
$idx=$_GET['idx'];

while($result_model = $result_query->fetch_array()){
    if($result_model['idx']==$idx){
        echo json_encode(array('idx' => $result_model['idx'],
            'subject' => $result_model['title'],
            'writer' => $result_model['user_idx'],
            'content' => $result_model['content'],
            'datetime' => $result_model['date'])
    );
    }
}
        

mysqli_close($conn);