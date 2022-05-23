<?php

$sql=false;
$sql="SELECT * from pupils";

$results=$DB->read($sql,[]);

if (is_array($results)) {
    foreach ($results as $row) {
       $class=$row->class;
       $id=$row->userid;

       $new=$class+1;

       $query=false;
       $query="UPDATE pupils SET class=$new WHERE userid='$id'";
       $write=$DB->write($query,[]);
       if ($write) {
           # code...
           echo 'good';
       }
    }
    
}else{

}

?>