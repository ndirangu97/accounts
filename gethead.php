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
      
      </tr>
    </thead>
    <tbody>
      
      
      <tr>
        <td>January</td>
        <td>$results->january</td>
    
      </tr>
      
      <tr>
        <td>February</td>
        <td>$results->february</td>
    
      </tr>
      
      <tr>
        <td>March</td>
        <td>$results->march</td>
    
      </tr>
      
      <tr>
        <td>April</td>
        <td>$results->april</td>
    
      </tr>
      
      <tr>
        <td>May</td>
        <td>$results->may</td>
    
      </tr>
      
      <tr>
        <td>June</td>
        <td>$results->june</td>
    
      </tr>
      
      <tr>
        <td>July</td>
        <td>$results->july</td>
    
      </tr>
      
      <tr>
        <td>August</td>
        <td>$results->august</td>
    
      </tr>
      
      <tr>
        <td>September</td>
        <td>$results->september</td>
    
      </tr>
      
      <tr>
        <td>October</td>
        <td>$results->october</td>
    
      </tr>
      
      <tr>
        <td>November</td>
        <td>$results->november</td>
    
      </tr>
      
      <tr>
        <td>December</td>
        <td>$results->december</td>
    
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