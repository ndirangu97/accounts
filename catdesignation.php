<?php










$cat=$DATA_OBJECT->category;
$id=$DATA_OBJECT->id;
$yer=date('Y');




$query = false;
$query = "UPDATE pupils set categories='$cat' WHERE userid='$id' and year=$yer";
$read = $DB->write($query, []);
if ($read) {
    $info->message = "Pupil added to $cat  successfully";



    $info->type = "catdes";
    echo json_encode($info);
}else{
    echo 'bad';
}