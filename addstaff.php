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
            height: 540px;
            width: 100%;
            overflow-y: hidden;
        }

        .input {
            width: 400px;
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
                    <h5>Add Staff's Details</h5><span style="color: red;margin-left:20px"><h4 id="err"></h4></span>
                </div>
                <div class="card" style="
              flex-basis: 94%;
              width: 80%;
              display: flex;
              flex-direction: column;
              align-items: center;
              justify-content: center;
            ">
                    <div id="form" style="display: flex;
          flex-direction: column;
          align-items: center;
          margin-top: 20px;">
                        
                        <div style="display: flex;justify-content:center;align-items:center">
                        <p>Full name</p>
                        <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left:20px" class="input" type="text" name="name" placeholder="Staff name.." id="" required min="3">
                        </div>

                        <div style="display: flex;justify-content:center;align-items:center">
                        <p>Phone</p>
                        <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left:44px" placeholder="Telephone" class="input" type="text" name="telephone" id="" required min="3">
                        </div>

                        <div style="display: flex;justify-content:center;align-items:center">
                        <p>Id no</p>
                        <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left:54px" placeholder="ID no." class="input" type="text" name="id" id="" required min="3">
                        </div>
                        Gender:
                        <span id="gErr"></span>
                        <div style="margin-bottom: 4px;">
                            <div style="display:flex;flex-direction:column">
                                <div><input type="radio" id="male" name="gender" value="Male">
                                    <label for="male">Male</label>
                                </div>
                                <div><input type="radio" id="female" name="gender" value="Female">
                                    <label for="female">Female</label>
                                </div>
                            </div>


                        </div>
                        Disability:
                        <span id="dErr"></span>
                        <div style="margin-bottom: 4px;">
                            <input type="radio" id="no" name="disability" value="No">
                            <label for="no">No</label><br>
                            <input type="radio" id="yes" name="disability" value="Yes">
                            <label for="yes">Yes</label><br>


                        </div>
                        <div style="display: flex;margin-bottom:20px">
                            <div>
                                <label for="dept">Department: </label>
                                <select name="dept" id="dept" style="border: 1px solid #7c7cff;">
                                    <option value="kitchen">Kitchen</option>
                                    <option value="security">Security</option>
                                    <option value="environment">Environment</option>

                                </select>
                            </div>
                            <div style="margin-left: 20px;">
                                Role:
                                <input type="text" placeholder="Work done.." class="input2" id="role" name="role" style="border: 1px solid #7c7cff;">

                            </div>


                        </div>
                       

                        

                        <input type="submit" style="  padding: 10px 60px;
                background: rgb(190, 190, 190);
                border-radius: 8px;
                border: none;
                color: rgb(57, 57, 255);
                cursor: pointer;
                margin-top: 20px;" id="submit" value="Save Staff" onclick=" collectData(event)">



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
    const goBack = () => {
        history.back();
    }

    var classCheck = document.getElementById("classCheckBox");
    var classInput = document.getElementById("classInput");

    var data = {};


    function _(element) {

        return document.getElementById(element);
    }
    var signup_button = _("submit");
    var deptBtn = _("dept");


    var inputs = document.getElementsByTagName("input");



    const collectData = () => {
        // signup_button.disabled = true;
        // signup_button.value = "Loading...Please wait..";

        for (var i = 0; i <= inputs.length - 1; ++i) {

            var key = inputs[i].name;

            switch (key) {

                case "name":
                    data.name = inputs[i].value;
                    break;

                case "telephone":
                    data.telephone = inputs[i].value;
                    break;
                case "disability":
                    if (inputs[i].checked) {
                        data.disabled = inputs[i].value;
                    }
                    break;

                case "id":
                    data.id = inputs[i].value;
                    break;
                case "gender":
                    if (inputs[i].checked) {
                        data.gender = inputs[i].value;
                    }
                    break;
                case "role":
                    data.role = inputs[i].value;
                    break;



            }
        }
        data.dept = deptBtn.value;

        sendData(data, "addStaff");
       
    }

    const sendData = (data, type) => {

        var xml = new XMLHttpRequest();

        xml.onload = function() {

            if (xml.readyState == 4 || xml.status == 200) {

                handleResult(xml.responseText);
                // signup_button.disabled = false;
                // signup_button.value = "Add Pupil";
            }
        }

        data.type = type;
        var data_string = JSON.stringify(data);

        xml.open("POST", "routes.php", true);
        xml.send(data_string);
    }
    const handleResult = (results) => {
     

        var data = JSON.parse(results);
        if (data.type == "addStaff") {
            var id = data.message;
            localStorage.setItem('userId', id);

            window.location = "./addStaffImage.php";
        }else{
            var r=document.getElementById('err')
            err.innerHTML=data.message;

        }
    }
    document.querySelectorAll('input').forEach( el => {

            el.addEventListener('keydown', e => {
                console.log(e.keyCode);
                if(e.keyCode === 13) {
                    let nextEl = el.nextElementSibling;
                    console.log(nextEl)
                    if(nextEl.nodeName === 'INPUT') {
                        nextEl.focus();
                    }
                }
            })
        })
</script>