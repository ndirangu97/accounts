<?php

require_once "./connection.php";

$DB = new Database();
$userid=$_GET['id'];
$year2=date('Y');

    $sql = false;
      $sql = "SELECT  * FROM pupils WHERE userid='$userid' and year=$year2  LIMIT 1";
      $rese = $DB->read($sql, []);


      if (is_array($rese)) {
     
        $rese=$rese[0];
        $name=$rese->name;
        $class=$rese->class;
      }
   
      

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Milimani</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/typicons/typicons.css" />
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <script src="./js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<!-- endinject -->
<!-- plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="css/vertical-layout-light/style.css" />
<!-- endinject -->
<link rel="shortcut icon" href="images/favicon.png" />
<link rel="stylesheet" href="./addPupil.css" />

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

  .content-table {
    border-collapse: collapse;
    margin: 0;
    font-size: 0.9em;
    height: 80%;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    font-size: 16px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    min-height: 400px;
  }

  .content-table thead tr {
    background: #009879;
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
    border-bottom: 1px solid #dddddd;
    cursor: pointer;
  }


  .content-table tbody tr:nth-last-of-type(even) {
    background: #b1afaf;
  }

  .content-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
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

  ::-webkit-scrollbar-track {
    background: inherit;
    width: 5px;
    height: 10px;
  }
</style>
</head>

