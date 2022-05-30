<?php

$query=false;
$m=$DATA_OBJECT->month;
$id=$DATA_OBJECT->id;
$query="UPDATE pupils set $m=0 WHERE userid='$id'";

$write=$DB->write($query,[]);

if ($write) {
    # code...
    $info->message="Head updated successfully";
    $info->type='upfees';
    echo json_encode($info);
}else{
    $info->message="error in updating head";
    $info->type='error';
    echo json_encode($info);
}

