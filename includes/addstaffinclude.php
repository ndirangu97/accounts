<?php



if (empty($DATA_OBJECT->name)) {
    $Err="Name can't be empty";
    
}elseif (empty($DATA_OBJECT->telephone)) {
    $Err="Telephone can't be empty";
  
}
elseif ($DATA_OBJECT->telephone<10) {
    $Err="Telephone can't be less than 10";
  
}
elseif (empty($DATA_OBJECT->id)) {
    $Err="ID can't be empty";

}
elseif (empty($DATA_OBJECT->gender)) {
    $Err="Gender must be checked";
    
}
elseif (empty($DATA_OBJECT->disabled) ){
    $Err="Disbility  must be checked";

}
elseif (empty($DATA_OBJECT->dept) ){
    $Err="Department  must be checked";
   
}
elseif (empty($DATA_OBJECT->role) ){
    $Err="Role  must be checked";
  
}



if ($Err=="") {
    $query=false;

    $name =strtoupper($DATA_OBJECT->name) ;
    $telephone = $DATA_OBJECT->telephone;
    $id = $DATA_OBJECT->id;
    $gender = ucfirst( $DATA_OBJECT->gender);
    $disabled =  ucfirst($DATA_OBJECT->disabled);
    $dept=ucfirst($DATA_OBJECT->dept);
    $role=ucfirst($DATA_OBJECT->role);
    $date=date("Y-m-d H:i:s");

    $userid=generateuserid();
    if ($gender=="Male") {
        $img="./images/user_male.jpg";
    }else {
        $img="./images/user_female.jpg";
    }

    $query="INSERT INTO staff(name,telephone,idno,gender,disabled,department,role,userid,img,date) VALUES('$name',$telephone,$id,'$gender','$disabled','$dept','$role','$userid','$img','$date') ";

    $result=$DB->write($query,[]);

    if ($result) {
        $sql=false;
        $sql= "SELECT * FROM staff ORDER BY id DESC LIMIT 1";

        $resultSql=$DB->read($sql,[]);

        $resultSql=$resultSql[0];
        $userId= $resultSql->userid;
        

        $info->message = $userId;
        $info->type = "addStaff";
        echo json_encode($info);
    }else {
        $info->message = "An error occured please try later";
        $info->type = "err";
        echo json_encode($info);
    }
}else {
    $info->message = $Err;
        $info->type = "err";
        echo json_encode($info);
}