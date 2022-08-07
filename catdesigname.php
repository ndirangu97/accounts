<?php


$sql = false;

$sql = false;

$i=0;

$name = $DATA_OBJECT->name;
$class = $DATA_OBJECT->class;
$cat = $DATA_OBJECT->category;
$stream = $DATA_OBJECT->stream;

$r = 8;
$year = date('Y');
// $year=2023;

if ($class =='All' && $stream == 'All') {
 

  $sql = "SELECT * FROM pupils WHERE name LIKE '%$name%'  and year=$year and categories='$cat' ";
  $results = $DB->read($sql, []);
  if (is_array($results)) {
    $mess.="
    <table class='content-table' style='width: 100%;'>
        <thead>
            <tr>
            <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Action</th>
                



            </tr>
        </thead>
        <tbody id='stmtable'>
    
    ";

    foreach ($results as $row) {
      if ($row->class <= 8) {
        $i++;
        $mess .= "
        
          

           
            <tr>
            <td>$i</td>
                <td>$row->name</td>
                <td>$row->categories</td>
                <td><button id='$row->userid' style='margin-top: 30px;padding:4px 20px;border:1px solid #009879;border-radius:8px;background:#7ed2f3' onclick='category()'>Remove</button></td>
            </tr>
            

     
        
        ";
      } else {
        $i++;
        $mess .= "
        
          

           
            <tr>
            <td>$i</td>
                <td>$row->name</td>
                <td>$row->categories</td>
                <td><button id='$row->userid' style='margin-top: 30px;padding:4px 20px;border:1px solid #009879;border-radius:8px;background:#7ed2f3' onclick='category()'>Remove</button></td>
            </tr>
            

     
        
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
 
  $sql = "SELECT * FROM pupils WHERE name LIKE '%$name%'  and year=$year and class=$class and categories='$cat'  ";
  $results = $DB->read($sql, []);
  if (is_array($results)) {

    $mess.="
    <table class='content-table' style='width: 100%;'>
        <thead>
            <tr>
            <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Action</th>
                



            </tr>
        </thead>
        <tbody id='stmtable'>
    
    ";
    foreach ($results as $row) {
      if ($row->class <= 8) {
        $i++;
        $mess .= "
        
          

           
            <tr>
            <td>$i</td>
                <td>$row->name</td>
                <td>$row->categories</td>
                <td><button id='$row->userid' style='margin-top: 30px;padding:4px 20px;border:1px solid #009879;border-radius:8px;background:#7ed2f3' onclick='category()'>Remove</button></td>
            </tr>
            

     
        
        ";
      } else {
        $i++;
        $mess .= "
        
          

           
            <tr>
            <td>$i</td>
                <td>$row->name</td>
                <td>$row->categories</td>
                <td><button id='$row->userid' style='margin-top: 30px;padding:4px 20px;border:1px solid #009879;border-radius:8px;background:#7ed2f3' onclick='category()'>Remove</button></td>
            </tr>
            

     
        
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
  
  $sql="SELECT * FROM pupils WHERE name LIKE '%$name%'  and year=$year and class=$class and stream='$stream' and categories='$cat' ";
  $results=$DB->read($sql,[]);
  if (is_array($results)) {
    $mess.="
    <table class='content-table' style='width: 100%;'>
        <thead>
            <tr>
            <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Action</th>
                



            </tr>
        </thead>
        <tbody id='stmtable'>
    
    ";
   
      foreach ($results as $row) {
        if ($row->class <= 8) {
            $i++;
            $mess .= "
            
              
    
               
                <tr>
                <td>$i</td>
                    <td>$row->name</td>
                    <td>$row->categories</td>
                    <td><button id='$row->userid' style='margin-top: 30px;padding:4px 20px;border:1px solid #009879;border-radius:8px;background:#7ed2f3' onclick='category()'>Remove</button></td>
                </tr>
                
    
         
            
            ";
         
        }else {
            $i++;
            $mess .= "
            
              
    
               
                <tr>
                <td>$i</td>
                    <td>$row->name</td>
                    <td>$row->categories</td>
                    <td><button id='$row->userid' style='margin-top: 30px;padding:4px 20px;border:1px solid #009879;border-radius:8px;background:#7ed2f3' onclick='category()'>Remove</button></td>
                </tr>
                
    
         
            
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
