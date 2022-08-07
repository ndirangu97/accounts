<?php



$cat = $DATA_OBJECT->category;
$mess='';




$sql=false;
$sql = "SELECT * FROM pupils WHERE categories='$cat'";
$results = $DB->read($sql, []);
$i=0;
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
    foreach ($results as $key) {
        $i++;
        $mess .= "
        
          

           
            <tr>
            <td>$i</td>
                <td>$key->name</td>
                <td>$key->categories</td>
                <td><button id='$key->userid' style='margin-top: 30px;padding:4px 20px;border:1px solid #009879;border-radius:8px;background:#7ed2f3' onclick='categoryrem(event)'>Remove</button></td>
            </tr>
            

     
        
        ";
    }
    $info->message =$mess;

    $info->type = "category";
    echo json_encode($info);
}else {
    $info->message="No pupil in that category";
    $info->type = "category";
    echo json_encode($info);
}