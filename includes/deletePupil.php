<?php

$i=$DATA_OBJECT->id;
 $query="DELETE FROM students WHERE userid='$i'";

 $result=$DB->write($query,[]);

 
if ($result) {
    $info->message = "Pupil deleted successfully";
    $info->type = "delete";
    echo json_encode($info);
}else{
    $info->message = "Pupil not deleted ";
    $info->type = "err";
    echo json_encode($info);
}