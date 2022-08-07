<?php


// print_r();
// die;
$foot = "";

$id = $DATA_OBJECT->id;
$year = $DATA_OBJECT->year;

$sql = false;
$sql = "SELECT  * FROM pupils WHERE userid='$id' and year=$year LIMIT 1";
$res = $DB->read($sql, []);


$term2 = "";
$balance = "";
$sum = array();
$tterm = "";
$tfee = "";
$kil="";

if (is_array($res)) {
    // echo "<pre>";
    // print_r($res);
    $sql = false;
    $sql = "SELECT  * FROM statement WHERE userid='$id' and year=$year ORDER BY ID DESC LIMIT 1";
    $res2 = $DB->read($sql, []);
    if (is_array($res2)) {
      $res2=$res2[0];
      
            $date = $res2->date;
$convertDate = date('F jS, Y ', strtotime($date));

      $ptd=$res2->paid;
    }else{
      $date='';
      $ptd="";
    }


    $res = $res[0];

    $mbalance = ($res->januarybalance) + ($res->februarybalance) + ($res->marchbalance) + ($res->aprilbalance) + ($res->maybalance) + ($res->junebalance) + ($res->julybalance) + ($res->augustbalance) + ($res->septemberbalance) + ($res->octoberbalance) + ($res->novemberbalance) + ($res->decemberbalance) + ($res->lastyearbalance);

    $mfees = ($res->januaryfees) + ($res->februaryfees) + ($res->marchfees) + ($res->aprilfees) + ($res->mayfees) + ($res->junefees) + ($res->julyfees) + ($res->augustfees) + ($res->septemberfees) + ($res->octoberfees) + ($res->novemberfees) + ($res->decemberfees) + ($res->lastyearbalance);

    $mpaid = ($res->januarypaid) + ($res->februarypaid) + ($res->marchpaid) + ($res->aprilpaid) + ($res->maypaid) + ($res->junepaid) + ($res->julypaid) + ($res->augustpaid) + ($res->septemberpaid) + ($res->octoberpaid) + ($res->novemberpaid) + ($res->decemberpaid) ;

    $tobal=$mfees-$mpaid;




    if ($res->lastyearbalance != 0) {
        $term2 .= "
        <div style='display:flex'>
        <div class='lft'>
          <p>Last Year Balance</p>
          
        </div>
        <div class='rft'>
          <p>$res->lastyearbalance</p>
          

        </div>
    
      </div>
    ";
    $kil.="
    <div style='display:flex'>
                <div class='lft'>
                  <p></p>
                  
                </div>
                <div class='rft'>
                  <p><br/></p>
                  
        
                </div>
            
              </div>
    ";
    }else{
      $kil.="
      
      ";
    }

    
    if ($res->januaryfees != 0) {
        $tterm .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>January</p>
          
        </div>
        <div class='rft'>
          <p>$res->januaryfees</p>
          

        </div>
    
      </div>";
    }

    if ($res->februaryfees != 0) {
        $tterm .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>February</p>
          
        </div>
        <div class='rft'>
          <p>$res->februaryfees</p>
          

        </div>
    
      </div>";
    }
    if ($res->marchfees != 0) {
        $tterm .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>March</p>
          
        </div>
        <div class='rft'>
          <p>$res->marchfees</p>
          

        </div>
    
      </div>";
    }
    if ($res->aprilfees != 0) {
        $tterm .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>April</p>
          
        </div>
        <div class='rft'>
          <p>$res->aprilfees</p>
          

        </div>
    
      </div>";
    }
    if ($res->mayfees != 0) {
        $tterm .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>May</p>
          
        </div>
        <div class='rft'>
          <p>$res->mayfees</p>
          

        </div>
    
      </div>";
    }

    if ($res->junefees != 0) {
        $tterm .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>June</p>
          
        </div>
        <div class='rft'>
          <p>$res->junefees</p>
          

        </div>
    
      </div>";
    }
    if ($res->julyfees != 0) {
        $tterm .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>July</p>
          
        </div>
        <div class='rft'>
          <p>$res->julyfees</p>
          

        </div>
    
      </div>";
    }
    if ($res->augustfees != 0) {
        $tterm .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>August</p>
          
        </div>
        <div class='rft'>
          <p>$res->augustfees</p>
          

        </div>
    
      </div>";
    }
    if ($res->septemberfees != 0) {
        $tterm .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>September</p>
          
        </div>
        <div class='rft'>
          <p>$res->septemberfees</p>
          

        </div>
    
      </div>";
    }
    if ($res->octoberfees != 0) {
        $tterm .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>October</p>
          
        </div>
        <div class='rft'>
          <p>$res->octoberfees</p>
          

        </div>
    
      </div>";
    }
    if ($res->novemberfees != 0) {
        $tterm .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>November</p>
          
        </div>
        <div class='rft'>
          <p>$res->novemberfees</p>
          

        </div>
    
      </div>";
    }

    if ($res->decemberfees != 0) {
        $tterm .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>December</p>
          
        </div>
        <div class='rft'>
          <p>$res->decemberfees</p>
          

        </div>
    
      </div>";
    }



    if ($res->januarypaid != 0) {
        $tfee .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>January</p>
          
        </div>
        <div class='rft'>
          <p>$res->januarypaid</p>
          

        </div>
    
      </div>";
    }

    if ($res->februarypaid != 0) {
        $tfee .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>February</p>
          
        </div>
        <div class='rft'>
          <p>$res->februarypaid</p>
          

        </div>
    
      </div>";
    }
    if ($res->marchpaid != 0) {
        $tfee .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>March</p>
          
        </div>
        <div class='rft'>
          <p>$res->marchpaid</p>
          

        </div>
    
      </div>";
    }
    if ($res->aprilpaid != 0) {
        $tfee .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>April</p>
          
        </div>
        <div class='rft'>
          <p>$res->aprilpaid</p>
          

        </div>
    
      </div>";
    }
    if ($res->maypaid != 0) {
        $tfee .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>May</p>
          
        </div>
        <div class='rft'>
          <p>$res->maypaid</p>
          

        </div>
    
      </div>";
    }
    if ($res->junepaid != 0) {
        $tfee .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>June</p>
          
        </div>
        <div class='rft'>
          <p>$res->junepaid</p>
          

        </div>
    
      </div>";
    }
    if ($res->julypaid != 0) {
        $tfee .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>July</p>
          
        </div>
        <div class='rft'>
          <p>$res->julypaid</p>
          

        </div>
    
      </div>";
    }
    if ($res->augustpaid != 0) {
        $tfee .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>August</p>
          
        </div>
        <div class='rft'>
          <p>$res->augustpaid</p>
          

        </div>
    
      </div>";
    }
    if ($res->septemberpaid != 0) {
        $tfee .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>September</p>
          
        </div>
        <div class='rft'>
          <p>$res->septemberpaid</p>
          

        </div>
    
      </div>";
    }
    if ($res->octoberpaid != 0) {
        $tfee .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>October</p>
          
        </div>
        <div class='rft'>
          <p>$res->octoberpaid</p>
          

        </div>
    
      </div>";
    }
    if ($res->novemberpaid != 0) {
        $tfee .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>November</p>
          
        </div>
        <div class='rft'>
          <p>$res->novemberpaid</p>
          

        </div>
    
      </div>";
    }
    if ($res->decemberpaid != 0) {
        $tfee .= "
     
        <div style='display:flex'>
        <div class='lft'>
          <p>December</p>
          
        </div>
        <div class='rft'>
          <p>$res->decemberpaid</p>
          

        </div>
    
      </div>";
    }
    


    $balance = array_sum($sum);
    
if ($balance != 0) {
    $foot .= "
    
 
    <th rowspan='4'>BALANCE</th>

    <td></td>
    <td></td>

    <th style='color: red;'><b>$balance </b></th>
    <td style='padding:10px 3px ;'></td>
  
    ";
} else {
    $foot .= "
    
   
    <th rowspan='4'>BALANCE</th>
    <!-- <td rowspan='3'>ITEM 2</td> -->
    <td></td>
    <td></td>

    <th style='color: red;'><b>$mbalance</b></th>
    <td style='padding:10px 3px ;'></td>

    ";
}

$mess .= "
<div class='wrapping'>
          <div class='reciept'>
            <div class='rchead'>
              <h6>MILIMANI PRIMARY SCHOOL FEES RECIEPT</h6>
              <h6>$res->name</h6>
              <h6>CLASS $res->class $res->stream &nbsp;&nbsp;&nbsp; $res->name</h6>
              <h6>$convertDate </h6>
             
            </div>

            <div class='rcpcont'>
            <div class='lftrcpcont'>
            $term2 
              $tterm
              
        <div style='display:flex' class='ttl'>
        <div class='lft'>
          <p>Total  Fees</p>
          
        </div>
        <div class='rft'>
          <p>   $mfees</p>
          
        </div>
    
      </div>
            </div>
              <div class='rghttrcpcont'>
                <div class='lftrcpcont2'>
                $kil
                $tfee
                <div style='display:flex' class='ttl'>
        <div class='lft'>
          <p>Total  Paid</p>
          
        </div>
        <div class='rft'>
          <p>   $mpaid</p>
          
        </div>
                </div>

              </div>

            </div>
            <div style='height:100px;width:100%;position:absolute;bottom:0;'>

            

              <div style='display:flex;margin-top:auto;height:100%;position:relative'>
               <div style='position:absolute;bottom:0;display:flex'>
               <b style='margin-left:20px'>         Paid  =  $ptd </b>
      <b style='margin-left:20px'>         Total Balance  =  $tobal </b>
      
                <p style='margin-left:20px'>Served By  ________________</p>
               </div>
              </div>
            </div>



          </div>



        </div>
";

$info->message = $mess;
$info->type = 'stmt';
echo json_encode($info);
} else {
   
$mess .= "<div style='width:100%;height:100%;display:flex;justify-content:center;align-items:center;'>
    
<p style='color:red'> No reciept found for  $year</p>
        </div>";

$info->message = $mess;
$info->type = 'stmt';
echo json_encode($info);
}






            //   $id = $DATA_OBJECT->id;
            //   $year=$DATA_OBJECT->year;

            //   $sql = false;
            //   $sql = "SELECT  * FROM pupils WHERE userid='$id' and year=$year";
            //   $res = $DB->read($sql, []);


            //   $term2 = "";
            //   $balance = "";
            //   $sum = array();

            //   if (is_array($res)) {
            //     // echo "<pre>";
            //     // print_r($res);
            //     $res=$res[0];

            //     $mbalance=($res->januarybalance)+($res->februarybalance)+($res->marchbalance)+($res->aprilbalance)+($res->maybalance)+($res->junebalance)+($res->julybalance)+($res->augustbalance)+($res->septemberbalance)+($res->octoberbalance)+($res->novemberbalance)+($res->decemberbalance)+($res->lastyearbalance);

                  

                  
            //     if ($res->lastyearbalance!=0) {
            //       $term2 .= "
            //       <tr >
            //             <th >Amount Due</th>
            //             <td>''</td>
            //             <td>''</td>
                        
            //             <td style='color: red'>$res->lastyearbalance</td>
                        
            //       </tr>
            //       ";
            //     }

            //       if ($res->januaryfees!=0) {
            //         $term2 .= "
            //         <tr >
            //               <th >January</th>
            //               <td>$res->januaryfees</td>
            //               <td>$res->januarypaid</td>
                          
            //               <td style='color: red'>$res->januarybalance</td>
                          
            //         </tr>
            //         ";
            //       }
                  
            //       if ($res->februaryfees!=0) {
            //         $term2 .= "
            //         <tr >
            //               <th >February</th>
            //               <td>$res->februaryfees</td>
            //               <td>$res->februarypaid</td>
                          
            //               <td style='color: red'>$res->februarybalance</td>
                          
            //         </tr>
            //         ";
            //       }
            //       if ($res->marchfees!=0) {
            //         $term2 .= "
            //         <tr >
            //               <th >March</th>
            //               <td>$res->marchfees</td>
            //               <td>$res->marchpaid</td>
                          
            //               <td style='color: red'>$res->marchbalance</td>
                          
            //         </tr>
            //         ";
            //       }
            //       if ($res->aprilfees!=0) {
            //         $term2 .= "
            //         <tr >
            //               <th >April</th>
            //               <td>$res->aprilfees</td>
            //               <td>$res->aprilpaid</td>
                          
            //               <td style='color: red'>$res->aprilbalance</td>
                          
            //         </tr>
            //         ";
            //       }
            //       if ($res->mayfees!=0) {
            //         $term2 .= "
            //         <tr >
            //               <th >May</th>
            //               <td>$res->mayfees</td>
            //               <td>$res->maypaid</td>
                          
            //               <td style='color: red'>$res->maybalance</td>
                          
            //         </tr>
            //         ";
            //       }
  
            //       if ($res->junefees!=0) {
            //         $term2 .= "
            //         <tr >
            //               <th >June</th>
            //               <td>$res->junefees</td>
            //               <td>$res->junepaid</td>
                          
            //               <td style='color: red'>$res->junebalance</td>
                          
            //         </tr>
            //         ";
            //       }
            //       if ($res->julyfees!=0) {
            //         $term2 .= "
            //         <tr >
            //               <th >July</th>
            //               <td>$res->julyfees</td>
            //               <td>$res->julypaid</td>
                          
            //               <td style='color: red'>$res->julybalance</td>
                          
            //         </tr>
            //         ";
            //       }
            //       if ($res->augustfees!=0) {
            //         $term2 .= "
            //         <tr >
            //               <th >August</th>
            //               <td>$res->augustfees</td>
            //               <td>$res->augustpaid</td>
                          
            //               <td style='color: red'>$res->augustbalance</td>
                          
            //         </tr>
            //         ";
            //       }
            //       if ($res->septemberfees!=0) {
            //         $term2 .= "
            //         <tr >
            //               <th >September</th>
            //               <td>$res->septemberfees</td>
            //               <td>$res->septemberpaid</td>
                          
            //               <td style='color: red'>$res->septemberbalance</td>
                          
            //         </tr>
            //         ";
            //       }
            //       if ($res->octoberfees!=0) {
            //         $term2 .= "
            //         <tr >
            //               <th >October</th>
            //               <td>$res->octoberfees</td>
            //               <td>$res->octoberpaid</td>
                          
            //               <td style='color: red'>$res->octoberbalance</td>
                          
            //         </tr>
            //         ";
            //       }
            //       if ($res->novemberfees!=0) {
            //         $term2 .= "
            //         <tr >
            //               <th >November</th>
            //               <td>$res->novemberfees</td>
            //               <td>$res->novemberpaid</td>
                          
            //               <td style='color: red'>$res->novemberbalance</td>
                          
            //         </tr>
            //         ";
            //       }

            //       if ($res->decemberfees!=0) {
            //         $term2 .= "
            //         <tr >
            //               <th >December</th>
            //               <td>$res->decemberfees</td>
            //               <td>$res->decemberpaid</td>
                          
            //               <td style='color: red'>$res->decemberbalance</td>
                          
            //         </tr>
            //         ";
            //       }

               
                
              


            //     $balance = array_sum($sum);
              

            //     $sql = false;
            //     $sql = "SELECT count(balance)
            //   FROM fees WHERE userid='$id'";
            //     $sum = $DB->read($sql, []);
            //     if (is_array($sum)) {

            //       $sum = $sum[0];
            //     }
            //   }else {
            //     $term2='no';
            //   }


            //   $info->message=$term2;
            //   $info->type='fullfees';
            // echo json_encode($info);

            
             
                //   if ($balance != 0) {
                //     echo "
                    
                //     <tr>
                //     <th rowspan='4'>BALANCE</th>
              
                //     <td></td>
                //     <td></td>

                //     <th style='color: red;'><b>$balance </b></th>
                //     <td style='padding:10px 3px ;'></td>
                //   </tr>
                //     ";
                //   }else{
                //     echo "
                    
                //     <tr>
                //     <th rowspan='4'>BALANCE</th>
                //     <!-- <td rowspan='3'>ITEM 2</td> -->
                //     <td></td>
                //     <td></td>

                //     <th style='color: red;'><b>$mbalance</b></th>
                //     <td style='padding:10px 3px ;'></td>
                //   </tr>
                //     ";

                //   }

                 

