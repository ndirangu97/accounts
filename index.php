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
        <div style="display: flex; flex-wrap: wrap; height: 560px;" id="cardHolder">
         
            
            
        
       
          
           

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
    



      default:
        break;
    }

  }
  const pupilName = (e) => {
    
    if (e.target.value == "") {
      location.reload()
    } else {
      sendData({
        name: e.target.value,
        
      }, "pupilName")
    }

  }
  function setFees() {
    
    let cl = document.getElementById('cl');
    let t = document.getElementById('cl2');
    let f = document.getElementById('cl3');

    let clv=cl.value
    let clv2=t.value
    let clv3=f.value
 
    sendData({

      class:clv,
      term:clv2,
      fees:clv3
    },'setFees')

    
  }
</script>