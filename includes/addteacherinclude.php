<?php

// print_r($DATA_OBJECT);
// die;


if (empty($DATA_OBJECT->name)) {
    $Err="Name can't be empty";
   
}elseif (empty($DATA_OBJECT->telephone)) {
    $Err="telephone can't be empty";
    
}
elseif ($DATA_OBJECT->telephone<10) {
    $Err="Telephone can't be less than 10";
  
}
elseif (empty($DATA_OBJECT->tsc)) {
    $Err="Tsc no can't be empty";
    
}
elseif (empty($DATA_OBJECT->id)) {
    $Err="Id must be checked";
   
}
elseif (empty($DATA_OBJECT->disabled) ){
    $Err="Disbility  must be checked";
   
}


if (empty($DATA_OBJECT->classteacher)) {
    $classteacher=0;
}else {
    $classteacher=1;
}
if (empty($DATA_OBJECT->class)) {
    $class="";
}else {
    $class=ucfirst($DATA_OBJECT->class);
}


// if (empty($DATA_OBJECT->admin)) {
//     $admin=0;
//     $dept="";

// }else {
//     $admin=1;
// }
// if (empty($DATA_OBJECT->dept)) {
//     $dept=0;
// }else {
//     $dept=ucfirst($DATA_OBJECT->dept);
// }

if ($Err=="") {
    $query=false;

    $name =strtoupper($DATA_OBJECT->name) ;
    $telephone = ucfirst($DATA_OBJECT->telephone);
    $tsc = ucfirst($DATA_OBJECT->tsc);
    $gender = ucfirst( $DATA_OBJECT->gender);
    $id = ucfirst( $DATA_OBJECT->id);
    $disabled =  ucfirst($DATA_OBJECT->disabled);
    $userid=generateuserid();
    if ($gender=="Male") {
       $img="./images/user_male.jpg";
    }else {
        $img="./images/user_female.jpg";
    }
    if ($DATA_OBJECT->langu=="") {
        $langu="";
    }else {
        $langu=$DATA_OBJECT->langu;
    }
    

    $query="INSERT INTO teachers(name,telephone,tsc,gender,disabled,classteacher,class,userid,img,lang,idno) VALUES('$name',$telephone,$tsc,'$gender','$disabled','$classteacher','$class','$userid', '$img','$langu',$id) ";

    $result=$DB->write($query,[]);

    if ($result) {
        $sql=false;
        $sql= "SELECT * FROM teachers ORDER BY id DESC LIMIT 1";

        $resultSql=$DB->read($sql,[]);

        $resultSql=$resultSql[0];
        $userId= $resultSql->userid;
        

        $info->message = $userId;
        $info->type = "teacherSaved";
        echo json_encode($info);
    }else {
        $info->message = "error";
        $info->type = "Err";
        echo json_encode($info);
    }
}else {
    $info->message = $Err;
        $info->type = "Err";
        echo json_encode($info);
}