// $id=$DATA_OBJECT->id;
// $y=$DATA_OBJECT->year;
// $sql = false;
// $sql = "SELECT  * FROM fees WHERE userid='$id' and year=$y";
// $res = $DB->read($sql, []);





// $term2 = "";
// $balance = "";
// $mess="";
// $sum = array();

// if (is_array($res)) {
//     // echo "<pre>";
//     // print_r($res);



//     foreach ($res as $key) {

//         array_push($sum, $key->balance);

//         if ($key->lastyear!=0) {
//             array_push($sum, $key->lastyear);
//             $term2 .= "
//             <tr id='$key->userid'>
//                   <th id='$key->userid' >LastYear</th>
//                   <td id='$key->userid'></td>
//                   <td id='$key->userid'></td>
//                   <td style='color: red;'>$key->lastyear</td>
//                   <td style='padding:10px 3px ;'><img onclick='stmtmod(event)' id='$key->id' src='./images/delete.png' width='15px' height='15px' /></td>
//             </tr>
//             ";
            
//         }


//         if ($key->lastyear==0) {
//              $term2 .= "
//             <tr id='$key->userid'>
//                   <th id='$key->userid' >$key->month</th>
//                   <td id='$key->userid'>$key->fees</td>
//                   <td id='$key->userid'>$key->paid</td>
//                   <td style='color: red;'>$key->balance</td>
//                   <td style='padding:10px 3px ;'><img onclick='stmtmod(event)' id='$key->id' src='./images/delete.png' width='15px' height='15px' /></td>
//             </tr>
//             ";
//         }
       
//     }


//     $balance = array_sum($sum);

   
    
// $mess.="
// <table width='100%' class='content-table'>
//     <thead>
//         <tr>
//             <th>MONTH</th>
//             <th>FEES</th>
//             <th>PAID</th>
//             <th>BALANCE</th>
//             <th style='padding:10px 3px ;'>ACTIONS</th>
//         </tr>
//     </thead>
//     <tbody>


//         <tr>
//              $term2 

//         </tr>
      



// ";

// if ($balance > 0) {
// $mess.= "
    
//     <tr>
//     <th rowspan='4'>BALANCE</th>
//     <!-- <td rowspan='3'>ITEM 2</td> -->
//     <td></td>
//     <td></td>

//     <th style='color: red;'><b>
//                                  $balance </b></th>
//   </tr>
//     ";
// }

// $info->message=$mess;
// $info->type='fullfees';
// echo json_encode($info);

// }else{

//     $info->message="<div style='width:100%;height:100%;display:flex;justify-content:center;align-items:center;'>
    
//     <p style='color:red'>Fees for year $y haven't been set or paid</p>
//             </div>";
// $info->type='fullfees';
// echo json_encode($info);
// }
