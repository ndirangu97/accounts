<?php
require_once "./connection.php";
$DB = new Database();
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE userid='$id'";

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
            height: 540px;
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

        .t:hover {
            background: #7c7cff;
        }

        .d:hover {
            background: red;
        }

        .fade2 {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
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


                <div class="card" style="
              flex-basis: 94%;
              width: 100%;
              display: flex;
              flex-direction:column;
              align-items: center;
              justify-content: center;
              position:relative
            ">
                    <div style="flex-basis: 5%;width:100%;display:flex;align-items: center;
              justify-content: center;">

                        <button onclick="bio()" style="width: 80px;border: 1px solid #7c7cff ;border-radius: 4px;margin-left:40px;margin-bottom:10px">Bio</button>
                        <button onclick="guard()" style="width: 130px;border: 1px solid #7c7cff ;border-radius: 4px;margin-left:40px;margin-bottom:10px">Guardians</button>
                    </div>
                    <div id="bio" style="flex-basis: 95%;width:100%; flex-direction:row;
                        align-items: center;
                        justify-content: center;
                        position:relative;display:flex">

                        <div class="leftContainer" style="flex-basis: 30%;">
                            <div style="margin-top: -90px;"><img src="<?php echo $pimage ?>" id="img" style="object-fit: cover;" /></div>

                        </div>
                        <div class="rightContainer " style="flex-basis: 70%;display:flex;flex-direction:column;height:100%;position:relative">
                            <div style="display: flex; justify-content: center; align-items: center;flex-basis:10%;">
                                <h3 style="margin-top: 25px;margin-bottom:30px">Pupils Bio</h3>
                            </div>
                            <div style="width: 100%; display: flex; align-items:center; flex-basis:90%;flex-direction:column;padding-top:10px">
                            <?php

                                if ($resultSql->graduated == '1') {
                                    echo "
                                        
                                        <div class='card' style='display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:10px;'>
                                    <p style='font-size:20px;margin-right:40px;margin-left:20px;color:#7c7cff'><b>Graduated</b></p>
                                    <p style='font-size:20px;color:red'>$resultSql->yearleft </p>
                                </div>
                                        ";
                                }
                                ?>
                                <?php

                                if ($resultSql->transferred == '1') {
                                    echo "
                                        
                                        <div class='card' style='display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:10px;'>
                                    <p style='font-size:20px;margin-right:40px;margin-left:20px;color:#7c7cff'><b>Transferred</b></p>
                                    <p style='font-size:20px;color:red'>$resultSql->yeartransferred </p>
                                </div>
                                        ";
                                }
                                ?>

                                <div class="card" style="display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:10px;">
                                    <p style="font-size:20px;margin-right:120px;margin-left:20px;color:#7c7cff"><b>Name</b></p>
                                    <p style="font-size:20px"> <?php echo $resultSql->name ?></p>
                                </div>
                                <div class="card" style="display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:10px">
                                    <p style="font-size:20px;margin-right:120px;margin-left:20px;color:#7c7cff"><b>UPI NO.</b></p>
                                    <p style="font-size:20px"> <?php echo $resultSql->upi ?></p>
                                </div>
                                <div class="card" style="display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:10px">
                                    <p style="font-size:20px;margin-right:130px;margin-left:20px;color:#7c7cff"><b>Class</b></p>
                                    <p style="font-size:20px"> <?php echo $resultSql->class ?> <?php echo $resultSql->stream ?></p>
                                </div>
                                <div class="card" style="display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:10px">
                                    <p style="font-size:20px;margin-right:100px;margin-left:20px;color:#7c7cff"><b>Gender</b></p>
                                    <p style="font-size:20px"> <?php echo $resultSql->gender ?> </p>
                                </div>
                                <?php
                                if ($resultSql->disabled == "Yes") {
                                    echo " <div class='card' style='display: flex;width:80%;height:50px;flex-direction:row;align-items:center;'> <p style='font-size:20px;margin-right:80px;margin-left:20px;color:#7c7cff'><b>Disability</b></p> <p style='font-size:20px'> $resultSql->disabled   </p></div>";
                                }

                                ?>

                            </div>
                            <div style="position: absolute; right:20px;top:20px;cursor:pointer" onclick="document.getElementById('dtmodal').style.display='flex'">I</div>
                            <div style="position: absolute; right:20px;top:50px;cursor:pointer;color:red" onclick="document.getElementById('dtmodal').style.display='none'">X</div>

                            <div id="dtmodal" style="height: 200px;width:200px;background:#ffffff;position: absolute; right:40px;top:20px;border:1px solid #9999;flex-direction:column;align-items:center;justify-content:center;display:none;">
                                <?php
                        
                                    echo '
                                    
                                <div onclick="window.location=`./addpupilimage2.php?id=${ownid}`" class="t" style="width:100%;height:50px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:1.5s;border-bottom:1px solid  #9999;position:relative">Add Image

                                </div>
                                <div class="t" onclick="window.location=`./addpupil2.php?id=${ownid}`" style="width:100%;height:50px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:1.5s;border-bottom:1px solid  #9999 ">Edit Bio</div>
                                <div onclick="transferOpen()" class="t" style="width:100%;height:50px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:1.5s;border-bottom:1px solid  #9999">Change Class</div>
                                <div onclick="leave()" class="t" style="width:100%;height:50px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:1.5s;border-bottom:1px solid  #9999">Transfer School</div>
                                

                                    ';
                                

                                ?>
                                <div class="d" onclick="dels()" style="width:100%;height:50px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:1.5s;border-bottom:1px solid  #9999">Delete pupil</div>



                            </div>
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
                    <div id="guard" style="flex-basis: 95%;width:100%; flex-direction:row;
                        align-items: center;
                        justify-content: space-around;
                        position:relative;display:none">

                        <div style="flex-basis: 45%;height: 60%;border:1px solid #11ad11;border-radius: 8px;flex-direction: column;justify-content: center;align-items: center;display:flex">


                            <div style="display: flex;">
                                <p>Guardian Name:</p>
                                <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left: 20px;" class="input" type="text" placeholder="Guardian Name" value="<?php echo $resultSql->gname ?>" name="g1name" id="" required min="3">
                            </div>
                            <div style="display: flex;">
                                <p>Guardian Phone:</p>
                                <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left: 20px" class="input" value="<?php echo $resultSql->gno ?>" type="text" placeholder="Guardian Phone" name="g1no" id="" required min="3">
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
                        <div style="flex-basis: 45%;height: 60%;border:1px solid #11ad11;border-radius: 8px;flex-direction: column;justify-content: center;align-items: center;display:flex">


                            <div style="display: flex;">
                                <p>Guardian Name:</p>
                                <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left: 20px;" class="input" value="<?php echo $resultSql->g2name ?>" type="text" placeholder="Guardian Name" name="g1name" id="" required min="3">
                            </div>
                            <div style="display: flex;">
                                <p>Guardian Phone:</p>
                                <input style="margin-bottom: 10px;padding-left:20px;border-radius:6px;margin-left: 20px" value="<?php echo $resultSql->g2no ?>" class="input" type="text" placeholder="Guardian Phone" name="g1no" id="" required min="3">
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

                    </div>
                    <input type="text" style="display:none ;" id="ginput" value="<?php echo ($id); ?>" id="">

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
    //   console.log(url);

    var input = document.getElementById('ginput').value

    const p = url.replace("http%3A%2F%2Flocalhost%2Ftemplate%2Fmorepupil.php%3Fid=", "");
    localStorage.setItem("id", input);
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
            case 'transfer':
                location.reload();
                break;
            case 'leave':
                location.reload();
                break;
            case 'delete':
                window.location = 'pupils.php?pg=1';
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
        const ask = confirm(`Do you really want to delete this pupil ?`)


        if (ask) {
            sendData({
                id: ownid

            }, 'deletePupil')
        }

    }
    const transfer = () => {
        let c = document.getElementById('class');
        let s = document.getElementById('stream');

        let cv = c.value;
        let sv = s.value;
        let m = document.getElementById('modal2')
        m.style.display = 'none';

        const ask = confirm(`Do you want to transfer pupil to ${cv} ${sv} ?`)

        if (ask) {
            sendData({
                id: ownid,
                class: cv,
                stream: sv
            }, 'transferPupil')
        }


    }

    const leave = () => {
        let k = confirm(`Do you want to transfer pupil from this school ?`)
        if (k) {
            sendData({
                id: ownid
            }, 'leave')
        }
    }

    function bio() {
        let b = document.getElementById('bio')
        let g = document.getElementById('guard')

        b.style.display = 'flex'
        g.style.display = 'none'
    }

    function guard() {
        let b = document.getElementById('bio')
        let g = document.getElementById('guard')

        b.style.display = 'none'
        g.style.display = 'flex'
    }
</script>