<?php

$sql=false;
$sql="SELECT * FROM students";
$read=$DB->read($sql,[]);

if (is_array($read)) {
    
    foreach ($read as $row) {
        # code...
        $query=false;
        $id=$row->userid;
        $class=$row->class;
        $stream=$row->stream;
        $yr=date('Y');


        $query="INSERT INTO pupils(userid,class,stream,year)VALUES('$id',$class,'$stream',$yr) ";
        $save=$DB->write($query,[]);
        if ($save) {
            
            
        }
    }
}