<?php

    $sql=false;

    $sql=false;
  

    $name=$DATA_OBJECT->name;
    $r=8;

    $sql="SELECT * FROM students WHERE name LIKE '%$name%' and class <= $r ";
    $results=$DB->read($sql,[]);
    if (is_array($results)) {
     
        foreach ($results as $row) {
            $mess.="
            <a href='./morepupil.php?id=$row->userid' style='text-decoration:none;color:inherit'>
            <div class='card' style='
            display: flex;
            align-items: stretch;
            justify-content: stretch;
            margin-right: 12px;
            margin-bottom: 10px;
            max-height:130px !important ;
            padding:10px 10px;
          '>
        <div style='display: flex; margin: 4px 6px'>
          
          <div style='
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
              '>
            <p style='font-size: 18px'>$row->name</p>
            <p>$row->class $row->stream</p>
          </div>
        </div>
      </div>
      </a>
            ";
        }
        
    
        
    }else {
        $mess.="No Pupil with such name";
    }
    $info->message =$mess;
  
    $info->type = "name";
    echo json_encode($info);
    
