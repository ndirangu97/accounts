
<?php

require_once "./connection.php";

$DB = new Database();
$class =  $_GET['class'];
$stream = $_GET['stream'];


$year = date('Y');

require_once "./dompdf/autoload.inc.php";

// $tdate=date('d-m-Y');

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();


if ($class == 'all' && $stream == 'all') {


    $sql = false;
    $sql = "SELECT * FROM pupils WHERE year=$year";
    $res = $DB->read($sql, []);

    $arraybal = array();
    $arrayfees = array();
    $arraypaid = array();
    if (is_array($res)) {

        foreach ($res as $key) {

            $topay = ($key->januaryfees) + ($key->februaryfees) + ($key->marchfees) + ($key->aprilfees) + ($key->mayfees) + ($key->junefees) + ($key->julyfees) + ($key->augustfees) + ($key->septemberfees) + ($key->octoberfees) + ($key->novemberfees) + ($key->decemberfees);

            array_push($arrayfees, $topay);

            $mbalance = ($key->januarybalance) + ($key->februarybalance) + ($key->marchbalance) + ($key->aprilbalance) + ($key->maybalance) + ($key->junebalance) + ($key->julybalance) + ($key->augustbalance) + ($key->septemberbalance) + ($key->octoberbalance) + ($key->novemberbalance) + ($key->decemberbalance) + ($key->lastyearbalance);
            array_push($arraybal, $mbalance);

            $paid = ($key->januarypaid) + ($key->februarypaid) + ($key->marchpaid) + ($key->aprilpaid) + ($key->maypaid) + ($key->junepaid) + ($key->julypaid) + ($key->augustpaid) + ($key->septemberpaid) + ($key->octoberpaid) + ($key->novemberpaid) + ($key->decemberpaid);
            array_push($arraypaid, $paid);
        }




        $af = array_sum($arrayfees);
        // echo ('...........................');
        $ap = array_sum($arraypaid);
        // echo ('...........................');
        $ab = array_sum($arraybal);



        $a = "



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
        <h3>MILIMANI ACCOUNT BALANCES FOR WHOLE SCHOOL</h3>
        <div style='display:flex;justify-content:center;align-items:center;padding-top:15px'>
          <h4>DATE :</h4> &nbsp; &nbsp;&nbsp;<h5>27TH JUne 2022</h5>
        </div>
        <hr class='w-100'>
        <div class='w-75 '>

          <table class='content-table'>
            <thead>
              <tr>
                <th scope='col'>Total Fees</th>
                <th scope='col'>Amount Paid</th>
                <th scope='col'>Total Balance</th>
              
              </tr>
            </thead>
            <tbody>
              
            <tr>
            <th scope='row'>$af</th>
            <td>$ap</td>
            <td>$ab</td>
            
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



        $dompdf->loadHtml($a);


        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("schoolbalances.pdf", array("Attachment" => false));


        //     $info->message = array_sum($arraybal);
        //     $info->message = array_sum($arrayfees);

        // $info->type = "pay";
        // echo json_encode($info);
    }else{
        
        $a = "



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
        <h3>MILIMANI ACCOUNT BALANCES FOR WHOLE SCHOOL</h3>
        <div style='display:flex;justify-content:center;align-items:center;padding-top:15px'>
          <h4>DATE :</h4> &nbsp; &nbsp;&nbsp;<h5>27TH JUne 2022</h5>
        </div>
        <hr class='w-100'>
        <div class='w-75 '>

          <table class='content-table'>
            <thead>
              <tr>
                <th scope='col'>Total Fees</th>
                <th scope='col'>Amount Paid</th>
                <th scope='col'>Total Balance</th>
              
              </tr>
            </thead>
            <tbody>
              
            <tr>
            <th scope='row'>0</th>
            <td>0</td>
            <td>0</td>
            
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



        $dompdf->loadHtml($a);


        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("schoolbalances.pdf", array("Attachment" => false));
    }
} elseif ($class != 'all' && $stream == 'all') {


    $sql = false;
    $sql = "SELECT * FROM pupils WHERE year=$year and class =$class";
    $res = $DB->read($sql, []);

    $arraybal = array();
    $arrayfees = array();
    $arraypaid = array();
    if (is_array($res)) {

      foreach ($res as $key) {

            $topay = ($key->januaryfees) + ($key->februaryfees) + ($key->marchfees) + ($key->aprilfees) + ($key->mayfees) + ($key->junefees) + ($key->julyfees) + ($key->augustfees) + ($key->septemberfees) + ($key->octoberfees) + ($key->novemberfees) + ($key->decemberfees);

            array_push($arrayfees, $topay);

            $mbalance = ($key->januarybalance) + ($key->februarybalance) + ($key->marchbalance) + ($key->aprilbalance) + ($key->maybalance) + ($key->junebalance) + ($key->julybalance) + ($key->augustbalance) + ($key->septemberbalance) + ($key->octoberbalance) + ($key->novemberbalance) + ($key->decemberbalance) + ($key->lastyearbalance);
            array_push($arraybal, $mbalance);

            $paid = ($key->januarypaid) + ($key->februarypaid) + ($key->marchpaid) + ($key->aprilpaid) + ($key->maypaid) + ($key->junepaid) + ($key->julypaid) + ($key->augustpaid) + ($key->septemberpaid) + ($key->octoberpaid) + ($key->novemberpaid) + ($key->decemberpaid);
            array_push($arraypaid, $paid);
        }



        $af = array_sum($arrayfees);
        // echo ('...........................');
        $ap = array_sum($arraypaid);
        // echo ('...........................');
        $ab = array_sum($arraybal);



        $a = "



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
        <h3>MILIMANI ACCOUNT BALANCES FOR CLASS $class</h3>
        <div style='display:flex;justify-content:center;align-items:center;padding-top:15px'>
          <h4>DATE :</h4> &nbsp; &nbsp;&nbsp;<h5>27TH JUne 2022</h5>
        </div>
        <hr class='w-100'>
        <div class='w-75 '>

          <table class='content-table'>
            <thead>
              <tr>
                <th scope='col'>Total Fees</th>
                <th scope='col'>Amount Paid</th>
                <th scope='col'>Total Balance</th>
              
              </tr>
            </thead>
            <tbody>
              
            <tr>
            <th scope='row'>$af</th>
            <td>$ap</td>
            <td>$ab</td>
            
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



        $dompdf->loadHtml($a);


        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("class"."$class"."balances.pdf", array("Attachment" => false));


        //     $info->message = array_sum($arraybal);
        //     $info->message = array_sum($arrayfees);

        // $info->type = "pay";
        // echo json_encode($info);
    }else{
        
        $a = "



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
        <h3>MILIMANI ACCOUNT BALANCES FOR CLASS $class</h3>
        <div style='display:flex;justify-content:center;align-items:center;padding-top:15px'>
          <h4>DATE :</h4> &nbsp; &nbsp;&nbsp;<h5>27TH JUne 2022</h5>
        </div>
        <hr class='w-100'>
        <div class='w-75 '>

          <table class='content-table'>
            <thead>
              <tr>
                <th scope='col'>Total Fees</th>
                <th scope='col'>Amount Paid</th>
                <th scope='col'>Total Balance</th>
              
              </tr>
            </thead>
            <tbody>
              
            <tr>
            <th scope='row'>0</th>
            <td>0</td>
            <td>0</td>
            
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



        $dompdf->loadHtml($a);


        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("class"."$class"."balances.pdf", array("Attachment" => false));
    }
} else {



    $sql = false;
    $sql = "SELECT * FROM pupils WHERE year=$year and class =$class and stream='$stream'";
    $res = $DB->read($sql, []);

    $arraybal = array();
    $arrayfees = array();
    $arraypaid = array();
    if (is_array($res)) {

        foreach ($res as $key) {

            $topay = ($key->januaryfees) + ($key->februaryfees) + ($key->marchfees) + ($key->aprilfees) + ($key->mayfees) + ($key->junefees) + ($key->julyfees) + ($key->augustfees) + ($key->septemberfees) + ($key->octoberfees) + ($key->novemberfees) + ($key->decemberfees);

            array_push($arrayfees, $topay);

            $mbalance = ($key->januarybalance) + ($key->februarybalance) + ($key->marchbalance) + ($key->aprilbalance) + ($key->maybalance) + ($key->junebalance) + ($key->julybalance) + ($key->augustbalance) + ($key->septemberbalance) + ($key->octoberbalance) + ($key->novemberbalance) + ($key->decemberbalance) + ($key->lastyearbalance);
            array_push($arraybal, $mbalance);

            $paid = ($key->januarypaid) + ($key->februarypaid) + ($key->marchpaid) + ($key->aprilpaid) + ($key->maypaid) + ($key->junepaid) + ($key->julypaid) + ($key->augustpaid) + ($key->septemberpaid) + ($key->octoberpaid) + ($key->novemberpaid) + ($key->decemberpaid);
            array_push($arraypaid, $paid);
        }




        $af = array_sum($arrayfees);
        // echo ('...........................');
        $ap = array_sum($arraypaid);
        // echo ('...........................');
        $ab = array_sum($arraybal);



        $a = "



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
        <h3>MILIMANI ACCOUNT BALANCES FOR CLASS $class STREAM $stream</h3>
        <div style='display:flex;justify-content:center;align-items:center;padding-top:15px'>
          <h4>DATE :</h4> &nbsp; &nbsp;&nbsp;<h5>27TH JUne 2022</h5>
        </div>
        <hr class='w-100'>
        <div class='w-75 '>

          <table class='content-table'>
            <thead>
              <tr>
                <th scope='col'>Total Fees</th>
                <th scope='col'>Amount Paid</th>
                <th scope='col'>Total Balance</th>
              
              </tr>
            </thead>
            <tbody>
              
            <tr>
            <th scope='row'>$af</th>
            <td>$ap</td>
            <td>$ab</td>
            
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



        $dompdf->loadHtml($a);


        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("class"."$class"."$stream"."balances.pdf", array("Attachment" => false));



        //     $info->message = array_sum($arraybal);
        //     $info->message = array_sum($arrayfees);

        // $info->type = "pay";
        // echo json_encode($info);
    }
    else{
        
        $a = "



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
        <h3>MILIMANI ACCOUNT BALANCES FOR CLASS $class STREAM $stream</h3>
        <div style='display:flex;justify-content:center;align-items:center;padding-top:15px'>
          <h4>DATE :</h4> &nbsp; &nbsp;&nbsp;<h5>27TH JUne 2022</h5>
        </div>
        <hr class='w-100'>
        <div class='w-75 '>

          <table class='content-table'>
            <thead>
              <tr>
                <th scope='col'>Total Fees</th>
                <th scope='col'>Amount Paid</th>
                <th scope='col'>Total Balance</th>
              
              </tr>
            </thead>
            <tbody>
              
            <tr>
            <th scope='row'>0</th>
            <td>0</td>
            <td>0</td>
            
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



        $dompdf->loadHtml($a);


        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("class"."$class"."$stream"."balances.pdf", array("Attachment" => false));
    }
}
