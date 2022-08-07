<?php

require_once "./connection.php";
$DB = new Database();

$id=$_GET['id'];
$sql = "SELECT * FROM teachers Where userid='$id'";

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
                    <h5>Add Teacher's Details</h5> <span style="color: red;margin-left:20px">
                        <h4 id="err"></h4>
                    </span>
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
                        <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left:20px" class="input" type="text" value="<?php echo ($resultSql->name);?>" name="name" id="" placeholder="Teacher's name" required min="3">
                       </div>

                       <div style="display: flex;justify-content:center;align-items:center">
                        <p>Phone</p>
                        <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left:46px" value="<?php echo ($resultSql->telephone);?>" class="input" type="text" placeholder="Telephone no." name="telephone" id="" required min="3">
                       </div>
                       <div style="display: flex;justify-content:center;align-items:center">
                        <p>Tsc No</p>
                        <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left:43px" value="<?php echo ($resultSql->tsc);?>" class="input" type="text" placeholder="TSC. no" name="tsc" id="" required min="3">
                       </div>
                       <div style="display: flex;justify-content:center;align-items:center">
                        <p>Id no</p>
                        <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left:54px" value="<?php echo ($resultSql->id);?>" class="input" type="text" placeholder="ID no" name="id" id="" required min="3">
                       </div>
                        <div style="display: flex;flex-direction:column">
                            <div style="display: flex;align-items:center;">
                                <h6> Gender:</h6>
                                <div>
                                    <div style="display:flex;align-items:center;margin-left:60px">

                                        <div><input <?php if ($resultSql->gender=='Male') {
                echo('checked');
              } ?> type="radio" id="male" name="gender" value="Male">
                                            <label for="male">Male</label>
                                        </div>
                                        <div style="margin-left: 20px;"><input type="radio" 
                                        <?php if ($resultSql->gender=='Female') {
                echo('checked');
              } ?>
                                        id="female" name="gender" value="Female">
                                            <label for="female">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <div style="display: flex;align-items:center;">
                                <h6> Disability:</h6>


                                <div style="margin-bottom: 4px;display:flex;align-items:center;margin-left:60px">
                                    <div> <input  <?php if ($resultSql->disabled=='No') {
                echo('checked');
              } ?> type="radio" id="no" name="disability" value="No">
                                        <label for="no">No</label><br>
                                    </div>
                                    <div style="margin-left: 20px;"><input  <?php if ($resultSql->disabled=='Yes') {
                echo('checked');
              } ?>  type="radio" id="yes" name="disability" value="Yes">
                                        <label for="yes">Yes</label><br>
                                    </div>



                                </div>
                            </div>
                        </div>
                        Languages Taught: <br>

                        <div style="display: grid;grid-template-columns: repeat(8,1fr);
                            gap: 2px;">
                            <div><input  type="checkbox" id="english" name="english" value="English">
                                <label for="english">Eng</label><br>
                            </div>
                            <div><input type="checkbox" id="math" name="math" value="Math">
                                <label for="math"> Math</label><br>
                            </div>
                            <div><input type="checkbox" id="kiswahili" name="kiswahili" value="Kiswahili">
                                <label for="kiswahili"> Kis</label>
                            </div>
                            <div><input type="checkbox" id="science" name="science" value="Science">
                                <label for="science"> Sci</label>
                            </div>
                            <div> <input type="checkbox" id="s/studies" name="s/studies" value="S/studies">
                                <label for="s/studies"> S/st</label>
                            </div>
                            <div><input type="checkbox" id="cre" name="cre" value="Cre">
                                <label for="cre"> Cre</label>
                            </div>
                            <div> <input type="checkbox" id="pe" name="pe" value="P.E">
                                <label for="pe"> P.E</label>
                            </div>
                            <div><input type="checkbox" id="music" name="music" value="Music">
                                <label for="music"> Music</label>
                            </div>
                            <div><input type="checkbox" id="sign" name="sign" value="Sign Language">
                                <label for="sign"> Sign </label>
                            </div>
                            <div><input type="checkbox" id="home" name="home" value="H/Sci">
                                <label for="home"> H/Sci</label>
                            </div>
                            <div><input type="checkbox" id="agri" name="agri" value="Agriculture">
                                <label for="agri"> Agri</label>
                            </div>


                        </div>
                        
                        <div class="forcheck" style="display: flex;justify-content:space-between">
                            <div style="margin-right: 72px;"> <input type="checkbox" id="classCheckBox" onchange="doalert(this)" name="classteacher" value="classteacher">
                                <label for="classCheckBox" id="lbi"> A ClassTeacher?</label>
                            </div>
                            <div style="display: none;" id="classInput">

                                <div>
                                    <label for="class">Class: </label>
                                    <span id="cErr"></span>
                                    <select name="class" id="class" style="width: 80px;border: 1px solid #7c7cff ;">
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
                                <div style="margin-left: 20px;">
                                    <label for="stream">Stream: </label>
                                    <span id="sErr"></span>
                                    <select name="stream" id="stream" style="width: 80px;border: 1px solid #7c7cff ;">
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

                        </div>

                        <input type="submit" style="  padding: 10px 60px;
                background: rgb(190, 190, 190);
                border-radius: 8px;
                border: none;
                color: rgb(57, 57, 255);
                cursor: pointer;
                margin-top: 20px;" id="submit" value="Save Teacher" onclick=" collectData(event)">



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
    var classInput2 = document.getElementById("classInput2");
    var lb = document.getElementById("lbi");



    var data = {};

    var st = false;
    var st2 = false;

    function doalert(id) {
        if (id.checked) {
            classInput.style.display = "flex";
            data.classteacher = id.value;
            lb.innerHTML = "A classteacher of ?"
            st = true;

        } else {
            classInput.style.display = "none";
            data.classteacher = "";
            st = false;
        }
    }
    function doalert2(id) {
        if (id.checked) {
            classInput2.style.display = "flex";
            data.admin = id.value;
            lb.innerHTML = "A classteacher of ?"
            st2 = true;

        } else {
            classInput2.style.display = "none";
            data.admin = "";
            st2 = false;
        }
    }


    function _(element) {

        return document.getElementById(element);
    }
    var signup_button = _("submit");


    var inputs = document.getElementsByTagName("input");
    var lang = [];


    const collectData = () => {
        
        // signup_button.disabled = true;
        // signup_button.value = "Loading...Please wait..";

        for (var i = 0; i <= inputs.length - 1; ++i) {

            var key = inputs[i].name;

            switch (key) {

                case "name":
                    data.name = inputs[i].value;
                    break;
                case "id":
                    data.id = inputs[i].value;
                    break;

                case "telephone":
                    data.telephone = inputs[i].value;
                    break;
                case "disability":
                    if (inputs[i].checked) {
                        data.disabled = inputs[i].value;
                    }
                    break;

                case "tsc":
                    data.tsc = inputs[i].value;
                    break;
                case "gender":
                    if (inputs[i].checked) {
                        data.gender = inputs[i].value;
                    }
                    break;
                case "english":
                    if (inputs[i].checked) {
                        lang.push(inputs[i].value)
                    }
                    break;
                case "math":
                    if (inputs[i].checked) {
                        lang.push(inputs[i].value)
                    }
                    break;
                case "kiswahili":
                    if (inputs[i].checked) {
                        lang.push(inputs[i].value)
                    }
                    break;
                case "science":
                    if (inputs[i].checked) {
                        lang.push(inputs[i].value)
                    }
                    break;
                case "s/studies":
                    if (inputs[i].checked) {
                        lang.push(inputs[i].value)
                    }
                    break;
                case "cre":
                    if (inputs[i].checked) {
                        lang.push(inputs[i].value)
                    }
                    break;
                case "pe":
                    if (inputs[i].checked) {
                        lang.push(inputs[i].value)
                    }
                    break;
                case "music":
                    if (inputs[i].checked) {
                        lang.push(inputs[i].value)
                    }
                    break;
                case "sign":
                    if (inputs[i].checked) {
                        lang.push(inputs[i].value)
                    }
                    break;
                case "home":
                    if (inputs[i].checked) {
                        lang.push(inputs[i].value)
                    }
                    break;
                case "agri":
                    if (inputs[i].checked) {
                        lang.push(inputs[i].value)
                    }
                    break;

                default:
                    break;







            }
        }

        if (st == true) {
            let ci = document.getElementById("class");
            let si = document.getElementById("stream");

            let a = ci.value;
            let b = si.value;

            let sval = a.concat(b);

            data.class = sval;
        }
       


        var languages = lang.toString()
        data.langu = languages

        sendData(data, "addTeacher");
        alert(JSON.stringify(data))
       

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
// alert(results)

        var data = JSON.parse(results);
        if (data.type == "teacherSaved") {
            var id = data.message;
            localStorage.setItem('userId', id);


            window.location = "./addTeacherImage.php"
        } else {
            var r = document.getElementById('err')
            err.innerHTML = data.message;


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