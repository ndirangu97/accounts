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
      height: 600px;

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
          <a class="navbar-brand brand-logo" href="index.html"><img src="./images/milimani.jpg" alt="logo" style="object-fit: cover; width: 50px; height: 50px" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
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
              <span class="nav-profile-name">Mr Martin Anyanga</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="typcn typcn-cog-outline text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="typcn typcn-eject text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-date dropdown">
            <a class="
                  nav-link
                  d-flex
                  justify-content-center
                  align-items-center
                " href="javascript:;">
              <h6 class="date mb-0"><b>Today :</b>  <?php echo(date("l jS  F "));?></h6>
              
              <i class="typcn typcn-calendar"></i>
            </a>
          </li>
          
          <li class="nav-item nav-profile dropdown">
            <div class="input-group">
              <input type="text" oninput='sendData({name:this.value,chaser:"admin",page:ownid},"nameteacher")' class="form-control" placeholder="Search from admins..." aria-label="search" aria-describedby="search" style="width: 300px" />
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
            <div class="
                  dropdown-menu dropdown-menu-right
                  navbar-dropdown
                  preview-list
                " aria-labelledby="messageDropdown">
              <a class="dropdown-item preview-item">
                <div class="preview-item-content flex-grow">
                  <img src="./images/logout.png" alt="image" style="width: 25px; height: 25px" />
                  <h6 class="preview-subject ellipsis font-weight-normal">
                    Logout
                  </h6>
                </div>
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
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./pupils.php">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Pupils</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="typcn typcn-film menu-icon"></i>
              <span class="menu-title">Teachers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="./teachers.php?pg=1">All Teachers</a></li>
                <li class="nav-item"><a class="nav-link" href="./admins.php?pg=1">Admins</a></li>

                <li class="nav-item"><a class="nav-link" href="./classteachers.php?pg=1">ClassTeachers</a></li>

              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="./staff.php?pg=1" >
              <i class="typcn typcn-compass menu-icon"></i>
              <span class="menu-title">Staff</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="typcn typcn-chart-pie-outline menu-icon"></i>
              <span class="menu-title">Library</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Accounts</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="bodyWrapper">
        <div id="cardHolder" style="display: flex;
          flex-wrap: wrap;height: 560px;">
          <?php
          require_once "./connection.php";
          $DB = new Database();
          $resultsPerPage = 16;


          $sql = false;

          
          $sql = "SELECT * FROM teachers WHERE admin=1";

          $Allresults = $DB->read($sql, []);

          if (is_array($Allresults)) {
            $no = (count($Allresults));
          }
          $pages = ceil($no / $resultsPerPage);

          $dept="";
          if (!isset($_GET["page"])) {
            $page = 1;
          } else {
            $page = $_GET["page"];
          }
          $pgFirstResult = ($page - 1) * $resultsPerPage;

          $sql = false;
          $data = false;
          

          $sql = "SELECT * FROM teachers WHERE admin=1 LIMIT $pgFirstResult,$resultsPerPage ";
          $results = $DB->read($sql, []);

          if (is_array($results)) {
            foreach ($results as $row) {
              if ($row->admin==1) {
                if ($row->department!="") {
                  $dept="<p style='font-size: 18px;color:#a60813'>ADM : $row->department</p>";
                }
              }
              echo "
              <a href='moreteacher.php?id=$row->userid' style='text-decoration:none;color:inherit'>
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
              <img src='$row->img' style='width: 100px; height: 100px; border-radius: 50%' />
            </div>
            <div style='
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  flex-direction: column;
                '>
              <p style='font-size: 18px'>$row->name</p>
              
              $dept
          
              
            </div>
          </div>
        </div>
        </a>
              ";
            }
          } else {
            echo "No students yet inserted into the database";
          } ?>










        </div>
        <div id="paginate" style=" justify-self:flex-end;display: flex;justify-content: center;align-items: center;">
        <?php
                    for ($page = 1; $page <= $pages; $page++) {
                        echo " <a class='linksa' href='admins.php?pg=$page'>$page</a>";
                    }



                    ?>
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
    const p = url.replace("http%3A%2F%2Flocalhost%2Ftemplate%2Fadmins.php%3Fpg=", "");
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
        alert(results)
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
</script>