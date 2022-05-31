<?php


$sql=false;
$sql="SELECT * from pupils";

$results=$DB->read($sql,[]);
$mess="";
$err="";

if (is_array($results)) {
    foreach ($results as $row) {


        

       $class=$row->class;
       $id=$row->userid;
       $stream=$row->stream;
       $name=$row->name;
        $year=date('Y');

       $new=$class+1;

       $query=false;
       $query="INSERT INTO  pupils(class,stream,userid,year,name) VALUES($new,'$stream','$id',$year,'$name')";
       $write=$DB->write($query,[]);
       if ($write) {
        $mess="<p style='color:green'> Pupils transfered  successfully </p>";
        $y1=date('Y');
        $y2=date('Y')-1;

        $sql=false;
        $sql="SELECT * FROM fees WHERE userid='$id' and year=$y2";
        
        $p=$DB->read($sql,[]);
        $bal=array();
        if (is_array($p)) {
            foreach ($p as $keyp) {
                array_push($bal, $keyp->balance);
            }
            $balance = array_sum($bal);

            $fy=date('Y');
            

            $query=false;
            $query="INSERT into fees(lastyear,year,userid) VALUES($balance,$fy,'$id') ";
            $wr=$DB->write($query,[]);

            if ($wr) {
                # code...
                $b=0;
            }else {
                $m=0;
            }

            
        }else {
            $a=0;
        }
           
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
