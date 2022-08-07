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
            height: 540px;
            width: 100%;
            flex-direction: column;
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
            min-height: 400px;
        }

        .content-table thead tr {
            background: #009879;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
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

        .content-table th,
        .content-table td {
            padding: 10px 15px;
            text-align: center;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
            cursor: pointer;
        }


        .content-table tbody tr:nth-last-of-type(even) {
            background: #b1afaf;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
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
                <div style="height: 40px;width:100%;display: flex;justify-content:center;align-items:center;">
                    <div>
                        <label for="class">Class: </label>
                        <span id="cErr"></span>
                        <select name="class" id="class" style="width: 80px;border: 1px solid #7c7cff ;border-radius: 4px;">
                            <option value="7">7</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>

                            <option value="8">8</option>
                        </select>
                    </div>
                    <div style="margin-left: 20px;">
                        <label for="stream">Stream: </label>
                        <span id="sErr"></span>
                        <select name="stream" id="stream" style="width: 80px;border: 1px solid #7c7cff ;border-radius: 4px;">
                            <option value="R">R</option>
                            <option value="J">J</option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                            <option value="B">B</option>
                            <option value="G">G</option>
                            <option value="C">C</option>
                            <option value="T">T</option>

                            <option value="E">E</option>

                        </select>
                    </div>
                    <div>
                        <button style="width: 80px;border: 1px solid #7c7cff ;border-radius: 4px;margin-left:40px;margin-bottom:10px" onclick="getroll()">Get</button>
                    </div>
                    <div>
                        <button onclick="getprint()" style="width: 80px;border: 1px solid #7c7cff ;border-radius: 4px;margin-left:40px;margin-bottom:10px">Print</button>
                    </div>



                </div>
                <div style="height: 510px;width:100%;overflow:auto" id="dtable">
                    

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
            case 'roll':
                let t = document.getElementById('dtable');
                t.innerHTML=info.message;
              

                break;
            case 'error':
      
                t.innerHTML=info.message;
              

                break;



            default:
                break;
        }

    }
    function getroll() {
        let c=document.getElementById('class').value
        let s=document.getElementById('stream').value

        sendData({
            class:c,
            stream:s
        },'getroll')
    }

    function getprint() {
        let c=document.getElementById('class').value
        let s=document.getElementById('stream').value
       window.open(`download.php?class=${c}&stream=${s}`,'printpage')
    }
</script>