<?php

$sql=false;
$sql="SELECT * FROM students";
$read=$DB->read($sql,[]);
$mess="";
$err="";


if (is_array($read)) {
    $no=0;

   
    
    foreach ($read as $row) {

        $sql=false;
        $getid=$row->userid;
        $sql="SELECT * FROM pupils WHERE userid='$getid' LIMIT 1";
        $getres=$DB->read($sql,[]);

        if (is_array($getres)) {
           
        }else {
            $no++;
            
        $query=false;
        $id=$row->userid;
        $class=$row->class;
        $stream=$row->stream;
        $yr=date('Y');
        $name=$row->name;


        $query="INSERT INTO pupils(userid,class,stream,year,name)VALUES('$id',$class,'$stream',$yr,'$name') ";
        $save=$DB->write($query,[]);
        if ($save) {
            $mess="<p style='color:green'>  $no Pupils imported successfully </p>";
           
        }else {
            $err="<p style='color:red'> ERROR :pupils not imported </p>";
        }
            
        }


       
    }
}
if ($mess!="") {
    # code...
$info->message = $mess;

 

$info->type = "import";
echo json_encode($info);

}
if ($err!="") {
    # code...
    $info->message = $err;

 

$info->type = "err";
echo json_encode($info);

}

if ($no==0) {
    $info->message="<p style='color:red'> All pupils already imported </p>";
    $info->type = "err";
    echo json_encode($info);
}
