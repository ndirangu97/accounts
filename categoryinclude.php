<?php






// print_r($DATA_OBJECT);



$name=strtoupper($DATA_OBJECT->name);




$query=false;
$query = "INSERT into  categories(name) VALUES('$name') ";
$read = $DB->write($query, []);
if ($read) {
    $info->message = "Category added successfully";

 

    $info->type = "cat";
    echo json_encode($info);
}