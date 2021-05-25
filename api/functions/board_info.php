<?php

$select_query = 'select * from board order by idx';
$result_query = mysqli_query($conn, $select_query);
$list_data=['item'=>[]];
        
while($result_model = $result_query->fetch_array()){
    array_push($list_data['item'],
        array('idx' => $result_model['idx'],
            'subject' => $result_model['title'],
            'writer' => $result_model['user_idx'],
            'content' => $result_model['content'],
            'datetime' => $result_model['date']
));
}
         


echo json_encode($list_data);


mysqli_close($conn);