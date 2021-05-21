<?php
    $subject=$_POST['sub'];
    $writer=$_POST['writer'];
    $content=$_POST['cnt'];

    $select_query = 'insert into board(subject, writer, content, date) values("'.$subject.'", "'.$writer.'", "'.$content.'", now());';
    $result_query = mysqli_query($conn, $select_query);
    if ($result_query) {
        echo json_encode(array('result' => true));
    }
    mysqli_close($conn);
?>