<body>
  <div class="container-scroller" style="height: 100vh">
    <!-- partial:partials/_navbar.html -->
    <?php include './header.view.php'; ?>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
    <?php include './nav.view.php'; ?>
      <!-- partial -->
      <div class="bodyWrapper" style="height:100%">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transfer To</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="d-flex justify-content-center align-content-center">
                  <div>
                    <label for="class">Class: </label>

                    <select name="class" id="class" style="width: 60px;border: 1px solid #7c7cff ;">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                    </select>
                  </div>
                  <div style="margin-left: 20px;">
                    <label for="stream">Stream: </label>

                    <select name="stream" id="stream" style="width: 60px;border: 1px solid #7c7cff ;">
                      <option value="C">C</option>
                      <option value="T">T</option>
                      <option value="B">B</option>
                      <option value="P">P</option>
                      <option value="R">R</option>
                      <option value="L">L</option>
                      <option value="E">E</option>

                    </select>
                  </div>

                </div>
                <div id="mer" style="display:flex;align-items:center;justify-content:center"></div>
              </div>
              <div class="modal-footer d-flex align-content-center justify-content-center">

                <button type="button" class="btn btn-primary" onclick="trans()">Transfer</button>
              </div>
            </div>
          </div>
        </div>
        <div id="error" style="height: 20px;width:100%;display:none;justify-content:center;align-items:center;color:red"></div>
        <div style="height: 40px;width:100%;display:flex;justify-content:center;align-items:center;margin-bottom:10px;position:relative">
          <div id='feecal' style="display:flex;margin-right:40px;align-items:center">
            <img src="./images/calendar.png" height="20px" width="20px">
            <input style="border:1px solid #009879;border-radius:4px;height:30px;width:100px;margin-left:10px" oninput="yearfees(event)" type="number" max="2100" min="2019" value="2022">
          </div>

          <div onclick="fee()" style="padding: 5px 20px;border:1px solid #009879;border-radius:8px;cursor:pointer">
            Fees
          </div>
          <div onclick="stmt()" style="padding: 5px 10px;border:1px solid #009879;border-radius:8px;margin-left:40px;cursor:pointer">
            Statement
          </div>
          <div id="stbtn" style="margin-left: 20px;display:none">
            <img src="./images/calendar.png" height="20px" width="20px">
            <input oninput="sendData({id:ownid,year:this.value},'stmt')" id="sy" type="number" min='2019' max="2100" value="2022" style="border: 1px solid #009879;border-radius:4px;height:30px;padding-left:10px" />
          </div>
          <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="padding: 5px 10px;border:1px solid #009879;border-radius:8px;margin-left:40px;cursor:pointer">
            Transfer
          </div>



        </div>


        <div style="display: flex;height: 580px;position:relative;flex-direction:column;" id="cardHolder">

          <div style="display: flex;flex-basis:100%;overflow-y:scroll">
            <div style="flex-basis:65%;height:570px;overflow-y:scroll" id="tb">
              <?php
              $id = $_GET['id'];
              $year=date('Y');

              $sql = false;
              $sql = "SELECT  * FROM pupils WHERE userid='$id' and year=$year";
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

              ?>
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


                  <tr >
                    <?php echo $term2 ?> 

                  </tr>
                  <?php
                  if ($balance != 0) {
                    echo "
                    
                    <tr>
                    <th rowspan='4'>BALANCE</th>
              
                    <td></td>
                    <td></td>

                    <th style='color: red;'><b>$balance </b></th>
                    <td style='padding:10px 3px ;'></td>
                  </tr>
                    ";
                  }else{
                    echo "
                    
                    <tr>
                    <th rowspan='4'>BALANCE</th>
                    <!-- <td rowspan='3'>ITEM 2</td> -->
                    <td></td>
                    <td></td>

                    <th style='color: red;'><b>$mbalance</b></th>
                    <td style='padding:10px 3px ;'></td>
                  </tr>
                    ";

                  }

                  ?>









                </tbody>
              </table>

            </div>
            <div style="flex-basis: 32%">
              <div style="display: flex;flex-direction:column;width: 100%;height:500px;border:1px solid #009879;border-radius:8px;margin-left:20px">
                <div style="display: flex;justify-content:center;flex-basis:10%;margin-top:10px;align-items:center">

                  <div onclick="paybtn()" style="padding: 2px 20px;border:1px solid #009879;border-radius:8px;cursor:pointer;background:#7ed2f3">Pay Fees</div>
                  <div onclick="addbtn()" style="padding: 2px 20px;border:1px solid #009879;border-radius:8px;margin-left:20px;cursor:pointer;background:#ff2d2d">Add Fees</div>

                </div>
                <div id="pdv" style="display: none;flex-basis:90%;flex-direction:column;align-items:center;margin-top:10px;">
                
                  <div style="display: flex;width:100%;justify-content:center;align-items:center;margin-top:20px">
                    <div><label for="class">Term: </label></div>
                    <div style="margin-left: 16px;">

                      <select name="class" id="tm" style="width: 240px; border: 1px solid #7c7cff;height:35px;border-radius:4px">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>

                      </select>
                    </div>
                  </div>

                  <div style="display: flex;width:100%;justify-content:center;align-items:center;margin-top:20px">
                    <div><label for="month">Month: </label></div>

                    <div style="margin-left: 16px;">
                      <select name="month" id="clm" style="width: 240px; border: 1px solid #7c7cff;height:35px;border-radius:4px">
                        <option value="january">January</option>
                        <option value="february">February</option>
                        <option value="march">March</option>
                        <option value="april">April</option>
                        <option value="may">May</option>
                        <option value="june">June</option>
                        <option value="july">July</option>
                        <option value="august">August</option>
                        <option value="september">September</option>
                        <option value="october">October</option>
                        <option value="november">November</option>
                        <option value="december">December</option>
                      </select>
                    </div>
                  </div>
                  <div style="display:flex;width:100%;justify-content:center;align-items:center;margin-top:20px">
                    <div><label for="class">Year: </label></div>
                    <span id="cErr"></span>
                    <div style="margin-left: 30px;">
                      <input style="width: 240px; border: 1px solid #7c7cff;height:35px;border-radius:4px;padding:10px" min="2019" value="2022" type="number" max="2100" name="" id="y">
                    </div>
                  </div>
                  <div style="display:flex;width:100%;justify-content:center;align-items:center;margin-top:10px">
                    <div><label for="class">Rcpt/no </label></div>
                    <span id="cErr"></span> 
                    <div style="margin-left: 30px;">
                      <input style="width: 240px; border: 1px solid #7c7cff;height:35px;border-radius:4px;padding:10px;margin-left:-15px"  type="text"  name="" id="rcptno">
                    </div>
                  </div>
                  
                
                  <div style="display:flex;width:100%;justify-content:center;align-items:center;margin-top:20px">

                    <div>Fees:</div>
                    <div style="margin-left: 30px;"> <input style="width: 240px; border: 1px solid #7c7cff;height:35px;border-radius:4px;padding:10px" type="text" id="cl3">
                      <div id="fr" style="color:red"></div>


                    </div>

                  </div>
                  <button id="paybtn" style="margin-top: 30px;padding:4px 60px;border:1px solid #009879;border-radius:8px;background:#7ed2f3" onclick="payFees()">Pay </button>
                  

                </div>
                <div id="bdv" style="display: flex;flex-basis:90%;flex-direction:column;align-items:center;margin-top:10px;">
                <div style="display:flex;width:100%;justify-content:center;align-items:center;margin-top:10px;flex-direction:column">
                <div style="display:flex;width:100%;justify-content:center;align-items:center;margin-top:10px">
                    <div style="color:red"><label for="class">Balance </label></div>
                    <span id="cErr"></span>
                    <div style="margin-left: 25px;">
                      <input style="width: 240px; border: 1px solid red;height:35px;border-radius:4px;padding:10px;margin-left:-10px"  type="number" name="" id="bal">
                    </div>
                  </div>
                <button id="addbtn" style="margin-top: 30px;padding:4px 60px;border:1px solid #009879;border-radius:8px;background:#ff2d2d;display:block" onclick="addFees()">Set Balance </button>
              </div>
            </div>

              </div>
              <div>

              </div>

            </div>






          </div>
          <div style="position: absolute;right:50px;top:20px"> <img id="gif" src="./images/loader.gif" style="height: 50px;width: 50px;margin-left: 10px;display: none;"></div>

        </div>

        <div style="display: none;height: 540px;position:relative;flex-direction:column;overflow:auto;width:100%;" id="stmtHolder">
          <div style="width: 100%;height:540px;overflow-y:scroll">
            <table width='100%' class='content-table'>
              <thead>
                <tr>
                  <th>MONTH</th>
                  <th>TERM</th>
                  <th>FEES</th>
                  <th>PAID</th>
                  <th>Trm.BALANCE</th>

                  <th>Ttl.BALANCE</th>
                  <th>DATE</th>
                  <th>TIME</th>
                  <th>CLERK</th>
                  
                  <th>YEAR</th>
                  <th style='padding:10px 3px ;'>ACTIONS</th>


                </tr>
              </thead>
              <tbody id="stmtable">


              </tbody>
            </table>


          </div>
        <input style="display: none;" type="text" name="" value="<?php echo($userid);?>" id="inputid">
        </div>
      </div>
      

      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
