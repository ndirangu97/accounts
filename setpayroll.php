

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
  </style>
</head>

<body>
  <div class="container-scroller" style="height: 100vh">
    <!-- partial:partials/_navbar.html -->
    <nav class='navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row' style='height: 78px'>
      <div class='navbar-brand-wrapper d-flex justify-content-center'>
        <div class='
              navbar-brand-inner-wrapper
              d-flex
              justify-content-between
              align-items-center
              w-100
            '>
          <a class='navbar-brand brand-logo' href='index.php'><img src='./images/milimani.jpg' alt='logo' style='object-fit: cover; width: 50px; height: 50px' /></a>
          <a class='navbar-brand brand-logo-mini' href='index.php'><img src='images/logo-mini.svg' alt='logo' /></a>
          <button class='navbar-toggler navbar-toggler align-self-center' type='button' data-toggle='minimize'>
            <span class='typcn typcn-th-menu'></span>
          </button>
        </div>
      </div>
      <div class='
            navbar-menu-wrapper
            d-flex
            align-items-center
            justify-content-end
          '>
        <ul class='navbar-nav mr-lg-2'>
          <li class='nav-item nav-profile dropdown'>
            <a class='nav-link' href='#' data-toggle='dropdown' id='profileDropdown'>
              <img src='images/faces/face5.jpg' alt='profile' />
              <span class='nav-profile-name'>Mr Martin Anyanga</span>
            </a>
            <div class='dropdown-menu dropdown-menu-right navbar-dropdown' aria-labelledby='profileDropdown'>
              <a class='dropdown-item'>
                <i class='typcn typcn-cog-outline text-primary'></i>
                Settings
              </a>
              <a class='dropdown-item'>
                <i class='typcn typcn-eject text-primary'></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <ul class='navbar-nav navbar-nav-right'>
          <li class='nav-item nav-date dropdown'>
            <a class='
                  nav-link
                  d-flex
                  justify-content-center
                  align-items-center
                ' href='javascript:;'>
              <h6 class='date mb-0'>Today : Mar 23</h6>
              <i class='typcn typcn-calendar'></i>
            </a>
          </li>
          <li class='nav-item nav-profile dropdown'>
            <div class='input-group'>
              <div style="margin-left: 20px;">


                <select oninput="tupo()" name="grole" id="role" style="width: 60px;border: 1px solid #7c7cff ;width: 100px;border-radius: 4px;padding-left: 16px;;height:50px">
                  <option value="staff">Staff</option>
                  <option value="teacher">Teacher</option>


                </select>
              </div>
              <input type='text' oninput="getname(event)" class='form-control' placeholder='Search...' aria-label='search' aria-describedby='search' style='width: 300px;height:50px' />
              <div class='input-group-prepend' style='cursor: pointer'>
                <span class='input-group-text' id='search'>
                  <i class='typcn typcn-zoom'></i>
                </span>
              </div>
            </div>
          </li>
          <li class='nav-item dropdown'>
            <a class='
                  nav-link
                  count-indicator
                  dropdown-toggle
                  d-flex
                  justify-content-center
                  align-items-center
                ' id='messageDropdown' href='#' data-toggle='dropdown'>
              <i class='typcn typcn-cog-outline mx-0'></i>
              <span class='count'></span>
            </a>
            <div class='
                  dropdown-menu dropdown-menu-right
                  navbar-dropdown
                  preview-list
                ' aria-labelledby='messageDropdown'>
              <a class='dropdown-item preview-item'>
                <div class='preview-item-content flex-grow'>
                  <img src='./images/logout.png' alt='image' style='width: 25px; height: 25px' />
                  <h6 class='preview-subject ellipsis font-weight-normal'>
                    Logout
                  </h6>
                </div>
              </a>
            </div>
          </li>
        </ul>
        <button class='
              navbar-toggler navbar-toggler-right
              d-lg-none
              align-self-center
            ' type='button' data-toggle='offcanvas'>
          <span class='typcn typcn-th-menu'></span>
        </button>
      </div>
    </nav>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
      <?php include "./nav.view.php"; ?>
      <!-- partial -->

      <div class="bodyWrapper">
        <div id="cardHolder" style="display: flex;
          flex-wrap: wrap;height: 530px;margin-left:20px;overflow:auto;">
         
         <div id="modal2" class="fade2" style="position: absolute;
                            top: 10%;
                            right: 50%;
                            display:none


                          
                            ">
                                <div class="mparent">
                                    <div  onclick="closem()" style=" position: absolute;
                            height: 30px;
                            width: 30px;
                            right: 10px;
                            cursor: pointer;
                            top: 10px;color:red">X</div>
                                    <div style="display: flex;flex-direction:column;align-items:center;margin-bottom:40px;margin-top:30px;">


                                        <h3 style="margin-bottom:15px">Transfer From:</h3>
                                        <p><?php echo $resultSql->class;
                                            echo $resultSql->stream ?></p>
                                    </div>
                                    <h3 style="margin-bottom:20px">Transfer To:</h3>

                                    <div style="display: flex;justify-content:center">

                                    
                                        <div>

                                            <label for="class">Class: </label>
                                            <select name="class" id="class" style="width:50px;border:1px solid #7c7cff ">
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
                                        <div style="margin-left: 30px;">
                                            <label for="stream">Stream: </label>
                                            <span id="sErr"></span>
                                            <select name="stream" id="stream" style="width:60px;border:1px solid #7c7cff ">
                                                <option value="C">C</option>
                                                <option value="T">T</option>
                                                <option value="B">B</option>
                                                <option value="P">P</option>
                                                <option value="R">R</option>
                                                <option value="L">L</option>
                                                <option value="E">E</option>

                                            </select>
                                        </div>

                                    </div>


                                    <div>
                                        <input type="submit" id="submit" onclick="transfer()" style="color:black" value="Transfer Pupil">
                                    </div>
                                </div>
                            </div>








        </div>

      </div>

      <!-- main-panel ends -->
    </div>
    <input style="display: none;" id="getinput" value="<?php echo ($pg); ?>" />
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

  var gi = document.getElementById('getinput').value

  localStorage.setItem("id", gi);
  const ownid = localStorage.getItem("id")

  var tip = document.getElementById('role').value
  localStorage.setItem("type", tip);
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
        var ch = document.getElementById('cardHolder');
        

        ch.innerHTML = info.message;
  

        break;
        



      default:
        break;
    }

  }

  function tupo() {
    let tp = document.getElementById('role').value

    localStorage.setItem("type", tp);
  }

  const getname = (e) => {

    if (e.target.value == "") {
      location.reload()
    } else {
      var typ = localStorage.getItem("type");

      sendData({
        name: e.target.value,
        chaser: typ
      }, "setsal")
    }

  }

  function salary(e) {
    let tp = document.getElementById('modal2')
    tp.style.display='flex'
  }
</script>