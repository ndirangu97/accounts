<?php

$sql = false;
$c = $DATA_OBJECT->class;
$s = $DATA_OBJECT->stream;
$mess = "";
$no=0;
$sql = "SELECT * FROM students WHERE class='$c' and stream ='$s'";

$read = $DB->read($sql, []);

if (is_array($read)) {

    $mess.="
    <table class='content-table' style='width: 100%;'>
        
        <tbody id='stmtable'>
    
    ";
    foreach ($read as $key) {

        $no++;
        $mess .= "
        
          

           
            <tr>
            <td> $no </td>
                <td> <input class='$key->userid' style='width:300px' value='$key->name'/> </td>
                <td><button id='$key->userid' onclick='changename(event)'>Change name</button></td>
               
                
            </tr>
            

        
        
        ";
    }
    $mess.="   </tbody>
    </table>";

    $info->message =$mess;
    
    $info->type = "roll";
    echo json_encode($info);
}else {
    $info->message ="no students";
    
    $info->type = "error";
    echo json_encode($info);
}
