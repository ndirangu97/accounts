<?php
// print_r($DATA_OBJECT);


$sql = false;
$id = $DATA_OBJECT->id;
$tn=$DATA_OBJECT->term;
$mth = $DATA_OBJECT->month;
$fees = $DATA_OBJECT->fees;
$yer = $DATA_OBJECT->year;


$sql = "SELECT * FROM fees WHERE userid='$id' and year=$yer and month='$mth'";
$res = $DB->read($sql, []);
if (is_array($res)) {

    $res=$res[0];
    $paid=$res->paid;

    $nowfees=($paid)+$fees;
    $tp=$res->fees;
    $bal=($tp)-$nowfees;

    $query=false;

    $query="UPDATE fees set paid =$nowfees,balance=$bal WHERE userid='$id' and year=$yer and month='$mth' ";
    $write=$DB->write($query,[]);
    if ($write) {
        $info->message = "Fees added successfully";

 

        $info->type = "pay";
        echo json_encode($info);
        $query=false;
        $clerk='Truphena';
        $datem=date('d-m');
        $time=date('H:i');

        $query="INSERT into statement(userid,month,fees,paid,balance,term,clerk,date,time,year,type) VALUES('$id','$mth',$tp,$fees,$bal,$tn,'$clerk','$datem','$time',$yer,'add')";
        $stmt=$DB->write($query,[]);
        if ($stmt) {
            # code...
           
        }else {
            $info->message = "Statement not created";

            $info->type = "err";
            echo json_encode($info);
        }
    }else {
        $info->message = "Statement not created";

        $info->type = "err";
        echo json_encode($info);
        
    }
}else {
  
    $info->message = "Fees for $mth Year $yer have not been paid";

        $info->type = "err";
        echo json_encode($info);
}



