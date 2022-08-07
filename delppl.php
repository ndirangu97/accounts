<?php

$i=$DATA_OBJECT->id;
 $query="DELETE FROM students WHERE userid='$i'";

 $result=$DB->write($query,[]);

 
if ($result) {
    $query=false;
    $query="DELETE FROM pupils WHERE userid='$i'";

    $result=$DB->write($query,[]);
    $info->message = "Pupil deleted successfully";
    $info->type = "delete";
    echo json_encode($info);
}else{
    $info->message = "Pupil not deleted ";
    $info->type = "err";
    echo json_encode($info);
}