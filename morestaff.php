<?php
require_once "./connection.php";
$DB = new Database();

$id=$_GET['id'];
$sql = "SELECT * FROM staff WHERE userid='$id'";

$resultSql = $DB->read($sql, []);

$resultSql = $resultSql[0];
$userId = $resultSql->userid;
$pimage = $resultSql->img;

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
    <link rel="stylesheet" href="./addPupil.css">

    <style>
        .bodyWrapper {
            padding: 0 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 600px;
            width: 100%;
            overflow-y: hidden;
        }
        .d:hover{
            background:red;
        }

        .input {
            width: 500px;
            height: 30px;
            border: 1px solid #7c7cff;
        }

        .input:focus {
            outline: 1px solid #7c7cff;
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
                            <h6 class="date mb-0">Today : Mar 23</h6>
                            <i class="typcn typcn-calendar"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." aria-label="search" aria-describedby="search" style="width: 400px" />
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
                        <a class="nav-link" href="./pupils.php?pg=1">
                            <i class="typcn typcn-document-text menu-icon"></i>
                            <span class="menu-title">Pupils</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./teachers.php?pg=1">
                            <i class="typcn typcn-film menu-icon"></i>
                            <span class="menu-title">Teachers</span>
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
                    <li class="nav-item">
                        <a class="nav-link" href="./staff.php?pg=1">
                            <i class="typcn typcn-compass menu-icon"></i>
                            <span class="menu-title">Staff</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./actions.php?pg=1">
                            <i class="typcn typcn-compass menu-icon"></i>
                            <span class="menu-title">Actions</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./staff.php?pg=1">
                            <i class="typcn typcn-compass menu-icon"></i>
                            <span class="menu-title">Staff</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="bodyWrapper">
                
                <div class="card" style="
              flex-basis: 94%;
              width: 100%;
              display: flex;
              flex-direction:row;
              align-items: center;
              justify-content: center;
            ">
                <div class="leftContainer" style="flex-basis: 30%;">
                        <div style="margin-top: -90px;"><img src="<?php echo $pimage ?>" id="img" style="object-fit: cover;" /></div>
                       
                    </div>
                    <div class="rightContainer " style="flex-basis: 70%;display:flex;flex-direction:column;height:100%;position:relative">
                        <div style="display: flex; justify-content: center; align-items: center;flex-basis:10%;">
                            <h3 style="margin-top: 45px;margin-bottom:30px">Staff's Bio</h3>
                        </div>
                        <div style="width: 100%; display: flex; align-items:center; flex-basis:90%;flex-direction:column;padding-top:30px">

                            <div class="card" style="display: flex;width:80%;height:60px;flex-direction:row;align-items:center;margin-bottom:20px">
                                <p style="font-size:20px;margin-right:80px;margin-left:20px;color:#7c7cff"><b>Fullname</b></p>
                                <p style="font-size:20px">  <?php echo $resultSql->name ?></p>
                            </div>
                            <div class="card" style="display: flex;width:80%;height:60px;flex-direction:row;align-items:center;margin-bottom:20px">
                                <p style="font-size:20px;margin-right:50px;margin-left:20px;color:#7c7cff"><b>Department</b></p>
                                <p style="font-size:20px"> <?php echo $resultSql->department ?> </p>
                            </div>
                            <div class="card" style="display: flex;width:80%;height:60px;flex-direction:row;align-items:center;margin-bottom:20px">
                                <p style="font-size:20px;margin-right:140px;margin-left:20px;color:#7c7cff"><b>Role</b></p>
                                <p style="font-size:20px"> <?php echo $resultSql->role ?> </p>
                            </div>
                            <?php
                            if ($resultSql->disabled == "Yes") {
                                echo " <div class='card' style='display: flex;width:80%;height:60px;flex-direction:row;align-items:center;'> <p style='font-size:20px;margin-right:80px;margin-left:20px;color:#7c7cff'><b>Disability</b></p> <p style='font-size:20px'> $resultSql->disabled   </p></div>";
                            }

                            ?>

                        </div>
                        <div style="position: absolute; right:20px;top:20px;cursor:pointer" onclick="document.getElementById('dtmodal').style.display='flex'">I</div>
                        <div id="dtmodal" style="height: 100px;width:200px;background:#ffffff;position: absolute; right:40px;top:20px;border:1px solid #9999;display:none;flex-direction:column;align-items:center;justify-content:center">
                       
                        <div class="d" onclick="dels()" style="width:100%;height:50px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:1.5s" >Delete Staff</div>
                        
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
const href = window.location.href;
  // console.log(href);
  const param = new URLSearchParams(href);
  const url = param.toString();
  // console.log(param.toString());
  // const p=url.slice(52);
  console.log(url);

  const p = url.replace("http%3A%2F%2Flocalhost%2Ftemplate%2Fmorestaff.php%3Fid=", "");
  localStorage.setItem("id", p);
  const ownid = localStorage.getItem("id");

  //to send data to server
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
      
    case 'delete':
        window.location='staff.php?pg=1';
        break;


      default:
        break;
    }

  }
  const transferOpen = () => {

    let m = document.getElementById('modal2')
    m.style.display = 'flex';
  }

  const closem = () => {

    let m = document.getElementById('modal2')
    m.style.display = 'none';

  }
  const dels = () => {
    const ask = confirm(`Do you really want to delete this staff ?`)


    if (ask) {
      sendData({
        id: ownid

      }, 'deleteStaff')
    }

  }

</script>