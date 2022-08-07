<?php

require_once "./connection.php";

$DB = new Database();




      
   
//       $date = '2022-06-26 ';
// $convertDate = date('F jS, Y ', strtotime($date));
// echo $convertDate;
     

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
            flex-wrap: wrap;
            height: 520px;
            width: 100%;

            overflow-y: hidden;
        }

        .content-table {
            border-collapse: collapse;
            margin: 0;
            font-size: 0.9em;
            height: 80%;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            font-size: 16px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);

        }

        .content-table thead tr {
            background: #009879;
            color: #ffffff;

            text-align: left;
            font-weight: bold;
        }

        .content-table th,
        .content-table td {
            padding: 10px 15px;

        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody tr:nth-last-of-type(even) {
            background: #b1afaf;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        ::-webkit-scrollbar {
            width: 10px;
            height: 100%;
            background: inherit;
        }

        ::-webkit-scrollbar-thumb {
            height: 20px;
            width: 7px;
            background: grey;
            cursor: pointer;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-track {
            background: inherit;
            width: 10px;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container-scroller" style="height: 100vh">
        <!-- partial:partials/_navbar.html -->
        <?php include './header.view.php'; ?>
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <?php include './nav.view.php'; ?>
            <!-- partial -->
            <div class="bodyWrapper" >
                <div style="display: flex; height: 100%;flex-direction: row;align-items: center;position: relative;" id="cardHolder">

                    <div style="flex-basis:60%;height:100%;display: flex;flex-direction: column;justify-content:flex-start;align-items:center;padding-top:40px">

                        <h5>VOTEHEAD CATEGORIES </h5>
                        <div style="display: flex;flex-direction: column;justify-content:flex-start;align-items:center;margin-top:50px;height:400px;overflow:scroll;width:80%">
                            <div class='card' style='display: flex;width:300px;min-height:50px;flex-direction:row;align-items:center;justify-content:center;margin-bottom:10px;position:relative'>
                                <p style='font-size:20px'> PUPILS </p>
                                
                            </div>
                            <?php 
                             $cate="";
                             $sql = false;
                               $sql = "SELECT  * FROM categories WHERE name != 'PUPILS'";
                               $rese = $DB->read($sql, []);
                               if (is_array($rese )) {
                                 foreach ($rese as $res ) {
                                   echo " 
                                     <div class='card' style='display: flex;width:300px;min-height:50px;flex-direction:row;align-items:center;justify-content:center;margin-bottom:10px;position:relative'>
                         <p style='font-size:20px'> $res->name </p>
                         <div style='position: absolute;top:8px;right:20px'><img onclick='delname(event)' id='$res->name' src='./images/delete.png' style='width:16px;height:16px;cursor:pointer'></div>
                         </div>";
                                  }
                               }
                         
                            ?>
                            
                           

                        </div>


                    </div>

                    <div style="flex-basis:40%;height:100%;display: flex;flex-direction: column;justify-content:flex-start;align-items:center;padding-top:40px"">
                    <h5>VOTEHEAD CATEGORIES SET</h5>
                    <div style="display: flex;flex-direction: column;justify-content:flex-start;align-items:center;margin-top:50px;height:400px;overflow:scroll;width:80%">
                        <div>
                            <p>Category Name :</p>
                        <input id="catname"  type="text" style="width: 240px; border: 1px solid #7c7cff;height:35px;border-radius:4px;padding:10px">
                        </div>
                        
                        <button style="margin-top: 30px;padding:4px 60px;border:1px solid #009879;border-radius:8px;background:#7ed2f3" onclick="category()">Set Category </button>
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

  


        var xml = new XMLHttpRequest();

        xml.onload = function() {
            if (xml.readyState == 4 || xml.status == 200) {
                handleResult(xml.responseText);
                b.style.display = 'none'
                t.innerHTML = 'SET FEES'
            }
        };

        data.type = type;
        var dataString = JSON.stringify(data);
        xml.open("POST", "./routes.php", true);
        xml.send(dataString);
    };
    const handleResult = (results) => {
        alert(results);
        var info = JSON.parse(results);

        switch (info.type) {
            case 'cat':
                location.reload()
                break;
        
            default:
                break;
        }
    };
    


    function category() {
        let catn=document.getElementById('catname').value
        
        if (catn=="") {
            alert("Category name")
        }else{
            sendData({
            name: catn,
            
        }, 'category')
        }

        
    }
    function delname(e) {
        sendData({
            name: e.target.id,
            
        }, 'delcatname')
    }
</script>