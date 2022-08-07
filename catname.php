<?php


$sql = false;

$sql = false;



$name = $DATA_OBJECT->name;
$class = $DATA_OBJECT->class;

$stream = $DATA_OBJECT->stream;

$r = 8;
$year = date('Y');
// $year=2023;

if ($class =='All' && $stream == 'All') {
 

  $sql = "SELECT * FROM pupils WHERE name LIKE '%$name%'  and year=$year  ";
  $results = $DB->read($sql, []);
  if (is_array($results)) {

    foreach ($results as $row) {
      if ($row->class <= 8) {
        
        $mess .= "
            <a ondblclick='addcat(event)' id='$row->userid' class='$row->name' style='text-decoration:none;color:inherit'>
            <div id='$row->userid'  class='card' style='
            display: flex;
            
            margin-right: 12px;
            margin-bottom: 10px;
            height:130px;
            width:260px;
            
            padding:10px 10px;
          '>
        <div id='$row->userid' style='display: flex; margin: 4px 6px'>
          
          <div id='$row->userid' style='
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                margin-top:10px
              '>
            <p id='$row->userid' ><h6 id='$row->userid' style='font-size: 18px;'>$row->name</h6></p>
            <div id='$row->userid' style='display:flex;justify-content:center;align-items:center'> <p style='margin-top:5px'> <h6 id='$row->userid'>Class</h6 > <h5 id='$row->userid' style='font-size: 16px;color: #009879;margin-left:10px' >$row->class $row->stream</h5></p></div>
           
          </div>
        </div>
      </div>
      </a>
            ";
      } else {
        $mess .= "
            <a ondblclick='addcat(event)' id='$row->userid' class='$row->name' style='text-decoration:none;color:inherit'>
            <div id='$row->userid' class='card' style='
            display: flex;
            
            margin-right: 12px;
            margin-bottom: 10px;
            height:130px;
            width:260px;
            
            padding:10px 10px;
          '>
        <div id='$row->userid' style='display: flex; margin: 4px 6px'>
          
          <div id='$row->userid' style='
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                margin-top:10px
              '>
            <p  id='$row->userid'><h6 id='$row->userid' style='font-size: 18px;'>$row->name</h6></p>
            <div id='$row->userid' style='display:flex;justify-content:center;align-items:center'> <p style='margin-top:5px'> <h6 style='color:red'>Graduated</h6 > <h5 style='font-size: 16px;color: #009879;margin-left:10px' >$row->yearleft</h5></p></div>
           
          </div>
        </div>
      </div>
      </a>
            ";
      }
    }
  } else {
    $mess .= "No Pupil with such name";
  }
  $info->message = $mess;

  $info->type = "name";
  echo json_encode($info);
} elseif ($class !='All' && $stream == 'All') {
 
  $sql = "SELECT * FROM pupils WHERE name LIKE '%$name%'  and year=$year and class=$class  ";
  $results = $DB->read($sql, []);
  if (is_array($results)) {

    foreach ($results as $row) {
      if ($row->class <= 8) {
        $mess .= "
          <a ondblclick='addcat(event)' id='$row->userid' class='$row->name' style='text-decoration:none;color:inherit'>
          <div id='$row->userid' class='card' style='
          display: flex;
          
          margin-right: 12px;
          margin-bottom: 10px;
          height:130px;
          width:260px;
          
          padding:10px 10px;
        '>
      <div id='$row->userid' style='display: flex; margin: 4px 6px'>
        
        <div id='$row->userid' style='
              display: flex;
              justify-content: center;
              align-items: center;
              flex-direction: column;
              margin-top:10px
            '>
          <p  id='$row->userid'><h6 id='$row->userid' style='font-size: 18px;'>$row->name</h6></p>
          <div id='$row->userid' style='display:flex;justify-content:center;align-items:center'> <p style='margin-top:5px'> <h6>Class</h6 > <h5  id='$row->userid' style='font-size: 16px;color: #009879;margin-left:10px' >$row->class $row->stream</h5></p></div>
         
        </div>
      </div>
    </div>
    </a>
          ";
      } else {
        $mess .= "
          <a ondblclick='addcat(event)' id='$row->userid' class='$row->name' style='text-decoration:none;color:inherit'>
          <div id='$row->userid' class='card' style='
          display: flex;
          
          margin-right: 12px;
          margin-bottom: 10px;
          height:130px;
          width:260px;
          
          padding:10px 10px;
        '>
      <div id='$row->userid' style='display: flex; margin: 4px 6px'>
        
        <div id='$row->userid' style='
              display: flex;
              justify-content: center;
              align-items: center;
              flex-direction: column;
              margin-top:10px
            '>
          <p id='$row->userid'><h6 id='$row->userid' style='font-size: 18px;'>$row->name</h6></p>
          <div id='$row->userid' style='display:flex;justify-content:center;align-items:center'> <p style='margin-top:5px'> <h6 id='$row->userid' style='color:red'>Graduated</h6 > <h5 id='$row->userid' style='font-size: 16px;color: #009879;margin-left:10px' >$row->yearleft</h5></p></div>
         
        </div>
      </div>
    </div>
    </a>
          ";
      }
    }
  } else {
    $mess .= "No Pupil with such name";
  }
  $info->message = $mess;

  $info->type = "name";
  echo json_encode($info);
} else {
  
  $sql="SELECT * FROM pupils WHERE name LIKE '%$name%'  and year=$year and class=$class and stream='$stream'  ";
  $results=$DB->read($sql,[]);
  if (is_array($results)) {
   
      foreach ($results as $row) {
        if ($row->class <= 8) {
          $mess.="
          <a ondblclick='addcat(event)' id='$row->userid' class='$row->name' style='text-decoration:none;color:inherit'>
          <div id='$row->userid'  class='card' style='
          display: flex;
          
          margin-right: 12px;
          margin-bottom: 10px;
          height:130px;
          width:260px;
          
          padding:10px 10px;
        '>
      <div id='$row->userid' style='display: flex; margin: 4px 6px'>
         
        <div id='$row->userid' style='
              display: flex;
              justify-content: center;
              align-items: center;
              flex-direction: column;
              margin-top:10px
            '>
          <p id='$row->userid'><h6 id='$row->userid' style='font-size: 18px;'>$row->name</h6></p>
          <div id='$row->userid' style='display:flex;justify-content:center;align-items:center'> <p style='margin-top:5px'> <h6 id='$row->userid'>Class</h6 > <h5 id='$row->userid' style='font-size: 16px;color: #009879;margin-left:10px' >$row->class $row->stream</h5></p></div>
         
        </div>
      </div>
    </div>
    </a>
          ";
         
        }else {
          $mess.="
          <a ondblclick='addcat(event)' id='$row->userid' class='$row->name' style='text-decoration:none;color:inherit'>
          <div id='$row->userid' class='card' style='
          display: flex;
          
          margin-right: 12px;
          margin-bottom: 10px;
          height:130px;
          width:260px;
          
          padding:10px 10px;
        '>
      <div id='$row->userid' style='display: flex; margin: 4px 6px'>
        
        <div id='$row->userid' style='
              display: flex;
              justify-content: center;
              align-items: center;
              flex-direction: column;
              margin-top:10px
            '>
          <p id='$row->userid'><h6 id='$row->userid' style='font-size: 18px;'>$row->name</h6></p>
          <div id='$row->userid' style='display:flex;justify-content:center;align-items:center'> <p style='margin-top:5px'> <h6 id='$row->userid' style='color:red'>Graduated</h6 > <h5 style='font-size: 16px;color: #009879;margin-left:10px' >$row->yearleft</h5></p></div>
         
        </div>
      </div>
    </div>
    </a>
          ";
        }
        
          
      }
      
  
      
  }else {
      $mess.="No Pupil with such name";
  }
  $info->message =$mess;

  $info->type = "name";
  echo json_encode($info);
}
