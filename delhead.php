<?php

$query=false;
$m=$DATA_OBJECT->month;
$ct=$DATA_OBJECT->category;

$ms=str_replace('fees', '', $m);

$mp=$ms.'paid';
$mb=$ms.'balance';
$id=$DATA_OBJECT->id;

$query="UPDATE pupils set $m=0,$mp=0,$mb=0 WHERE class='$id' and categories='$ct'";

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

