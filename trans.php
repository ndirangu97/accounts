<?php


$i=$DATA_OBJECT->id;
$c=$DATA_OBJECT->class;
$s=$DATA_OBJECT->stream;

$query="UPDATE pupils SET class='$c',stream='$s' WHERE userid= '$i'";

$save=$DB->write($query,[]);

if ($save) {
    $info->message = " <p style='color:green'> Pupil transfered successfully  to $c $s</p>";
    $info->type = "transfer";
    echo json_encode($info);
}else{
    $info->message = " <p style='color:red'>Pupil not transfered </p>";
    $info->type = "err";
    echo json_encode($info);
}