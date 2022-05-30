<?php
// print_r($DATA_OBJECT);
// die;

$id = $DATA_OBJECT->id;

$mth = $DATA_OBJECT->month;
$fees = $DATA_OBJECT->fees;
$yer = $DATA_OBJECT->year;
$tn = $DATA_OBJECT->term;
$err = "";

$sql = false;


$sql = "SELECT * FROM pupils WHERE userid='$id' and year=$yer";
$res = $DB->read($sql, []);
if (is_array($res)) {
    $res = $res[0];
    $query = false;


    $set = $res->$mth;
    $bal = ($set) - ($fees);

    if ($set == 0) {

        $info->message = " ERROR:VoteHead  for $mth  has not been set";

        $info->type = "err";
        echo json_encode($info);
    } else {


        $sql = false;
        $sql = "SELECT * FROM fees WHERE userid='$id' and year=$yer";
        $fes = $DB->read($sql, []);
        if (is_array($fes)) {
            foreach ($fes as $row) {
                if ($row->month == $mth) {
                    $md = strtoupper($mth);
                    $err = "error";
                    $info->message = "$md fees have already been payed.";

                    $info->type = "err";
                    echo json_encode($info);
                }
            }
            if ($err == "") {
                $query=false;
                $query = "INSERT INTO fees(userid,month,term,fees,paid,balance,year) VALUES('$id','$mth',$tn,$set,$fees,$bal,$yer) ";
                $read = $DB->write($query, []);
                if ($read) {
                   
                    $query=false;
                    $clerk='Truphena';
                    $datem=date('d-m');
                    $time=date('H:i');
   
                    $query="INSERT into statement(userid,month,fees,paid,balance,term,clerk,date,time,year,type) VALUES('$id','$mth',$set,$fees,$bal,$tn,'$clerk','$datem','$time',$yer,'new')";
                    $stmt=$DB->write($query,[]);
                    if ($stmt) {
                        $info->message = "Fess payed Succefully";

                        $info->type = "pay";
                        echo json_encode($info);
                        
                       
                    }else {
                       $info->message = "Statement not created";
   
                       $info->type = "err";
                       echo json_encode($info);
                    }

                }
                
            }
        } else {
            $query=false;
            $query = "INSERT INTO fees(userid,month,term,fees,paid,balance,year) VALUES('$id','$mth',$tn,$set,$fees,$bal,$yer) ";
            $read2 = $DB->write($query,[]);
            if ($read2) {
                
                $query=false;
                $clerk='Truphena';
                $datem=date('d-m');
                $time=date('H:i');

                $query="INSERT into statement(userid,month,fees,paid,balance,term,clerk,date,time,year,type) VALUES('$id','$mth',$set,$fees,$bal,$tn,'$clerk','$datem','$time',$yer,'new')";
                $stmt=$DB->write($query,[]);
                if ($stmt) {
                    $info->message = "Fess payed Succefully";

                    $info->type = "pay";
                    echo json_encode($info);
                
                }else {
                    $info->message = "Statement not created";

                    $info->type = "err";
                    echo json_encode($info);
                }
                
            }
            
            
        }
    }
} else {
    $info->message = "ERROR : Student not nound";

    $info->type = "pay";
    echo json_encode($info);
}



