<?php

require_once "./connection.php";

$DB = new Database();






//       $date = '2022-06-26 ';
// $convertDate = date('F jS, Y ', strtotime($date));
// echo $convertDate;


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
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css" />
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css" />
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <style>
    .bodyWrapper {
      padding: 0 10px;
      display: flex;
      flex-direction: column;

      height: 540px;
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

    .wrapping {
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
    }

    .reciept {
      min-height: 400px;
      width: 600px;
      border: 1px solid black;
      display: flex;
      flex-direction: column;
      position: relative;
      align-items: center;


    }

    .rchead {
      padding: 6px 0;
      text-align: center;
      height: 100px;
      width: 100%;
      border-bottom: 1px solid black;

    }

    .rcpcont {
      display: flex;
      width: 100%;

      margin-bottom: 60px;



    }

    .lftrcpcont {
      flex-basis: 49%;
      min-height: 300px !important;

      margin-left: 20px;
      display: flex;
      flex-direction: column;
      border-right: 1px solid black;
      position: relative;
    }

    .ttl {
      margin-top: auto;
      display: flex;
      border-top: 1px solid black;
    }

    .lftrcpcont2 {
      flex-basis: 49%;
      min-height: 300px !important;

      margin-left: 20px;
      display: flex;
      flex-direction: column;

      position: relative;


    }

    .lft {
      flex-basis: 50%;

    }



    .rft {
      flex-basis: 50%;

    }


    .rghttrcpcont {
      flex-basis: 49%;
      height: 100%;

    }

    .content-table2 {
      width: 100%;
      height: 460px;
      border-bottom: 1px solid black;

    }

    .content-table2 tr {
      text-align: left;

    }

    .content-table2 td {
      padding: 2px 15px;
      text-align: left;
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

    .content-table2 {
      width: 100%;
      height: 460px;
      border-bottom: 1px solid black;

    }

    .content-table2 tr {
      text-align: left;

    }

    .content-table2 td {

      text-align: left;
    }
  </style>
</head>

<body>
  <div class="container-scroller" style="height: 100vh">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="height: 78px">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="
              navbar-brand-inner-wrapper
              d-flex
              justify-content-between
              align-items-center
              w-100
            ">
          <a class="navbar-brand brand-logo" href="index.php"><img src="./images/milimani.jpg" alt="logo" style="object-fit: cover; width: 50px; height: 50px" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo" /></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </div>
      <div class="
            navbar-menu-wrapper
            d-flex
            align-items-center
            justify-content-end
          ">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face5.jpg" alt="profile" />
              <span class="nav-profile-name">Truphena</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="typcn typcn-cog-outline text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" onclick="location='login.php'">
                <i class="typcn typcn-eject text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item nav-profile dropdown">
            <div class="input-group">
              <div style="display: flex;justify-content:center;align-items:center;margin-right:10px">
                Category
              </div>
              <div>

                <span id="cErr"></span>
                <select onchange="typch(this.value)" name="class" id="cat" style="width: 100px;border: 1px solid #7c7cff ;border-radius: 4px;height:44px;margin-right:20px">
                  <option value="">---Category----</option>
                  <?php

                  $sql = false;
                  $sql = "SELECT  * FROM categories WHERE name != 'PUPILS'";
                  $rese = $DB->read($sql, []);
                  if (is_array($rese)) {
                    foreach ($rese as $res) {
                      $val = strtolower($res->name);
                      echo " 
                             
    <option value='$val'>$res->name</option>
    

";
                    }
                  }

                  ?>
                </select>
              </div>

              <div>

                <span id="cErr"></span>
                <select onchange="clchang(this.value)" name="class" id="class" style="width: 60px;border: 1px solid #7c7cff ;border-radius: 4px;height:44px">
                  <option value="All">All</option>
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
              <div>

                <span id="sErr"></span>
                <select onchange="strmchang(this.value)" name="stream" id="stream" style="width: 60px;border: 1px solid #7c7cff ;border-radius: 4px;height:44px">
                  <option value="All">All</option>
                  <option value="C">C</option>
                  <option value="B">B</option>
                  <option value="L">L</option>
                  <option value="G">G</option>
                  <option value="P">P</option>

                  <option value="R">R</option>


                  <option value="E">E</option>
                  <option value="T">T</option>



                  <option value="J">J</option>



                </select>
              </div>
              <input type="text" class="form-control" style="width: 300px;" placeholder="Search pupil..." aria-label="search" aria-describedby="search" style="width: 400px" oninput='pupilName(event)' />
              <div class="input-group-prepend" style="cursor: pointer">
                <span class="input-group-text" id="search">
                  <i class="typcn typcn-zoom"></i>
                </span>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="
                  nav-link
                  count-indicator
                  dropdown-toggle
                  d-flex
                  justify-content-center
                  align-items-center
                " id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="typcn typcn-cog-outline mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">

              <a class="dropdown-item" onclick="location='login.php'">
                <i class="typcn typcn-eject text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="
              navbar-toggler navbar-toggler-right
              d-lg-none
              align-self-center
            " type="button" data-toggle="offcanvas">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
      <?php include './nav.view.php'; ?>
      <!-- partial -->
      <div class="bodyWrapper">
        <div style="height: 30px; display: flex;align-items: center;justify-content: center">
          <h6 id="stf">________
          </h6>

        </div>
        <div style="display: flex; flex-wrap: wrap; height: 480px;overflow:auto;" id="cardHolder">








        </div>






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
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
<script>
  let cls = document.getElementById('class').value
  let strm = document.getElementById('stream').value


  localStorage.setItem("classinput", cls);
  localStorage.setItem("streaminput", strm);


  const classtype = localStorage.getItem("classinput");

  const streamtype = localStorage.getItem("streaminput");



  function clchang(value) {
    let bv = value
    // let clch=document.getElementById('class').value
    localStorage.setItem("classinput", bv);
    var classtype = localStorage.getItem("classinput");


  }

  function strmchang(val) {
    // let strmch=document.getElementById('stream').value
    let cbv = val
    localStorage.setItem("streaminput", cbv);

  }

  function typch(val) {

    // let strmch=document.getElementById('stream').value
    let cbi = document.getElementById('stf')
    cbi.innerHTML = val.toUpperCase()

    if (val == '') {
      console.log('hey');
    } else {

      sendData({
        category: val,
      }, "getpplcat")
    }


  }





  const sendData = (data, type) => {


    var xml = new XMLHttpRequest()

    xml.onload = function() {

      if (xml.readyState == 4 || xml.status == 200) {

        handleResult(xml.responseText)

      }
    }

    data.type = type
    var dataString = JSON.stringify(data)
    xml.open("POST", "./routes.php", true)
    xml.send(dataString)
  }
  const handleResult = (results) => {
    // alert(results)
    var info = JSON.parse(results);

    switch (info.type) {
      case 'name':
        const ch = document.getElementById('cardHolder');
        ch.innerHTML = info.message;
        break;
      case 'category':
        let ct = document.getElementById('cardHolder');
        ct.innerHTML = info.message;
        break;
      case 'cat':
        location.reload()
        break;





      default:
        break;
    }

  }



  const pupilName = (e) => {
    let cls = document.getElementById('class').value
    let strm = document.getElementById('stream').value
    let catv = document.getElementById('cat').value

    if (e.target.value == "") {
      location.reload()
    } else {
      if (catv == "") {
        alert('Category cant be empty')
      } else {
        sendData({
          name: e.target.value,
          class: cls,
          stream: strm,
          category: catv

        }, "pupildesigname")
      }

    }

  }

  function setFees() {

    let cl = document.getElementById('cl');
    let t = document.getElementById('cl2');
    let f = document.getElementById('cl3');

    let clv = cl.value
    let clv2 = t.value
    let clv3 = f.value

    sendData({

      class: clv,
      term: clv2,
      fees: clv3
    }, 'setFees')


  }

  function addcat(e) {
    let a = e.target.id
    let cata = document.getElementById('cat').value

    if (a == "") {
      a = e.target.parentNode.id
    } else {

      let c = window.confirm(`Add pupil to ${cata} category `);

      if (c) {
        sendData({

          id: a,
          category: cata,

        }, 'assigncat')

      }


    }

  }

  function categoryrem(e) {
    let ei = e.target.id
    let cata = document.getElementById('cat').value
    let c = window.confirm(`Remove pupil from  ${cata} category `);
    if (c) {
      if (ei == "") {
        alert('Id is empty.Try again')
      } else {
        sendData({

          id: ei,


        }, 'delcatnameppl')
      }
    }


  }
</script>