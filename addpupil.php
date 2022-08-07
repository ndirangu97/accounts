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
      justify-content: center;
      align-items: center;
      height: 530px;

      width: 100%;

      overflow-y: hidden;
    }

    .input {
      width: 300px;
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
    <?php include "./head.view.php"; ?>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
      <?php include "./nav.view.php"; ?>
      <!-- partial -->
      <div class="bodyWrapper">
        <div style="
              flex-basis: 6%;
              width: 100%;
              justify-content: center;
              align-items: center;
              display: flex;
              
            ">
          <h5>Add Pupils Details</h5><span style="color: red;margin-left:20px">
            <h4 id="err"></h4>
          </span>
        </div>
        <div class="card" style="
              height: 450px;
              width: 100%;
              display: flex;
              align-items: center;
              justify-content: center;
              flex-direction: row;
              
            ">
          <div id="form" style="display: flex;
          flex-direction: column;
          justify-content: center;align-items: center;
          align-items: center;
          flex-basis: 50%;height: 100%;">

            <div style="display:flex;">
              <p>Name</p>
              <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left: 20px;" class="input" type="text" placeholder="Name" name="name" id="" required min="3">
            </div>


            <div style="display: flex;">
              <p>UPI</p>
              <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left: 40px" class="input" type="text" placeholder="UPI no" name="upi" id="" required min="3">
            </div>


            Gender:
            <span id="gErr"></span>
            <div style="margin-bottom: 16px;">
              <input type="radio"  id="male"   name="gender" value="Male">
              <label for="male">Male</label><br>
              <input type="radio"  checked id="female"    name="gender" value="Female">
              <label for="female">Female</label><br>
            </div>
            Disability:
            <span id="dErr"></span>
            <div style="margin-bottom: 16px;">
              <input type="radio" id="no" checked  name="disability" value="No">
              <label for="no">No</label><br>
              <input type="radio" id="yes" name="disability" value="Yes">
              <label for="yes">Yes</label><br>


            </div>

            <div style="display: flex;margin-bottom:20px">
              <div>
                <label for="class">Class: </label>
                <span id="cErr"></span>
                <select name="class" id="class" style="width: 80px;border: 1px solid #7c7cff ;border-radius: 4px;">
                <option value="4">4</option>
                <option value="1">1</option>
               
                <option value="3">3</option>
                <option value="8">8</option>
                <option value="2">2</option>
              
                <option value="7">7</option>
                <option value="6">6</option>
                
               
                <option value="4">4</option>
               
              
                
             
                
               
             
        
                 
                 
                  
                  <option value="5">5</option>
                  
                 
                </select>
              </div>
              <div style="margin-left: 20px;">
                <label for="stream">Stream: </label>
                <span id="sErr"></span>
                <select name="stream" id="stream" style="width: 80px;border: 1px solid #7c7cff ;border-radius: 4px;">
                <option value="T">T</option>
                <option value="L">L</option>
                
                <option value="E">E</option> 
                <option value="B">B</option>
                <option value="R">R</option>
                <option value="C">C</option> 
               
                
              
                
               
              
            
               
               
              
                
                <option value="J">J</option>
               
                <option value="P">P</option>
                
                
               
                
                <option value="G">G</option>
              
                
                
                
   
                
               
          
           

               
                
         
       
               
                
              
               
              
                </select>
              </div>


            </div>



          </div>
          <div style="flex-basis: 50%;height: 100%;display: flex;flex-direction: column;align-items: center;">
            <div style="flex-basis: 48%;border:1px solid #11ad11;display: flex;width: 100%;flex-direction: column;justify-content: center;align-items: center;border-radius: 8px;">
              <div style="display: flex;">
                <p>Guardian Name:</p>
                <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left: 20px;" class="input" type="text" placeholder="Guardian Name" name="g1name" id="" required min="3">
              </div>
              <div style="display: flex;">
                <p>Guardian Phone:</p>
                <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left: 20px" class="input" type="text" placeholder="Guardian Phone" value="07" name="g1no" id="" required min="3">
              </div>
              <div style="margin-left: 20px;">
                <label for="stream">Role: </label>
                <span id="sErr"></span>
                <select name="grole" id="role" style="width: 60px;border: 1px solid #7c7cff ;width: 300px;margin-left: 67px;border-radius: 4px;padding-left: 16px;">
                  <option value="Mother">Mother</option>
                  <option value="Father">Father</option>
                  <option value="Guardian">Guardian</option>


                </select>
              </div>

            </div>
            <div style="flex-basis: 48%;border:1px solid #11ad11;display: flex;width: 100%;flex-direction: column;justify-content: center;align-items: center;border-radius: 8px;margin-top: 10px;">
              <div style="display: flex;">
                <p>Guardian Name:</p>
                <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left: 20px;" class="input" type="text" placeholder="Guardian Name" name="g2name" id="" required min="3">
              </div>
              <div style="display: flex;">
                <p>Guardian Phone:</p>
                <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left: 20px" class="input" type="text" placeholder="Guardian Phone" name="g2no" id="" required min="3">
              </div>
              <div style="margin-left: 20px;">
                <label for="stream">Role: </label>
                <span id="sErr"></span>
                <select name="g2role" id="role2" style="width: 60px;border: 1px solid #7c7cff ;width: 300px;margin-left: 67px;border-radius: 4px;padding-left: 16px;">
                  <option value="Father">Father</option>
                  <option value="Mother">Mother</option>

                  <option value="Guardian">Guardian</option>


                </select>
              </div>

            </div>



          </div>
        </div>
        <div style="height: 50px;width:100%;display: flex;justify-content: center;align-items: center;">
          <input type="submit" style="  padding: 6px 60px;
          background: rgb(190, 190, 190);
          border-radius: 8px;
          border: none;
          color: rgb(57, 57, 255);
          cursor: pointer;
          " id="submit" value="Save Pupil" onclick=" collectData(event)">
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
  const goBack = () => {
    history.back();
  }




  function _(element) {

    return document.getElementById(element);
  }
  var signup_button = _("submit");


  var inputs = document.getElementsByTagName("input");
  var classSelect = _("class");
  var streamSelect = _("stream");
  var role = _("role");
  var role2 = _("role2");

  var data = {};
  const collectData = (e) => {


    signup_button.disabled = true;
    signup_button.value = "Loading...Please wait..";

    for (var i = 0; i <= inputs.length - 1; ++i) {

      var key = inputs[i].name;

      switch (key) {

        case "name":
          data.name = inputs[i].value;
          break;

        case "cert":
          data.cert = inputs[i].value;
          break;
        case "disability":
          if (inputs[i].checked) {
            data.disabled = inputs[i].value;
          }
          break;

        case "upi":
          data.upi = inputs[i].value;
          break;
        case "gender":
          if (inputs[i].checked) {
            data.gender = inputs[i].value;
          }
          break;
        case "g1name":
          data.g1name = inputs[i].value;
          break;
        case "g2name":
          data.g2name = inputs[i].value;
          break;
        case "g1no":
          data.g1no = inputs[i].value;
          break;
        case "g2no":
          data.g2no = inputs[i].value;
          break;





      }
    }
    data.class = classSelect.value;
    data.stream = streamSelect.value;
    data.grole = role.value
    data.grole2 = role2.value

    sendData(data, "addPupil")



  }

  const sendData = (data, type) => {

    var xml = new XMLHttpRequest();

    xml.onload = function() {

      if (xml.readyState == 4 || xml.status == 200) {

        signup_button.disabled = false;
        signup_button.value = "Add Pupil";
        handleResult(xml.responseText);

      }
    }

    data.type = type;
    var data_string = JSON.stringify(data);

    xml.open("POST", "routes.php", true);
    xml.send(data_string);
  }
  const handleResult = (results) => {
    // alert(results);
    var data = JSON.parse(results);
    switch (data.type) {
      case "err":
        var r = document.getElementById('err')
        err.innerHTML = data.message;
        break;
      case "pupilSaved":
        var id = data.message;
        localStorage.setItem('userId', id);

        window.location = "./addpupilimage.php";
        break;


      default:
        break;
    }
  }


  document.querySelectorAll('input').forEach(el => {
    console.log(el)
    el.addEventListener('keydown', e => {
      console.log(e.keyCode);
      if (e.keyCode === 13) {
        let nextEl = el.nextElementSibling;
        console.log(nextEl)
        if (nextEl.nodeName === 'INPUT') {
          nextEl.focus();
        } else {
          alert('done');
        }
      }
    })
  })
</script>