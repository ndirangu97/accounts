<?php

$id = $DATA_OBJECT->id;
$yr=$DATA_OBJECT->year;
$m="";
$r=0;
$sql = false;

$sql = "SELECT * FROM statement WHERE userid='$id' and year= $yr";
$read = $DB->read($sql, []);
$table="";

if (is_array($read)) {
    $table.="
   
    
    ";

    foreach ($read as $keys) {
$r++;
      $date = $keys->date;
$convertDate = date('F jS, Y ', strtotime($date));


        $month = strtoupper($keys->month);

      $m.="
      <tr >
        <td>$r</td>
        <td>$convertDate</td>
        <td>$keys->paid</td>      <td>$keys->recieptno</td>

      </tr>
      
      ";
                   
    }
    $table.= "
    <div style='width:100%;height:100%;background:'red';display:flex;justify-content:center;padding:20px 0 20px 0'>
    <div style='margin-bottom:20px'>
    <table width='100%' class='content-table'>
    <thead>
      <tr>
        <th>#</th>
        <th>Date</th>
        <th>PAID</th>
        <th>RECIEPT</th>
       
      </tr>
    </thead>
    <tbody>

$m
  
     


    </tbody>
  </table>
    
       
                  
    
  <div/>
    <div/>
          
           

                  ";
    $info->message = $table;

 

    $info->type = "stmt";
    echo json_encode($info);
}else {
    $info->message = "<div style='width:100%;height:100%;display:flex;justify-content:center;align-items:center;'>
    
    <p style='color:red'> No statement found for year $yr</p>
            </div>";

 

    $info->type = "stmt";
    echo json_encode($info);
}

