<?php

$select_query = 'select *from board order by idx';
$result_query = mysqli_query($conn, $select_query);
//$result_model = $result_query->fetch_array();
//$row=mysqli_fetch_array($result_query);
//if ($result_model != 0) {
$list_data=[];
        
while($result_model = $result_query->fetch_array()){
    array_push($list_data, 
        array('idx' => $result_model['idx'],
            'subject' => $result_model['subject'],
            'writer' => $result_model['writer'],
            'content' => $result_model['content'],
            'datetime' => $result_model['date']
));
}
        


echo json_encode($list_data);


mysqli_close($conn);