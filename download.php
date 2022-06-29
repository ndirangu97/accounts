<?php

require_once "./connection.php";

$DB = new Database();


$sql = false;
$dt = date('Y-m-d');
$sql = "SELECT * FROM activity WHERE date='$dt'";
$res = $DB->read($sql, []);
$row="";
$tbal=array();


if (is_array($res)) {
  

 $no=0;

  foreach ($res as $key) {
    $no++;
    array_push($tbal,$key->amount);
    $row.="
    <tr>
  <th scope='row'>$no</th>
  <td>$key->name</td>
  <td>$key->amount</td>
  <td>$key->balance</td>
  <td>$key->clerk</td>
  <td>$key->time </td>
</tr>
    ";
  }
}else{
  $row.="
  <tr>
<th scope='row'>No</th>
<td>Activity</td>
<td>For</td>
<td>Today</td>
<td></td>
<td> </td>
</tr>
  ";

}

$balgot=array_sum($tbal);
$a="



<!DOCTYPE html>
<html lang='en'>

<head>
  <!-- Required meta tags -->
  <meta charset='utf-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />
  <title>Milimani</title>
  <!-- base:css -->
  <link rel='stylesheet' href='vendors/typicons/typicons.css' />
  <link rel='stylesheet' href='./css/bootstrap.min.css'>
  <script src='./js/bootstrap.min.js'></script>
  <link rel='stylesheet' href='vendors/css/vendor.bundle.base.css' />
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel='stylesheet' href='css/vertical-layout-light/style.css' />
  <!-- endinject -->
  <link rel='shortcut icon' href='images/favicon.png' />

  <style>
    .bodyWrapper {
      padding: 0 10px;
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      height: 600px;
      width: 100%;
      overflow-y: hidden;
    }
    
  ::-webkit-scrollbar {
    width: 7px;
    height: 10px;
    background: inherit;
  }

  ::-webkit-scrollbar-thumb {
    height: 10px;
    width: 7px;
    background: grey;
    border-radius: 4px;
  }
  .content-table {
    border-collapse: collapse;
    margin: 0;
    font-size: 0.9em;
    width: 100%;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    font-size: 16px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    min-height: 400px;
  }

  .content-table thead tr {
    background: #b1afaf;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
  }

  .content-table th,
  .content-table td {
    padding: 10px 15px;
    text-align: center;
  }

  .content-table tbody tr {
    border-bottom: 1px solid #f5f5f5  ;
    cursor: pointer;
  }


  .content-table tbody tr:nth-last-of-type(even) {
    background: #f5f5f5;
  }

  .content-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
  }

  ::-webkit-scrollbar-track {
    background: inherit;
    width: 5px;
    height: 10px;
  }
  </style>
</head>

<body>

  <div class='container-scroller' style='height: 100vh'>
    <!-- partial:partials/_navbar.html -->

    <!-- partial -->

    <div class='container-fluid page-body-wrapper'>

      <!-- partial -->
      <div  style='height:100vh;width:100%;overflow:auto;display:flex;flex-direction:column;align-items:center;padding-top:30px;'>
        <h3>MILIMANI ACCOUNT ACTIVITY</h3>
        <div style='display:flex;justify-content:center;align-items:center;padding-top:15px'>
          <h4>DATE :</h4> &nbsp; &nbsp;&nbsp;<h5>27TH JUne 2022</h5>
        </div>
        <hr class='w-100'>
        <div class='w-75 '>

          <table class='content-table'>
            <thead>
              <tr>
                <th scope='col'>#</th>
                <th scope='col'>Pupil</th>
                <th scope='col'>Fees</th>
                <th scope='col'>Balance</th>
                <th scope='col'>Clerk</th>
                <th scope='col'>Time</th>
              </tr>
            </thead>
            <tbody>
              
            $row
            <tr>
            <th scope='row'>Total</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>$balgot </td>
            </tr>

            </tbody>
          </table>
        </div>
      </div>

    </div>

    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src='vendors/js/vendor.bundle.base.js'></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src='vendors/chart.js/Chart.min.js'></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src='js/off-canvas.js'></script>
  <script src='js/hoverable-collapse.js'></script>
  <script src='js/template.js'></script>
  <script src='js/settings.js'></script>
  <script src='js/todolist.js'></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src='js/dashboard.js'></script>
  <!-- End custom js for this page-->
</body>

</html>
";

$date=date('Y-m-d');
$convertDate = date('F jS, Y ', strtotime($date));

require_once "./dompdf/autoload.inc.php";

// $tdate=date('d-m-Y');

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($a);


// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();


// Output the generated PDF to Browser
$dompdf->stream("$convertDate--activity.pdf", array("Attachment" => false));