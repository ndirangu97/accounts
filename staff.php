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
        <div id="cardHolder" style="display: flex;
          flex-wrap: wrap;height: 540px;overflow:auto">
          <?php
          require_once "./connection.php";
          $DB = new Database();
          $resultsPerPage = 16;


          $sql = false;

          
          

          $sql = "SELECT * FROM staff   ";
          $results = $DB->read($sql, []);

          if (is_array($results)) {
            foreach ($results as $row) {
              echo "
              <a href='morestaff.php?id=$row->userid' style='text-decoration:none;color:inherit' >
              <div class='card' style='
              display: flex;
              align-items: stretch;
              justify-content: stretch;
              margin-right: 12px;
              margin-bottom: 10px;
              max-height:130px !important ;
            '>
          <div style='display: flex; margin: 4px 6px'>
            <div>
              <img src='$row->img' style='width: 100px; height: 100px; border-radius: 50%;object-fit:cover' />
            </div>
            <div style='
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  flex-direction: column;
                '>
              <p style='font-size: 18px'>$row->name</p>
              <p style='font-size: 18px;color:#b4e334'>Dept : $row->department</p>
              
            </div>
          </div>
        </div>
        </a>
              ";
            }
          } else {
            echo "No staff yet inserted into the database";
          } ?>










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
    const myform = new FormData();
    const href = window.location.href;
    // console.log(href);
    const param = new URLSearchParams(href);
    const url = param.toString();
    // console.log(param.toString());
    // alert(url)
    const p = url.replace("http%3A%2F%2Flocalhost%2Ftemplate%2Fstaff.php%3Fpg=", "");
    localStorage.setItem("id", p);
    const ownid = localStorage.getItem("id");
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
        // alert(results)
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
    const getname=(e)=>{
      if (e.target.value=="") {
        location.reload()

      }else{
        sendData({name:e.target.value},"namestaff")
      }

    }
</script>