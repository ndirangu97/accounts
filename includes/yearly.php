<?php


    $sql=false;

    $sql="SELECT * FROM students";
    $results=$DB->read($sql,[]);
    if (is_array($results)) {
        foreach ($results as $row) {
            $id=$row->userid;
            $cls=$row->class;
            $ncl=$cls+1;

            
            $query="UPDATE students SET class =  $ncl WHERE userid= '$id'";

            $write=$DB->write($query,[]);
            if ($write) {
                $sql=false;
                $sql="SELECT * FROM students WHERE userid='$id'";
                $read2=$DB->read($sql,[]);
                if ($read2) {
                    $read2=$read2[0];
                    if (($read2->class) > 8 ) {
                        $query=false;
                        $date=date("Y");
                        $query="UPDATE students SET graduated = 1,yearleft='$date' WHERE userid= '$id'";
                        $insert=$DB->write($query,[]);
                        if ($insert) {
                            echo'awsome';
                        }else {
                            echo'not';
                        }
                        
                    }
                }
              
            }else {
                echo '999';
            }
        }
    }else {
       $no=1;
        
    }