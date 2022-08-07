<?php

$i=$DATA_OBJECT->id;
 $query="DELETE FROM staff WHERE userid='$i'";

 $result=$DB->write($query,[]);

 
 if ($result) {
    $info->message = "staff deleted successfully";
    $info->type = "delete";
    echo json_encode($info);
}else{
    $info->message = "staff not deleted ";
    $info->type = "err";
    echo json_encode($info);
}