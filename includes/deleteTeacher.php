<?php

$i=$DATA_OBJECT->id;
 $query="DELETE FROM teachers WHERE userid='$i'";

 $result=$DB->write($query,[]);

 
 if ($result) {
    $info->message = "teacher deleted successfully";
    $info->type = "delete";
    echo json_encode($info);
}else{
    $info->message = "teacher not deleted ";
    $info->type = "err";
    echo json_encode($info);
}