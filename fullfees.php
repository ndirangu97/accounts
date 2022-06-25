<?php


// print_r();
// die;
$foot="";

$id = $DATA_OBJECT->id;
$year=$DATA_OBJECT->year;

$sql = false;
$sql = "SELECT  * FROM pupils WHERE userid='$id' and year=$year LIMIT 1";
$res = $DB->read($sql, []);


$term2 = "";
$balance = "";
$sum = array();

if (is_array($res)) {
  // echo "<pre>";
  // print_r($res);
  $res=$res[0];

  $mbalance=($res->januarybalance)+($res->februarybalance)+($res->marchbalance)+($res->aprilbalance)+($res->maybalance)+($res->junebalance)+($res->julybalance)+($res->augustbalance)+($res->septemberbalance)+($res->octoberbalance)+($res->novemberbalance)+($res->decemberbalance)+($res->lastyearbalance);

    

    
  if ($res->lastyearbalance!=0) {
    $term2 .= "
    <tr >
          <th >Amount Due</th>
          <td>''</td>
          <td>''</td>
          
          <td style='color: red'>$res->lastyearbalance</td>
          
    </tr>
    ";
  }

    if ($res->januaryfees!=0) {
      $term2 .= "
      <tr >
            <th >January</th>
            <td>$res->januaryfees</td>
            <td>$res->januarypaid</td>
            
            <td style='color: red'>$res->januarybalance</td>
            
      </tr>
      ";
    }
    
    if ($res->februaryfees!=0) {
      $term2 .= "
      <tr >
            <th >February</th>
            <td>$res->februaryfees</td>
            <td>$res->februarypaid</td>
            
            <td style='color: red'>$res->februarybalance</td>
            
      </tr>
      ";
    }
    if ($res->marchfees!=0) {
      $term2 .= "
      <tr >
            <th >March</th>
            <td>$res->marchfees</td>
            <td>$res->marchpaid</td>
            
            <td style='color: red'>$res->marchbalance</td>
            
      </tr>
      ";
    }
    if ($res->aprilfees!=0) {
      $term2 .= "
      <tr >
            <th >April</th>
            <td>$res->aprilfees</td>
            <td>$res->aprilpaid</td>
            
            <td style='color: red'>$res->aprilbalance</td>
            
      </tr>
      ";
    }
    if ($res->mayfees!=0) {
      $term2 .= "
      <tr >
            <th >May</th>
            <td>$res->mayfees</td>
            <td>$res->maypaid</td>
            
            <td style='color: red'>$res->maybalance</td>
            
      </tr>
      ";
    }

    if ($res->junefees!=0) {
      $term2 .= "
      <tr >
            <th >June</th>
            <td>$res->junefees</td>
            <td>$res->junepaid</td>
            
            <td style='color: red'>$res->junebalance</td>
            
      </tr>
      ";
    }
    if ($res->julyfees!=0) {
      $term2 .= "
      <tr >
            <th >July</th>
            <td>$res->julyfees</td>
            <td>$res->julypaid</td>
            
            <td style='color: red'>$res->julybalance</td>
            
      </tr>
      ";
    }
    if ($res->augustfees!=0) {
      $term2 .= "
      <tr >
            <th >August</th>
            <td>$res->augustfees</td>
            <td>$res->augustpaid</td>
            
            <td style='color: red'>$res->augustbalance</td>
            
      </tr>
      ";
    }
    if ($res->septemberfees!=0) {
      $term2 .= "
      <tr >
            <th >September</th>
            <td>$res->septemberfees</td>
            <td>$res->septemberpaid</td>
            
            <td style='color: red'>$res->septemberbalance</td>
            
      </tr>
      ";
    }
    if ($res->octoberfees!=0) {
      $term2 .= "
      <tr >
            <th >October</th>
            <td>$res->octoberfees</td>
            <td>$res->octoberpaid</td>
            
            <td style='color: red'>$res->octoberbalance</td>
            
      </tr>
      ";
    }
    if ($res->novemberfees!=0) {
      $term2 .= "
      <tr >
            <th >November</th>
            <td>$res->novemberfees</td>
            <td>$res->novemberpaid</td>
            
            <td style='color: red'>$res->novemberbalance</td>
            
      </tr>
      ";
    }

    if ($res->decemberfees!=0) {
      $term2 .= "
      <tr >
            <th >December</th>
            <td>$res->decemberfees</td>
            <td>$res->decemberpaid</td>
            
            <td style='color: red'>$res->decemberbalance</td>
            
      </tr>
      ";
    }

 
  



  $balance = array_sum($sum);


  $sql = false;
  $sql = "SELECT count(balance)
FROM fees WHERE userid='$id'";
  $sum = $DB->read($sql, []);
  if (is_array($sum)) {

    $sum = $sum[0];
  }
}else {
  $term2.="
  <tr >
            <th >No</th>
            <td>Student</td>
            <td>Details</td>
            
            <td style='color: red'></td>
            
      </tr>";
}


if ($balance != 0) {
    $foot.="
    
 
    <th rowspan='4'>BALANCE</th>

    <td></td>
    <td></td>

    <th style='color: red;'><b>$balance </b></th>
    <td style='padding:10px 3px ;'></td>
  
    ";
  }else{
    $foot.="
    
   
    <th rowspan='4'>BALANCE</th>
    <!-- <td rowspan='3'>ITEM 2</td> -->
    <td></td>
    <td></td>

    <th style='color: red;'><b>$mbalance</b></th>
    <td style='padding:10px 3px ;'></td>

    ";

  }

$mess.="

<table width='100%' class='content-table'>
<thead>
  <tr>
    <th>MONTH</th>
    <th>FEES</th>
    <th>PAID</th>
    <th>BALANCE</th>
   
  </tr>
</thead>
<tbody>


  <tr id='trfee'>
      $term2 

  </tr>
  
  


  <tr>
    $foot
</tr>








</tbody>
</table>
";

$info->message=$mess;
$info->type='fullfees';
echo json_encode($info);




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


?>





