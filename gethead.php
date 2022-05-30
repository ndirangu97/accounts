<?php

$cl=$DATA_OBJECT->class;
$yr=$DATA_OBJECT->year;
$tb="";


$sql=false;
$sql="SELECT * FROM pupils WHERE class=$cl and year=$yr LIMIT 1";
$results=$DB->read($sql,[]);

if (is_array($results)) {
    $results=$results[0];
    $total=($results->january)+($results->february)+($results->march)+($results->april)+($results->may)+($results->june)+($results->july)+($results->august)+($results->september)+($results->october)+($results->november)+($results->december);

    $tb.= "
    
    <table width='100%'  class='content-table' >
    <thead>
      <tr >
      <th>MONTH</th>
      <th>HEAD</th>
      <th style='padding:10px 3px ;'>ACTIONS</th>
      
      </tr>
    </thead>
    <tbody>
      
      
      <tr>
        <td>January</td>
        <td>$results->january</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer' class='$results->userid' onclick='headmod(event)' id='january' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>February</td>
        <td>$results->february</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$results->userid'  onclick='headmod(event)' id='february' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>March</td>
        <td>$results->march</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$results->userid' onclick='headmod(event)' id='march' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>April</td>
        <td>$results->april</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$results->userid' onclick='headmod(event)' id='april' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>May</td>
        <td>$results->may</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$results->userid' onclick='headmod(event)' id='may' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>June</td>
        <td>$results->june</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$results->userid' onclick='headmod(event)' id='june' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>July</td>
        <td>$results->july</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$results->userid' onclick='headmod(event)' id='july' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>August</td>
        <td>$results->august</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$results->userid' onclick='headmod(event)' id='august' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>September</td>
        <td>$results->september</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$results->userid' onclick='headmod(event)' id='september' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>October</td>
        <td>$results->october</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer '  class='$results->userid' onclick='headmod(event)' id='october' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>November</td>
        <td>$results->november</td>
        <td style='padding:10px 3px ;'><img  style='cursor:pointer'  class='$results->userid' onclick='headmod(event)' id='november' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>December</td>
        <td>$results->december</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$results->userid' onclick='headmod(event)' id='december' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      <tr>
        <th>Total set</th>
        <th><h6>$total</h6></th>
    
      </tr>
      
     
      
       
        
        
        
        
        
        
      
   </tbody>
   </table>
    ";
    
    $info->message =$tb;
  
    $info->type = "head";
    echo json_encode($info);
    
}else {
    $tb.= "<p > <h6 style='color:red'> No votehead set for $yr in class $cl </h6> <p>";
    
    $info->message =$tb;
  
    $info->type = "head";
    echo json_encode($info);
}