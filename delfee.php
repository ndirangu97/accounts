<?php

$query=false;
$id=$DATA_OBJECT->id;
$query="DELETE from fees where id=$id";

$write=$DB->write($query,[]);

if ($write) {
    # code...
    $info->message="Deleted successfully";
    $info->type='delfees';
    echo json_encode($info);
}else{
    $info->message="error in deleting fees";
    $info->type='error';
    echo json_encode($info);
}

