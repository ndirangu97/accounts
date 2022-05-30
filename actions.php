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
              <!-- <h6 class="date mb-0"><?php echo date("Y"); ?></h6> -->
              <i class="typcn typcn-calendar"></i>
            </a>
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
                <div class="preview-item-content flex-grow" onclick="location='login.php'">
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
            <a class="nav-link" href="index.php">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="./heads.php">
              <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Heads</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="./actions.php">
              <i class="typcn typcn-compass menu-icon"></i>
              <span class="menu-title">Actions</span>
            </a>
          </li>
        </ul>
      </nav>
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
          ' onclick="sendData({},'import')">

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
          '  onclick="sendData({},'yearly')">

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
  
</script>