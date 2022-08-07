<?php

$cl=$DATA_OBJECT->class;
$yr=$DATA_OBJECT->year;
$ct=$DATA_OBJECT->category;
$tb="";



$sql=false;
$sql="SELECT * FROM pupils WHERE class=$cl and year=$yr and categories='$ct' LIMIT 1";
$results=$DB->read($sql,[]);

if (is_array($results)) {
    $results=$results[0];
    $total=($results->januaryfees)+($results->februaryfees)+($results->marchfees)+($results->aprilfees)+($results->mayfees)+($results->junefees)+($results->julyfees)+($results->augustfees)+($results->septemberfees)+($results->octoberfees)+($results->novemberfees)+($results->decemberfees);

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
        <td>$results->januaryfees</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer' class='$cl' onclick='headmod(event)' id='januaryfees' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>February</td>
        <td>$results->februaryfees</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$cl'  onclick='headmod(event)' id='februaryfees' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>March</td>
        <td>$results->marchfees</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$cl' onclick='headmod(event)' id='marchfees' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>April</td>
        <td>$results->aprilfees</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$cl' onclick='headmod(event)' id='aprilfees' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>May</td>
        <td>$results->mayfees</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$cl' onclick='headmod(event)' id='mayfees' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>June</td>
        <td>$results->junefees</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$cl' onclick='headmod(event)' id='junefees' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>July</td>
        <td>$results->julyfees</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$cl' onclick='headmod(event)' id='julyfees' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>August</td>
        <td>$results->augustfees</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$cl' onclick='headmod(event)' id='augustfees' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>September</td>
        <td>$results->septemberfees</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$cl' onclick='headmod(event)' id='septemberfees' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>October</td>
        <td>$results->octoberfees</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer '  class='$cl' onclick='headmod(event)' id='octoberfees' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>November</td>
        <td>$results->novemberfees</td>
        <td style='padding:10px 3px ;'><img  style='cursor:pointer'  class='$cl' onclick='headmod(event)' id='novemberfees' src='./images/delete.png' width='15px' height='15px' /></td>
    
      </tr>
      
      <tr>
        <td>December</td>
        <td>$results->decemberfees</td>
        <td style='padding:10px 3px ;'><img style='cursor:pointer'  class='$cl' onclick='headmod(event)' id='decemberfees' src='./images/delete.png' width='15px' height='15px' /></td>
    
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