<?php


    $m=$DATA_OBJECT->month;
    $y=$DATA_OBJECT->year;
    $fees = $DATA_OBJECT->fees;
    $cl = $DATA_OBJECT->class;
    $err="";

    $sql=false;
    $sql="SELECT * FROM pupils WHERE class=$cl and year=$y";
    $res=$DB->read($sql,[]);
    if (is_array($res)) {
        foreach ($res as $row) {
           
            if (($row->$m)!=0) {
                $err="ERROR : Votehead for  $m Class  $cl have already been set";
                
            }
                           
            
        }
        
        if ($err=="") {
        
            $query = false;
            $query = "UPDATE  pupils SET '$m'=$fees,year=$y WHERE class=$cl  ";
            $write = $DB->write($query, []);
        
            if ($write) {
           
                   
                $info->message ="Fees  set for Class  $cl  $m successfully as $fees";
  
                $info->type = "set";
                echo json_encode($info);
        
            }
         
                
            }else {
                $err="Votehead for  $m  Class  $cl have already been set";
                
            }


        
    }else {
       $err="ERROR : No such class or year in database";
        
            

    }
    if ($err!="") {
       
                $info->message =$err;
  
                $info->type = "err";
                echo json_encode($info);
        
    }
