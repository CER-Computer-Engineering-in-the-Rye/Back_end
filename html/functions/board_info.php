<?php

if ($idx === 0) {
	$select_query = 'select *from board order by idx';
	$result_query = mysqli_query($conn, $select_query);
	$list_data=['item'=>[]];
	        
	while($result_model = $result_query->fetch_array()){
	    array_push($list_data['item'],
	        array('idx' => $result_model['idx'],
	            'subject' => $result_model['subject'],
	            'writer' => $result_model['writer'],
	            'content' => $result_model['content'],
	            'datetime' => $result_model['date']
	));
	}
	echo json_encode($list_data);
}
else {
	$select_query = 'select title, user_idx, content, date from board where idx = "'.$idx.'";';
	$result_query = mysqli_query($conn, $select_query);
	$result_model = $result_query->fetch_array();

	echo json_encode(array(
		'title' => $result_model[0],
		'user_idx' => $result_model[1],
		'content' => $result_model[2],
		'date' => $result_model[3]
	));
}

mysqli_close($conn);