<script>


  const myform = new FormData();
  const href = window.location.href;
  // console.log(href);
  const param = new URLSearchParams(href);
  const url = param.toString();
  // console.log(param.toString());
  var pb=document.getElementById('paybtn')

  var inp=document.getElementById('inputid').value

  const p = url.replace("http%3A%2F%2Flocalhost%2Faccounts%2Fmorepupil.php%3Fid=", "");

  localStorage.setItem("id", inp);
  const ownid = localStorage.getItem("id");


  const sendData = (data, type) => {
    let b = document.getElementById('gif')
    b.style.display = 'block'

    
 

    var xml = new XMLHttpRequest();

    xml.onload = function() {
      if (xml.readyState == 4 || xml.status == 200) {
        handleResult(xml.responseText);
        let b = document.getElementById('gif')
        b.style.display = 'none'
        // var pb=document.getElementById('paybtn')
        // pb.disabled='false'
        // let m = document.getElementById('exampleModal')
        // m.style.display = 'none'
        
   


      }
    };

    data.type = type;
    var dataString = JSON.stringify(data);
    xml.open("POST", "./routes.php", true);
    xml.send(dataString);
  };
  const handleResult = (results) => {
    alert(results)
    var info = JSON.parse(results);

    switch (info.type) {

      case 'pay':
        alert(info.message)

        location.reload();


        break;
      case 'delfees':
        alert(info.message)

        location.reload();


        break;
        case 'delstmt':
        alert(info.message)

        stmt()


        break;
      case 'err':
        let erd = document.getElementById('error')
        erd.style.display = 'flex'
        erd.innerHTML = info.message
        break;
      case 'stmt':
        let stt = document.getElementById('stmtable')
        stt.innerHTML = info.message
        break;
      case 'transfer':
        let me = document.getElementById('mer')
        me.innerHTML = info.message
        break;
      case 'fullfees':
        let t = document.getElementById('tb')
        t.innerHTML = info.message
        break;

      default:
        break;
    }
  };

  function payFees() {


    let y = document.getElementById('y');
    let f = document.getElementById('cl3');
    let m = document.getElementById('clm');
    let tm = document.getElementById('tm');
    let rno = document.getElementById('rcptno').value;

    

    let yv = y.value
  
    let mv = m.value
    let clv3 = f.value
    let tmy = tm.value

    if (clv3 == "") {
      let fre = document.getElementById('fr');
      fre.innerHTML = "Fees can't be empty"


    } else {
      let c = window.confirm(`Do you want to pay sh ${clv3} for Term ${tmy} Year ${yv} `);
      if (c) {
        sendData({

          term: tmy,
          year: yv,
          month: mv,
          fees: clv3,
          id: ownid,
          no:rno,
         
       
        }, 'payFees')

       
    // pb.disabled='true'

      }
    }





  }

  function paybtn() {
    let pb = document.getElementById('pdv')
    let ab = document.getElementById('bdv')

    pb.style.display = 'flex'
    ab.style.display = 'none'

  }

  function addbtn() {
    let pb = document.getElementById('pdv')
    let ab = document.getElementById('bdv')

    pb.style.display = 'none'
    ab.style.display = 'flex'

  }

  function addFees() {


    
    let cb = document.getElementById('bal').value;
   
    if (cb == "") {
 alert('Balance cant be empty')


    } else {
      let c = window.confirm(`Do you want to add balance ${cb} `);
      if (c) {
        sendData({

          balance:cb,
          id:ownid
        }, 'addFees')

      }
    }
  }

  function fee() {

    let c = document.getElementById('cardHolder')
    let t = document.getElementById('stmtHolder')
    let sb = document.getElementById('stbtn')
    let fc = document.getElementById('feecal')
    sb.style.display = 'none'

    c.style.display = 'flex'
    t.style.display = 'none'
    fc.style.display = 'flex'

  }

  function stmt() {

    let c = document.getElementById('cardHolder')
    let t = document.getElementById('stmtHolder')
    let yi = document.getElementById('sy')
    let sb = document.getElementById('stbtn')
    let fc = document.getElementById('feecal')

    c.style.display = 'none'
    sb.style.display = 'block'
    t.style.display = 'flex'
    fc.style.display = 'none'

    sendData({
      id: ownid,
      year: yi.value
    }, 'stmt');

  }

  function trans() {
    let cl = document.getElementById('class')
    let l = document.getElementById('stream')

    sendData({
      class: cl.value,
      stream: l.value,
      id: ownid
    }, 'trans')
  }

  function yearfees(e) {

    let v = e.target.value

    if (v == null) {
      alert('Year not set')
    } else {
      sendData({
        year: v,
        id: ownid
      }, 'getfullfees')
    }

  }

  function feemod(e) {

    let i = e.target.id
    sendData({
        id: i
      },
      'delfee')
  }

  function stmtmod(e) {

    let i = e.target.id
    sendData({
        id: i
      },
      'delstmt')
  }
</script>