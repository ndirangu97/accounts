<?php


$sql=false;
$sql="SELECT * from pupils";

$results=$DB->read($sql,[]);
$mess="";
$err="";

if (is_array($results)) {
    foreach ($results as $row) {


        
        $mbalance = ($row->januarybalance) + ($row->februarybalance) + ($row->marchbalance) + ($row->aprilbalance) + ($row->maybalance) + ($row->junebalance) + ($row->julybalance) + ($row->augustbalance) + ($row->septemberbalance) + ($row->octoberbalance) + ($row->novemberbalance) + ($row->decemberbalance) + ($row->lastyearbalance);

       $class=$row->class;
       $id=$row->userid;
       $stream=$row->stream;
       $name=$row->name;
        $year=date('Y');
        // $year=2023;

       $new=$class+1;

       $query=false;
       $query="INSERT INTO  pupils(class,stream,userid,year,name,lastyearbalance) VALUES($new,'$stream','$id',$year,'$name',$mbalance)";
       $write=$DB->write($query,[]);
       if ($write) {
        $mess="<p style='color:green'> Pupils transfered  successfully </p>";
        $y1=date('Y');
    
        

        
       
           
       }else {
        $err="<p style='color:red'> ERROR :pupils not transferred </p>";
       }
    }
    if ($mess!="") {
        # code...


        $sql=false;
        $sql="SELECT * from pupils";

        $resultsg=$DB->read($sql,[]);
        if (is_array($resultsg)) {
            foreach ($resultsg as $rowg) {
                if (($rowg->class) > 8) {
                    # code...
                    $query=false;
                    $gid=$rowg->userid;
                    $yg=date('Y');
                    $query="UPDATE pupils SET graduated=1,yearleft=$yg WHERE userid='$gid' ";
                    $gd=$DB->write($query,[]);
                }

            }}

        $info->message = $mess;
        $info->type = "yearly";
        echo json_encode($info);
    }
    if ($err!="") {
        # code...
        $info->message = $err;
        $info->type = "err";
        echo json_encode($info);


    }
    
}else{
    $info->message = "<p style='color:red'> ERROR : no pupils in database   </p>";
    $info->type = "err";
    echo json_encode($info);


}
