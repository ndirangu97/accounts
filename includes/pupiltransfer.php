<?php


$i=$DATA_OBJECT->id;
$c=$DATA_OBJECT->class;
$s=$DATA_OBJECT->stream;

$query="UPDATE students SET class='$c',stream='$s' WHERE userid= '$i'";

$save=$DB->write($query,[]);

if ($save) {
    $info->message = "Pupil transfered successfully";
    $info->type = "transfer";
    echo json_encode($info);
}else{
    $info->message = "Pupil not transfered ";
    $info->type = "err";
    echo json_encode($info);
}