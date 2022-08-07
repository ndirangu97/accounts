<?php
require_once "./connection.php";
require_once "./dataconnection.php";

$DB = new Database();
$DB2 = new Data();

$sql = false;
$sq = false;


$sq = "SELECT * FROM students WHERE class='8'";
$results = $DB2->read($sq, []);
if (is_array($results)) {
    foreach ($results as $key) {


        $r="SELECT * FROM students WHERE userid='$key->userid' LIMIT 1";
        $rr = $DB->read($r, []);
        if (is_array($rr)) {
            $b=0;

        }else {
            $query=false;
            $query="INSERT INTO students(name,userid,gender,disabled,class,stream,gname,g2name,gno,grole2,grole,g2no)values('$key->name','$key->userid','$key->gender','$key->disabled','$key->class','$key->stream','$key->gname','$key->g2name','$key->gno','$key->grole2','$key->grole','$key->g2no')";
            $results2 = $DB->write($query, []);
        }

       
    }
}


// $sql = "SELECT * FROM students  ";
// $results = $DB->read($sql, []);
// if (is_array($results)) {
//     echo "<pre>";
//     print_r($results);
// }

// Fatal error: Maximum execution time of 120 seconds exceeded in C:\xampp\htdocs\milimani\connection.php on line 42