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
if (empty($DATA_OBJECT->g1name)) {
    $g1name = "";
}else {
    $g1name=strtoupper($DATA_OBJECT->g1name);
}
if (empty($DATA_OBJECT->g2name)) {
    $g2name = "";
}else {
    $g2name=strtoupper($DATA_OBJECT->g2name);
}
if (empty($DATA_OBJECT->g1no)) {
    $g1no = "";
}else {
    $g1no = $DATA_OBJECT->g1no;
}
if (empty($DATA_OBJECT->g2no)) {
    $g2no="";
}else {
    $g2no =$DATA_OBJECT->g2no;
}

if (empty($DATA_OBJECT->grole)) {
    $grole = "";
}else {
    
    

    if ($DATA_OBJECT->g1name=="") {
        $grole = "";
    }else {
        $grole = $DATA_OBJECT->grole;
    }
}

if (empty($DATA_OBJECT->grole2)) {
    $grole2 = "";
}else {
    if ($DATA_OBJECT->g2name=="") {
        $grole2 = "";
    }else {
        $grole2=$DATA_OBJECT->grole2;
    }
   
}



if ($Err == "") {
    $query = false;

    $name =strtoupper($DATA_OBJECT->name) ;
   
    $upi = $upi;
    $g1name=$g1name;
    $g2name=$g2name;
    $grole=$grole;
    $grole2=$grole2;
    $g1no=$g1no;
    $g2no=$g2no;
    $gender = $DATA_OBJECT->gender;
    $disabled =  ucfirst($DATA_OBJECT->disabled);
    $class =  $DATA_OBJECT->class;
    $stream = ucfirst( $DATA_OBJECT->stream);
    $g=0;
    $t=0;

    $userid=generateuserid();
    if ($gender=="Male") {
        $img="./images/male-student.png";
    }else {
        $img="./images/female-student.png";
    }

    $nj=0;
    $query = "INSERT INTO students(name,upi,gender,disabled,class,stream,userid,img,gname,g2name,gno,g2no,grole,grole2) VALUES('$name','$upi','$gender','$disabled','$class','$stream','$userid','$img','$g1name','$g2name','$g1no','$g2no','$grole','$grole2') ";

    $result = $DB->write($query, []);

    if ($result) {
        $sql=false;
        $sql= "SELECT * FROM students ORDER BY id DESC LIMIT 1";

        $resultSql=$DB->read($sql,[]);

        $resultSql=$resultSql[0];
        $userId= $resultSql->userid;
        

        $info->message = $userId;
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
