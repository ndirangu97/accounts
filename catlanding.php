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
            justify-content: space-around;
            align-items: center;
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
            <div class="bodyWrapper">
                <a href="./assigncategory.php" class="card" style="height: 140px;width:500px;cursor:pointer; display: flex;  justify-content: center;
            align-items: center;text-decoration:none">
                        ASSIGN PUPIL TO CATEGORY
                </a>
                <a href="./pupilcategory.php" class="card" style="height: 140px;width:500px;cursor:pointer; display: flex;  justify-content: center;
            align-items: center;text-decoration:none">
                         PUPILS  CATEGORY LIST
                </a>
                <a href="./categories.php" class="card" style="height: 140px;width:500px;cursor:pointer; display: flex;  justify-content: center;
            align-items: center;text-decoration:none">
                        NEW CATEGORY
                </a>
                
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
        let catn = document.getElementById('catname').value
        let catf = document.getElementById('catfees').value
        if (catn == "" || catf == "") {
            alert("Category name or fees can't be empty")
        } else {
            sendData({
                name: catn,
                fees: catf
            }, 'category')
        }


    }
</script>