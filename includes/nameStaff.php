<?php




$name=$DATA_OBJECT->name;

$sql=false;
$mess="";

$sql="SELECT * FROM staff WHERE name LIKE '%$name%' ";
$results=$DB->read($sql,[]);
if (is_array($results)) {
    foreach ($results as $row) {
        $mess.="
        <a href='morestaff.php?id=$row->userid' style='text-decoration:none;color:inherit'>
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
          <p style='font-size: 18px;color:#b4e334'>Dept : $row->department</p>
      </div>
    </div>
  </div>
  </a>
        ";
    }
   
    
}else {
    $mess.="No staff with such name";
}
$info->message =$mess;
$info->type = "name";
echo json_encode($info);
