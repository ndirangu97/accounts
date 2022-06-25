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
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      height: 600px;
      width: 100%;
      overflow-y: hidden;
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
       
        <div style="display: flex; flex-wrap: wrap; height: 560px;justify-content: center;align-items: center;position:relative;flex-direction:column" id="cardHolder">
          <div style="flex-basis: 10%;width:100%;display: flex;justify-content: center;align-items: center;" id="imerr"> </div>
          <div style="display: flex;justify-content: center;align-items: center;flex-basis:90% ">

            <button id="imbtn" class='card' style='
            display: flex;
            width: 300px;
            height: 300px;
            margin-right: 12px;
            margin-bottom: 10px;
            justify-content: center;
            align-items: center;
            padding:10px 10px;
            cursor: pointer;
          ' onclick="getport()">

              <h6>Import Pupils</h6>
             
              <img src="./images/schoolboy.png" height="60px" width="60px">
            </button>
            <button id="ybtn" class='card' style='
            display: flex;
            width: 300px;
            height: 300px;
            margin-right: 12px;
            margin-bottom: 10px;
            justify-content: center;
            align-items: center;
            padding:10px 10px;
            cursor: pointer;
          '  onclick="trans()">

              <h6>Yearly Transter Pupils</h6>
              <img src="./images/difficulties.png" height="60px" width="60px">
            </button>
    


            <div style="position:absolute;right:50px;top:20px"><img src="./images//loader.gif" id="gif" style="height: 50px;width:50px;display:none" alt=""></div>
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
    let iy=document.getElementById('ybtn')
    iy.disabled=true

    var xml = new XMLHttpRequest()

    xml.onload = function() {

      if (xml.readyState == 4 || xml.status == 200) {

        handleResult(xml.responseText)
        let b = document.getElementById('gif')
        b.style.display = 'none'
        ib.disabled = false
        let iy=document.getElementById('ybtn')
    iy.disabled=false

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
    let c=confirm('Are you sure you want to yearly transferr to next class?')

    if (c) {
      sendData({},'yearly')
    }
  }
  function getport() {
    let c=confirm('Are you sure you want to import students?')

    if (c) {
      sendData({},'import')
    }
  }
  
</script>