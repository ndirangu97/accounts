<?php

$query=false;
$id=$DATA_OBJECT->id;
$query="DELETE from statement where id=$id";

$write=$DB->write($query,[]);

if ($write) {
    # code...
    $info->message="Deleted statement successfully";
    $info->type='delstmt';
    echo json_encode($info);
}else{
    $info->message="error in deleting statement";
    $info->type='error';
    echo json_encode($info);
}

