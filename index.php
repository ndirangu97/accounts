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
      height: 540px;
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
              <div >

                <span id="sErr"></span>
                <select  onchange="strmchang(this.value)"  name="stream" id="stream" style="width: 60px;border: 1px solid #7c7cff ;border-radius: 4px;height:44px">
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
              <input type="text" class="form-control" placeholder="Search pupil..." aria-label="search" aria-describedby="search" style="width: 400px" oninput='pupilName(event)' />
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
        <div style="display: flex; flex-wrap: wrap; height: 520px;overflow:auto" id="cardHolder">
         
            
            
        
       
          
           

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

    let cls=document.getElementById('class').value
    let strm=document.getElementById('stream').value
    
    localStorage.setItem("classinput", cls);
    localStorage.setItem("streaminput", strm);

    const classtype = localStorage.getItem("classinput");
    const streamtype = localStorage.getItem("streaminput");

  

    function clchang(value) {
      let bv=value
      // let clch=document.getElementById('class').value
      localStorage.setItem("classinput", bv);
      var classtype = localStorage.getItem("classinput");
      
   
    }

    function strmchang(val) {
      // let strmch=document.getElementById('stream').value
      let cbv=val
      localStorage.setItem("streaminput", cbv);
      
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
  //  alert(results)
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
    let cls=document.getElementById('class').value
    let strm=document.getElementById('stream').value
    
    if (e.target.value == "") {
      location.reload()
    } else {
      sendData({
        name: e.target.value,
        class:cls,
        stream:strm
        
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