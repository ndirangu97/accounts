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

      height: 500px;
      overflow-y: scroll;
      width: 100%;


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
      flex-basis: 89%;
      margin-bottom:60px


    }

    .lftrcpcont {
      flex-basis: 49%;
      height: 100%;
      border-right: 1px solid black;
      margin-left: 20px;
      display: flex;
      

    }
    .lftrcpcont2 {
      flex-basis: 49%;
      height: 100%;
      
      margin-left: 20px;
      display: flex;
      

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
      <div class="bodyWrapper">
        <div class="wrapping">
          <div class="reciept">
            <div class="rchead">
              <h6>MILIMANI PRIMARY SCHOOL FEES RECIEPT</h6>
              <h6>HEZRON NDIRANGU WANJIRU</h6>
              <h6>CLASS 6C &nbsp;&nbsp;&nbsp; 2022</h6>
            </div>

            <div class="rcpcont">
              <div class="lftrcpcont">
                
                <div class="lft">
                  <p>January</p>
                  
                </div>
                <div class="rft">
                  <p>800</p>
                  

                </div>
              </div>

              <div class="rghttrcpcont">
                <div class="lftrcpcont2">
                <div class="lft">
                  <p>January</p>
                  
                </div>
                <div class="rft">
                  <p>800</p>
                  

                </div>



                </div>

              </div>

            </div>
            <div style="height:100px;width:100%;position:absolute;bottom:0;">

              <div style="display:flex;margin-top:auto;height:100%;position:relative">
               <div style="position:absolute;bottom:0;display:flex">
               <h6 > Served By</h6> _____________________________
               </div>
              </div>
            </div>



          </div>



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
  const sendData = (data, type) => {
    let b = document.getElementById('gif')
    b.style.display = 'block'
    let ib = document.getElementById('imbtn')
    ib.disabled = true
    let iy = document.getElementById('ybtn')
    iy.disabled = true

    var xml = new XMLHttpRequest()

    xml.onload = function() {

      if (xml.readyState == 4 || xml.status == 200) {

        handleResult(xml.responseText)
        let b = document.getElementById('gif')
        b.style.display = 'none'
        ib.disabled = false
        let iy = document.getElementById('ybtn')
        iy.disabled = false

      }
    }

    data.type = type
    var dataString = JSON.stringify(data)
    xml.open("POST", "./routes.php", true)
    xml.send(dataString)
  }
  const handleResult = (results) => {
    alert(results)
    var info = JSON.parse(results);

    switch (info.type) {

      case 'err':
        let ime = document.getElementById('imerr');
        ime.innerHTML = info.message

        break;
      case 'import':
        let im = document.getElementById('imerr');
        im.innerHTML = info.message

        break;
      case 'yearly':

        let imy = document.getElementById('imerr');
        imy.innerHTML = info.message

        break;




      default:
        break;
    }

  }

  function trans() {
    let c = confirm('Are you sure you want to yearly transferr to next class?')

    if (c) {
      sendData({}, 'yearly')
    }
  }

  function getport() {
    let c = confirm('Are you sure you want to import students?')

    if (c) {
      sendData({}, 'import')
    }
  }
</script>