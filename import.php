<?php

$sql=false;
$sql="SELECT * FROM students";
$read=$DB->read($sql,[]);
$mess="";
$err="";


if (is_array($read)) {
    $no=count($read);
    
    foreach ($read as $row) {
        # code...
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
