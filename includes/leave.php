<?php

$query=false;
$i=$DATA_OBJECT->id;
$t=1;
$y=date('Y');

    $query="UPDATE students SET transferred ='$t',yeartransferred='$y' WHERE userid='$i'";

        $write=$DB->write($query,[]);
        if ($write) {
            $info->message = "Pupil transfered out of school";
            $info->type = "leave";
            echo json_encode($info);
        }else{
            $info->message = "Pupil not transfered out of school ";
            $info->type = "err";
            echo json_encode($info);
        }    