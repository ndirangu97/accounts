<?php
require_once "./dataconnection.php";

$DB2=new Data();


$sq="SELECT * FROM students  ";
$results=$DB2->read($sq,[]);
if (is_array($results)) {
   echo "<pre>";
print_r($results);
}
