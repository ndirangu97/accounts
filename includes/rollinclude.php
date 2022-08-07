<?php

$sql = false;
$c = $DATA_OBJECT->class;
$s = $DATA_OBJECT->stream;
$mess = "";
$sql = "SELECT * FROM students WHERE class='$c' and stream ='$s'";

$read = $DB->read($sql, []);

if (is_array($read)) {

    $mess.="
    <table class='content-table' style='width: 100%;'>
        <thead>
            <tr>
                <th>Student</th>
                <th>Class</th>
                <th>UPI/Assesment</th>
                <th>Gender</th>

                <th> 1<small>st</small>Guardian Name </th>
                <th> 1<small>st</small>Guardian No </th>
                <th>1<small>st</small>Guardian Role </th>
                <th>2<small>nd</small>Guardian Name </th>
                <th>2<small>nd</small>Guardian No </th>
                <th>2<small>nd</small>Guardian Role </th>



            </tr>
        </thead>
        <tbody id='stmtable'>
    
    ";
    foreach ($read as $key) {
        $mess .= "
        
          

           
            <tr>
                <td>$key->name</td>
                <td>$key->class $key->stream</td>
                <td>$key->upi</td>
                <td>$key->gender</td>
                <td>$key->gname</td>
                <td>$key->gno</td>
                <td>$key->grole</td>
                <td>$key->g2name</td>
                <td>$key->g2no</td>
                <td>$key->grole2</td>
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
