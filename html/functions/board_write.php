<?php
    $subject=$_POST['sub'];
    $writer=$_POST['writer'];
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
    

    $select_query = 'insert into board(subject, writer, content, date) values("'.$subject.'", "'.$writer.'", "'.$content.'", now());';
    $result_query = mysqli_query($conn, $select_query);
    if (!$result_query) {
        // 쿼리 실패
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(array('message' => '정보를 입력하는데 실패했습니다.'));
        exit();
    }
    
    else {
        echo json_encode(array('result' => true));
    }
    mysqli_close($conn);
?>
