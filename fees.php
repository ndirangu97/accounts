<?php


$id=$DATA_OBJECT->id;
$yr=$DATA_OBJECT->year;

$sql=false;

$sql="SELECT * FROM pupil WHERE userid='$id' and year=$yr";
$read=$DB->read($sql,[]);

if (is_array($read)) {
    $read=$read[0];
    $info->message =$read;
  
    $info->type = "fees";
    echo json_encode($info);

}else{
    
    $info->message ="ERROR:Pupil not found";
  
    $info->type = "error";
    echo json_encode($info);
}