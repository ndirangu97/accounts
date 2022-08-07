<?php
require_once "./connection.php";
$DB = new Database();

$id = $_GET['id'];
$sql = "SELECT * FROM teachers WHERE userid ='$id'";

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

        .t:hover {
            background: #7c7cff;
        }
        .input {
            width: 500px;
            height: 30px;
            border: 1px solid #7c7cff;
        }

        .input:focus {
            outline: 1px solid #7c7cff;
        }

        .d:hover {
            background: red;
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
              flex-direction:row;
              align-items: center;
              justify-content: center;
            ">
                    <div class="leftContainer" style="flex-basis: 30%;">
                        <div style="margin-top: -90px;"><img src="<?php echo $pimage ?>" id="img" style="object-fit: cover;" /></div>

                    </div>
                    <div class="rightContainer " style="flex-basis: 70%;display:flex;flex-direction:column;height:100%;position:relative">
                        <div style="display: flex; justify-content: center; align-items: center;flex-basis:10%;">
                            <h3 style="margin-top: 45px;margin-bottom:30px">Teachers Details</h3>
                        </div>
                        <div style="width: 100%; display: flex; align-items:center; flex-basis:90%;flex-direction:column;padding-top:30px">

                            <div class="card" style="display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:20px">
                                <p style="font-size:20px;margin-right:80px;margin-left:10px;color:#7c7cff"><b>Fullname</b></p>
                                <p style="font-size:20px"> <?php echo $resultSql->name ?></p>
                            </div>
                            <div class="card" style="display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:20px">
                                <p style="font-size:20px;margin-right:70px;margin-left:10px;color:#7c7cff"><b>Telephone</b></p>
                                <p style="font-size:20px"> <?php echo $resultSql->telephone ?></p>
                            </div>
                            <?php
                            if ($resultSql->tsc != "") {
                                echo " <div class='card' style='display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:10px'> <p style='font-size:20px;margin-right:100px;margin-left:20px;color:#7c7cff;';><b>TSC No.</b></p> <p style='font-size:20px'> $resultSql->tsc   </p></div>";
                            }

                            ?>

                            <div class="card" style="display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:20px">
                                <p style="font-size:20px;margin-right:120px;margin-left:10px;color:#7c7cff"><b>ID no.</b></p>
                                <p style="font-size:20px"> <?php echo $resultSql->idno ?></p>
                            </div>

                            <?php
                            if ($resultSql->classteacher == 1) {
                                echo " <div class='card' style='display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:10px'> <p style='font-size:20px;margin-right:80px;margin-left:20px;color:#7c7cff;';><b>ClassTeacher</b></p> <p style='font-size:20px'> $resultSql->class   </p></div>";
                            }

                            ?>
                            <?php
                            if ($resultSql->lang != "") {
                                echo " <div class='card' style='display: flex;width:80%;height:60px;flex-direction:row;align-items:center;overflow:auto'> <p style='font-size:20px;margin-right:80px;margin-left:20px;color:#7c7cff'><b>Teaches</b></p> <p style='font-size:20px;display:inline-block'> $resultSql->lang   </p></div>";
                            }

                            ?>

                            <?php
                            if ($resultSql->disabled == "Yes") {
                                echo " <div class='card' style='display: flex;width:80%;height:50px;flex-direction:row;align-items:center;'> <p style='font-size:10px;margin-right:80px;margin-left:20px;color:#7c7cff'><b>Disability</b></p> <p style='font-size:20px'> $resultSql->disabled   </p></div>";
                            }

                            ?>

                        </div>
                        <div onclick="document.getElementById('dtmodal').style.display='flex'" style="position: absolute; right:20px;top:20px;cursor:pointer">I</div>
                        <div id="dtmodal" style="height: 100px;width:200px;background:#ffffff;position: absolute; right:40px;top:20px;border:1px solid #9999;display:none;flex-direction:column;align-items:center;justify-content:center">
                            <div onclick="window.location=`./addteacherimage2.php?id=${ownid}`" class="t" style="width:100%;height:50px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:1.5s;border-bottom:1px solid  #9999;position:relative">Add Image

                            </div>
                            <div class="t" onclick="window.location=`./addteacher2.php?id=${ownid}`" style="width:100%;height:50px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:1.5s;border-bottom:1px solid  #9999 ">Edit Bio</div>

                            <div class="d" onclick="dels()" style="width:100%;height:50px;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:1.5s">Delete Teacher</div>

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
  
    var input = document.getElementById('ginput').value

    const p = url.replace("http%3A%2F%2Flocalhost%2Ftemplate%2Fmoreteacher.php%3Fid=", "");
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
        //alert(results)
        var info = JSON.parse(results);

        switch (info.type) {
            case 'delete':
                window.location = 'teachers.php?pg=1';
                break;


            default:
                break;
        }

    }

    const dels = () => {
        const ask = confirm(`Do you really want to delete this teacher ?`)


        if (ask) {
            sendData({
                id: ownid

            }, 'deleteTeacher')
        }

    }
</script>