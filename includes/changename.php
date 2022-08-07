<?php



    $query = false;

    $nj=0;
    $name=strtoupper($DATA_OBJECT->name) ;
    $id=$DATA_OBJECT->id;
    $query = "UPDATE STUDENTS SET name='$name' WHERE userid ='$id' ";

    $result = $DB->write($query, []);

    if ($result) {
        
        

        $info->message = "<p style='color:green'>$name saved</p>";
        $info->type = "pupilsaved";
        echo json_encode($info);
    } else {
        $info->message = "An error occured please try later";
        $info->type = "err";
        echo json_encode($info);
    }

