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

       $new=$class+1;

       $query=false;
       $query="UPDATE pupils SET class=$new WHERE userid='$id'";
       $write=$DB->write($query,[]);
       if ($write) {
        $mess="<p style='color:green'> Pupils transfered  successfully </p>";
           
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
