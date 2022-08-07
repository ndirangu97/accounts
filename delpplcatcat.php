<?php







$id=$DATA_OBJECT->id;


$query = false;
$query = "UPDATE pupils SET categories='pupils' WHERE userid='$id'";
$del = $DB->write($query, []);
if ($del) {

        $info->message = "Category added successfully";



        $info->type = "cat";
        echo json_encode($info);
    
}
