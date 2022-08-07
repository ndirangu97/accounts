<?php



if (empty($DATA_OBJECT->name)) {
    $Err = "Name can't be empty";
} if (empty($DATA_OBJECT->upi)) {
    $upi="";
}else{
    $upi=$DATA_OBJECT->upi;
} 
if (empty($DATA_OBJECT->disabled)) {
    $Err = "Disability  must be checked";
} elseif (empty($DATA_OBJECT->class)) {
    $Err = "Class can't be empty";
} elseif (empty($DATA_OBJECT->stream)) {
    $Err = "Stream can't be empty";
}


if ($Err == "") {
    $query = false;

    $name =strtoupper($DATA_OBJECT->name) ;
   
    $upi = $upi;
    $gender = $DATA_OBJECT->gender;
    $disabled =  ucfirst($DATA_OBJECT->disabled);
    $class =  $DATA_OBJECT->class;
    $stream = ucfirst( $DATA_OBJECT->stream);
    $g=0;

    $t=0;
    $id=$DATA_OBJECT->id;

    $userid=generateuserid();
    if ($gender=="Male") {
        $img="./images/male-student.png";
    }else {
        $img="./images/female-student.png";
    }

    $nj=0;
    $query = "UPDATE  students SET name='$name',upi='$upi',gender='$gender',disabled='$disabled',class='$class',stream='$stream' WHERE userid='$id'";

    $result = $DB->write($query, []);

    if ($result) {
        $query=false;
        $query = "UPDATE  pupils SET name='$name',class=$class,stream='$stream' WHERE userid='$id'";

    $result2 = $DB->write($query, []);
        

        $info->message = 'pupilsaved';
        $info->type = "pupilSaved";
        echo json_encode($info);
    } else {
        $info->message = "An error occured please try later";
        $info->type = "err";
        echo json_encode($info);
    }
} else {
    $info->message = $Err;
    $info->type = "err";
    echo json_encode($info);
}
