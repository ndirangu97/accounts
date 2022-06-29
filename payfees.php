<?php
// print_r($DATA_OBJECT);
// die;

$id = $DATA_OBJECT->id;

$mth = $DATA_OBJECT->month;
$fees = $DATA_OBJECT->fees;
$yer = $DATA_OBJECT->year;
$tn = $DATA_OBJECT->term;
$err = "";
if (empty($DATA_OBJECT->no)) {
    $no = "";
} else {
    $no = $DATA_OBJECT->no;
}
if (empty($DATA_OBJECT->dt)) {
    $dt = "";
} else {
    $dt = $DATA_OBJECT->dt;
}







$sql = false;

$feesmonth = $mth . "fees";
$feespaid = $mth . "paid";
$feesbalance = $mth . "balance";

$sql = "SELECT * FROM pupils WHERE userid='$id' and year=$yer LIMIT 1";
$res = $DB->read($sql, []);
if (is_array($res)) {
    $res = $res[0];
    $query = false;



    $feepaying = ($res->$feespaid) + $fees;



    if ($res->$feesmonth == 0) {

        $err = " ERROR:VoteHead  for $mth  has not been set";

        $info->message = $err;

        $info->type = "err";
        echo json_encode($info);
    } else {


        $sql = false;
        $sql = "SELECT * FROM pupils WHERE userid='$id' and year=$yer LIMIT 1";
        $fes = $DB->read($sql, []);
        if (is_array($fes)) {



            if ($err == "") {
                $query = false;
                $query = "UPDATE pupils set $feespaid=$feepaying WHERE userid='$id' and year =$yer";
                $read = $DB->write($query, []);
                if ($read) {
                    $sql = false;
                    $sql = "SELECT * FROM pupils WHERE userid='$id' and year=$yer LIMIT 1";
                    $ress = $DB->read($sql, []);
                    if (is_array($ress)) {
                        $ress = $ress[0];

                        $set = $ress->$feesmonth;
                        $setp = $ress->$feespaid;
                        $bal = ($set) - ($setp);

                        $query = false;
                        $query = "UPDATE pupils set $feesbalance=$bal WHERE userid='$id' and year =$yer";
                        $readtp = $DB->write($query, []);
                        if ($readtp) {
                            $gh = 0;
                        } else {
                            $err = 'Opps!!Error occured';
                        }
                    }

                    $sql = false;
                    $sql = "SELECT  * FROM pupils WHERE userid='$id' and year=$yer LIMIT 1";
                    $rest = $DB->read($sql, []);


                    $term2 = "";
                    $balance = "";
                    $sum = array();

                    if (is_array($rest)) {
                        // echo "<pre>";
                        // print_r($res);
                        $rest = $rest[0];
                        $name=$rest->name;

                        $mbalance = ($rest->januarybalance) + ($rest->februarybalance) + ($rest->marchbalance) + ($rest->aprilbalance) + ($rest->maybalance) + ($rest->junebalance) + ($rest->julybalance) + ($rest->augustbalance) + ($rest->septemberbalance) + ($rest->octoberbalance) + ($rest->novemberbalance) + ($rest->decemberbalance) + ($rest->lastyearbalance);
                    }

                    $query = false;
                    $clerk = 'Truphena';
                    $datem = date('d-m');
                    $time = date('H:i');

                    $query = "INSERT into statement(userid,month,fees,paid,balance,term,clerk,date,time,year,recieptno,totalbalance) VALUES('$id','$mth',$set,$fees,$bal,$tn,'$clerk','$datem','$time',$yer,'$no',$mbalance)";
                    $stmt = $DB->write($query, []);
                    if ($stmt) {
                        $info->message = "Fess payed Succefully";

                        $info->type = "pay";
                        echo json_encode($info);
                    } else {
                        $info->message = "Statement not created";

                        $info->type = "err";
                        echo json_encode($info);
                    }

                    $query = false;
                    $datem2 = date('Y-m-d');

                    $query = "INSERT into activity(name,date,amount,time,clerk,balance) VALUES('$name','$datem2',$fees,'$time','$clerk',$mbalance)";
                    $act = $DB->write($query, []);
                    if ($act) {
                      $acti=0;
                    } else {
                        $actids=0;
                    }
                }
            }
        } else {
            $err = "ERROR : Student not nound";
        }
    }
} else {
    $info->message = "ERROR : Student not nound";

    $info->type = "pay";
    echo json_encode($info);
}
