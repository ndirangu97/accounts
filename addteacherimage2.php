<?php
require_once "./connection.php";
$DB = new Database();
$id=$_GET['id'];
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
                    <h5 id="hd">Taechers details saved successfully. Now add Image..</h5>
                </div>
                <div class="card" style="
              flex-basis: 94%;
              width: 100%;
              display: flex;
              flex-direction:row;
              align-items: center;
              justify-content: center;
            ">
                    <div class="rightContainer " style="flex-basis: 70%;display:flex;flex-direction:column;height:100%">
                        <div style="display: flex; justify-content: center; align-items: center;flex-basis:10%;">
                            <h3 style="margin-top: 15px;margin-bottom:30px">Teachers Details</h3>
                        </div>
                        <div style="width: 100%; display: flex; align-items:center; flex-basis:90%;flex-direction:column;padding-top:10px">

                            <div class="card" style="display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:10px">
                                <p style="font-size:20px;margin-right:80px;margin-left:20px;color:#7c7cff"><b>Name</b></p>
                                <p style="font-size:20px"> <?php echo $resultSql->name ?> </p>
                            </div>
                            <div class="card" style="display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:10px">
                                <p style="font-size:20px;margin-right:37px;margin-left:20px;color:#7c7cff"><b>Telephone</b></p>
                                <p style="font-size:20px"> <?php echo $resultSql->telephone ?> </p>
                            </div>
                            <div class="card" style="display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:10px">
                                <p style="font-size:20px;margin-right:74px;margin-left:20px;color:#7c7cff"><b>TSC no.</b></p>
                                <p style="font-size:20px"> <?php echo $resultSql->tsc ?> </p>
                            </div>
                            <div class="card" style="display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:10px">
                                <p style="font-size:20px;margin-right:120px;margin-left:20px;color:#7c7cff"><b>ID</b></p>
                                <p style="font-size:20px"> <?php echo $resultSql->idno ?> </p>
                            </div>
                            
                            <?php
                            if ($resultSql->classteacher == 1) {
                                echo " <div class='card' style='display: flex;width:80%;height:50px;flex-direction:row;align-items:center;margin-bottom:10px'> <p style='font-size:20px;margin-right:80px;margin-left:20px;color:#7c7cff;';><b>ClassTeacher</b></p> <p style='font-size:20px'> $resultSql->class   </p></div>";
                            }

                            ?>
                            <?php
                            if ($resultSql->lang != "") {
                                echo " <div class='card' style='display: flex;width:80%;height:60px;flex-direction:row;align-items:center;margin-bottom:10px'> <p style='font-size:20px;margin-right:80px;margin-left:20px;color:#7c7cff'><b>Teaches</b></p> <p style='font-size:20px'> $resultSql->lang   </p></div>";
                            }

                            ?>
                            
                            <?php
                            if ($resultSql->disabled == "Yes") {
                                echo " <div class='card' style='display: flex;width:80%;height:50px;flex-direction:row;align-items:center;'> <p style='font-size:20px;margin-right:80px;margin-left:20px;color:#7c7cff'><b>Disability</b></p> <p style='font-size:20px'> $resultSql->disabled   </p></div>";
                            }

                            ?>

                        </div>
                    </div>
                    <div class="leftContainer" style="flex-basis: 30%;">
                        <div><img src="<?php echo $pimage ?>" id="img" style="object-fit: cover;" /></div>
                        <div style="margin-top: 15px; display: flex;
    align-items: center;
    flex-direction: column;
    
    justify-content: center;">
                            <input style="display: none" type="file" name="" onchange="changeProfilePic(this.files)" id="file" />
                            <div id="addedS" style="margin-bottom:10px;color:rgb(112, 112, 243);display:none">
                                Teacher's image added successfully
                            </div>
                            <div> <label for="file" id="label" value="no">Add Teacher's Image</label>
                                
                            </div>
                             <a href="./addteacher.php" style="text-decoration: none;"><p  >Next Teacher</p></a>



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
    const goBack = () => {
        window.location = "./addPupil.php";
    };

    var store = document.getElementById('ginput').value

    //function to change profile pic
    const changeProfilePic = (files) => {
        //   alert(files[0].name)
        var myform = new FormData();
        myform.append('file', files[0]);
        myform.append('type', 'changeTeacherProfilePic');
        myform.append('userid', store);


        var xml = new XMLHttpRequest();
        xml.onload = function() {
            if (xml.readyState == 4 || xml.status == 200) {
                handleFileResult(xml.responseText);
            }
        }
        xml.open('POST', 'files.php', true);
        xml.send(myform);

    }

    //func to handle file results
    const handleFileResult = (results) => {

        // alert(results);

        var f = JSON.parse(results);
        switch (f.type) {
            case 'updateTeacherProfile':
                var img = document.getElementById("img");
                var lbl = document.getElementById("lbel");
                var lbl = document.getElementById("addedS");
                var lb = document.getElementById("label");
                var hd = document.getElementById("hd");
                var n = document.getElementById("nxt");

                lb.innerHTML = "Change image";
                hd.innerHTML = "Teachers details completed";
                hd.style.color = "rgb(112, 112, 243)";
                n.style.display = "flex"

                img.src = f.message
                lbl.style.display = "block"


                break;


            default:
                break;
        }
    }
</script>