<?php

// $select_query = '';
// $result_query = mysqli_query($conn, $select_query);
// $result_model = $result_query->fetch_array();
// if ($result_model != 0) {
// 	echo json_encode(array('test_result' => 'great :D'));
// }

echo json_encode(array('test_result' => 'great :D'));

mysqli_close($conn); 