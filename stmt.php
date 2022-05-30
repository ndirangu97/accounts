<?php
$sql = false;
$id = $DATA_OBJECT->id;
$yr=$DATA_OBJECT->year;
$sql = "SELECT * FROM statement WHERE userid='$id' and year= $yr";
$read = $DB->read($sql, []);
$table="";

if (is_array($read)) {
    $table.="
   
    
    ";

    foreach ($read as $keys) {

        $month = strtoupper($keys->month);

       $table.= "
                    
                     
                     <tr>
                     <td> $month</td>
                     <td>$keys->term</td>
                     <td>$keys->fees</td>
                     <td>$keys->paid</td>
                     <td>$keys->balance</td>
                     
                    
                     <td>$keys->date</td>
                     <td>$keys->time</td> 
                     <td>$keys->clerk</td>
                     <td>$keys->type</td>
                     <td>$keys->year</td>
                     <td style='padding:10px 3px ;'><img onclick='stmtmod(event)' id='$keys->id' src='./images/delete.png' width='15px' height='15px' /></td>
   
                   </tr>
                   
              

                     ";
                   
    }
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

