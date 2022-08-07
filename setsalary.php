<?php

$chaser = $DATA_OBJECT->chaser;
$name = $DATA_OBJECT->name;

if ($chaser == 'staff') {

    $sql = false;
    $mess = "";

    $sql = "SELECT * FROM staff WHERE name LIKE '%$name%' ";
    $results = $DB->read($sql, []);
    if (is_array($results)) {
        foreach ($results as $row) {
          $mess.="

          <div onclick='salary(event)'  id='$row->userid'  class='card' style='
          display: flex;
          align-items: stretch;
          justify-content: stretch;
          margin-right: 12px;
          margin-bottom: 10px;
          max-height:130px !important ;
        '>
      <div id='$row->userid' style='display: flex; margin: 4px 6px'>
        <div id='$row->userid'>
          <img id='$row->userid' src='$row->img' style='width: 100px; height: 100px; border-radius: 50%' />
        </div>
        <div id='$row->userid' style='
              display: flex;
              justify-content: center;
              align-items: center;
              flex-direction: column;
            '>
            <p id='$row->userid' style='font-size: 18px'>$row->name</p>
            <p id='$row->userid' style='font-size: 18px;color:#b4e334'>Dept : $row->department</p>
        </div>
      </div>
    </div>
    
          ";
        }
    } else {
        $mess .= "No staff with such name";
    }
    $info->message = $mess;
    $info->type = "name";
    echo json_encode($info);
} else {

       
    $name=$DATA_OBJECT->name;
    $sql=false;
   
    

    $sql="SELECT * FROM teachers WHERE name LIKE '%$name%'   ";
    $results=$DB->read($sql,[]);
    if (is_array($results)) {
        foreach ($results as $row) {
            $mess.="
      
            <div  onclick='salary(event)' id='$row->userid' class='card' style='
            display: flex;
            align-items: stretch;
            justify-content: stretch;
            margin-right: 12px;
            margin-bottom: 10px;
            max-height:130px !important ;
          '>
        <div id='$row->userid' style='display: flex; margin: 4px 6px'>
          <div id='$row->userid'>
            <img id='$row->userid' src='$row->img' style='width: 100px; height: 100px; border-radius: 50%' />
          </div>
          <div id='$row->userid' style='
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
              '>
            <p id='$row->userid' style='font-size: 18px'>$row->name </p>
            
          </div>
        </div>
      </div>

            ";
        }
       
    
        
    }else {
        $mess.="No teacher with such name";
    }
    $info->message =$mess;
    $info->message2 =$mess2;
    $info->type = "name";
    echo json_encode($info);
}

