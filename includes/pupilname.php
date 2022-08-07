<?php
// print_r($DATA_OBJECT);

if ($DATA_OBJECT->chaser=="") {
        
    $name=$DATA_OBJECT->name;

 
    $sql=false;
    $g=0;
    $t=0;
    

    $sql="SELECT * FROM students WHERE name LIKE '%$name%'   ";
    $results=$DB->read($sql,[]);
    if (is_array($results)) {
        foreach ($results as $row) {
            $mess.="
            <a href='morepupil.php?id=$row->userid' style='text-decoration:none;color:none'>
            <div class='card' style='
            display: flex;
            align-items: stretch;
            justify-content: stretch;
            margin-right: 12px;
            margin-bottom: 10px;
            max-height:130px !important ;
          '>
        <div style='display: flex; margin: 4px 6px'>
          <div>
            <img src='$row->img' style='width: 100px; height: 100px; border-radius: 50%' />
          </div>
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
    $info->message2 =$mess2;
    $info->type = "name";
    echo json_encode($info);
    
}elseif ($DATA_OBJECT->chaser=="graduated") {
  
  $name=$DATA_OBJECT->name;

 
  $sql=false;
  $g=1;
  $t=0;
  

  $sql="SELECT * FROM students WHERE name LIKE '%$name%' and  graduated='$g'  ";
  $results=$DB->read($sql,[]);
  if (is_array($results)) {
      foreach ($results as $row) {
          $mess.="
          <a href='morepupil.php?id=$row->userid' style='text-decoration:none;color:none'>
          <div class='card' style='
          display: flex;
          align-items: stretch;
          justify-content: stretch;
          margin-right: 12px;
          margin-bottom: 10px;
          max-height:130px !important ;
        '>
      <div style='display: flex; margin: 4px 6px'>
        <div>
          <img src='$row->img' style='width: 100px; height: 100px; border-radius: 50%' />
        </div>
        <div style='
              display: flex;
              justify-content: center;
              align-items: center;
              flex-direction: column;
            '>
          <p style='font-size: 18px'>$row->name</p>
          <p>Graduated $row->yearleft</p>
        </div>
      </div>
    </div>
    </a>
          ";
      }
      
  
      
  }else {
      $mess.="No graduate with such name";
  }
  $info->message =$mess;
  $info->message2 =$mess2;
  $info->type = "name";
  echo json_encode($info);
}elseif ($DATA_OBJECT->chaser=="transferred") {
  
  $name=$DATA_OBJECT->name;

 
  $sql=false;
  
  $t=1;
  

  $sql="SELECT * FROM students WHERE name LIKE '%$name%' and  transferred='$t'  ";
  $results=$DB->read($sql,[]);
  if (is_array($results)) {
      foreach ($results as $row) {
          $mess.="
          <a href='morepupil.php?id=$row->userid' style='text-decoration:none;color:none'>
          <div class='card' style='
          display: flex;
          align-items: stretch;
          justify-content: stretch;
          margin-right: 12px;
          margin-bottom: 10px;
          max-height:130px !important ;
        '>
      <div style='display: flex; margin: 4px 6px'>
        <div>
          <img src='$row->img' style='width: 100px; height: 100px; border-radius: 50%' />
        </div>
        <div style='
              display: flex;
              justify-content: center;
              align-items: center;
              flex-direction: column;
            '>
          <p style='font-size: 18px'>$row->name</p>
          <p>Transferred $row->yeartransferred</p>
        </div>
      </div>
    </div>
    </a>
          ";
      }
      
  
      
  }else {
      $mess.="No transferre with such name";
  }
  $info->message =$mess;
  $info->message2 =$mess2;
  $info->type = "name";
  echo json_encode($info);
}