<?php
print_r($DATA_OBJECT);
$balance=$DATA_OBJECT->balance;
$id=$DATA_OBJECT->id;
$yer=date('Y');
$query=false;
$query = "UPDATE pupils set lastyearbalance=$balance WHERE userid='$id' and year =$yer";
$read = $DB->write($query, []);
if ($read) {
    $info->message = "Balance added successfully";

 

    $info->type = "pay";
    echo json_encode($info);
}