<?php







$name = strtoupper($DATA_OBJECT->name);
$name2 = strtolower($DATA_OBJECT->name);


$query = false;
$query = "DELETE FROM categories WHERE name='$name'";
$del = $DB->write($query, []);
if ($del) {
    $query = false;
    $query = "UPDATE pupils set categories='pupils' WHERE categories='$name2'";
    $read = $DB->write($query, []);
    if ($read) {
        $info->message = "Category added successfully";



        $info->type = "cat";
        echo json_encode($info);
    }
}
