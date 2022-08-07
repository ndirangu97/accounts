<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
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
        height: 540px;
        width: 100%;
       
        overflow-y: hidden;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller" style="height: 100vh">
      <!-- partial:partials/_navbar.html -->
      <?php include "./head.view.php"; ?>
      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
      <?php include "./nav.view.php"; ?>
        <!-- partial -->
        <div class="bodyWrapper">
          <div
            class="lbwrp"
            style="
              flex-basis: 50%;
              display: flex;
              flex-direction: column;
              align-items: center;
              justify-content: space-around;
            "
          >
            <a
            href="./addpupil.php"
              class="card"
              style="
                flex-basis: 27%;
                width: 330px;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                text-decoration: none;
                
              "
            >
            <div>  <p style="font-size: 18px;">Add Pupil </p> <img src="./images/schoolboy.png" style="height: 50px;width:50px;margin-left:20px" alt=""></div>
           
            </a>
            <a
            href="./addteacher.php"
              class="card"
              style="
                flex-basis: 27%;
                width: 330px;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                text-decoration: none;
              "
            >
            
            <div>  <p style="font-size: 18px;">Add Teacher </p> <img src="./images/teacher.png" style="height: 50px;width:50px;margin-left:20px" alt=""></div>
           
            </a>
            <a
            href="./addstaff.php
            "
              class="card"
              style="
                flex-basis: 27%;
                width: 330px;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                text-decoration: none;
              "
            >
              
            <div>  <p style="font-size: 18px;">Add Staff </p> <img src="./images/teamwork.png" style="height: 50px;width:50px;margin-left:20px" alt=""></div>
           
            </a>
          </div>
          <div
            class="rberp"
            style="flex-basis: 50%; width: 330px;display: flex;justify-content: center;align-items: center;"
          >
          
            <div
            onclick="getyearly()"
              class="card"
              style="
                height: 500px;
                width: 400px;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                text-decoration: none;
              "
            >
           

            <div>  <p style="font-size: 18px;">Yearly Transfer </p> <img src="./images/difficulties.png" style="height: 50px;width:50px;margin-left:20px" alt=""></div>
           
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
    //handle results from the server
    const handleResult = (results) => {
       
        var info = JSON.parse(results);

        switch (info.type) {
            case 'name':
               const ch=document.getElementById('cardHolder');
               const pn=document.getElementById('paginate');
               
               ch.innerHTML=info.message;
               pn.innerHTML=info.message2;

                break;
            


            default:
                break;
        }

    }
    function getyearly() {
      let c=confirm('Are you sure you want to yearly transferr to next class?')
      if (c) {
        sendData({},'yearly')
      }
     
    }
</script>
