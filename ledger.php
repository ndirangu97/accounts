<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Milimani</title>
    <!-- base:css -->
    <link rel="stylesheet" href="vendors/typicons/typicons.css" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.min.js"></script>
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
            justify-content: space-around;
            align-items: center;
            height: 540px;
            width: 100%;
            overflow-y: hidden;
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


                <div style="width: 80%;height:200px;display: flex;justify-content: space-around;
      align-items: center; flex-direction: row;">
                    <div class='card' style="flex-basis: 45%;height: 100%;display: flex;justify-content: space-around;
      align-items: center; flex-direction: column;">
                        <h5>Download Classes Balances</h5>
                        <div style="display: flex;justify-content: space-between;
      align-items: center; flex-direction: row;">
                            <div>
                                <!-- <label for="class">Class: </label> -->
                                
                                <select name="class" id="class" style="width: 80px;border: 1px solid #7c7cff ;border-radius: 4px;">
                                <option value="all">All</option>
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
                                <!-- <label for="stream">Stream: </label> -->
                        
                                <select name="stream" id="stream" style="width: 80px;border: 1px solid #7c7cff ;border-radius: 4px;">
                                <option value="all">All</option>    
                                <option value="E">E</option>
                                    <option value="T">T</option>
                                    <option value="R">R</option>
                                    <option value="J">J</option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                    <option value="B">B</option>

                                    <option value="C">C</option>
                                    <option value="T">T</option>



                                </select>
                            </div>
                            <div>        <button onclick="pallact()" style="padding: 2px 20px;border:1px solid #009879;border-radius:8px;cursor:pointer;background:#7ed2f3;margin-left:30px">Download</button></div>
                    
                        </div>
                    </div>
                    <div class='card' style="flex-basis: 45%;height: 100%;display: flex;justify-content: space-around;
      align-items: center; flex-direction: column;">
                        <h5>Print Arreas</h5>
                        <div style="display: flex;justify-content: space-between;
      align-items: center; flex-direction: row;">
                            <div>
                                <!-- <label for="class">Class: </label> -->

                                <select name="class" id="class2" style="width: 80px;border: 1px solid #7c7cff ;border-radius: 4px;">
                                    <option value="all">All</option>
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
                                <!-- <label for="stream">Stream: </label> -->

                                <select name="stream" id="stream2" style="width: 80px;border: 1px solid #7c7cff ;border-radius: 4px;">
                                    <option value="all">All</option>
                                    <option value="E">E</option>
                                    <option value="T">T</option>
                                    <option value="R">R</option>
                                    <option value="J">J</option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                    <option value="B">B</option>

                                    <option value="C">C</option>
                                    <option value="T">T</option>



                                </select>
                            </div>
                            <div> <button onclick="pallact54()" style="padding: 2px 20px;border:1px solid #009879;border-radius:8px;cursor:pointer;background:#7ed2f3;margin-left:30px">Download</button></div>

                        </div>
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
        let b = document.getElementById('gif')
        b.style.display = 'block'
        let ib = document.getElementById('imbtn')
        ib.disabled = true
        let iy = document.getElementById('ybtn')
        iy.disabled = true

        var xml = new XMLHttpRequest()

        xml.onload = function() {

            if (xml.readyState == 4 || xml.status == 200) {

                handleResult(xml.responseText)
                let b = document.getElementById('gif')
                b.style.display = 'none'
                ib.disabled = false
                let iy = document.getElementById('ybtn')
                iy.disabled = false

            }
        }

        data.type = type
        var dataString = JSON.stringify(data)
        xml.open("POST", "./routes.php", true)
        xml.send(dataString)
    }
    const handleResult = (results) => {
        alert(results)
        var info = JSON.parse(results);

        switch (info.type) {

            case 'err':
                let ime = document.getElementById('imerr');
                ime.innerHTML = info.message

                break;
            case 'import':
                let im = document.getElementById('imerr');
                im.innerHTML = info.message

                break;
            case 'yearly':

                let imy = document.getElementById('imerr');
                imy.innerHTML = info.message

                break;




            default:
                break;
        }

    }

    function trans() {
        let c = confirm('Are you sure you want to yearly transferr to next class?')

        if (c) {
            sendData({}, 'yearly')
        }
    }

    function getport() {
        let c = confirm('Are you sure you want to import students?')

        if (c) {
            sendData({}, 'import')
        }
    }

    function printact() {
        window.open('download.php')
    }

    function pallact() {
        let c = document.getElementById('class').value
        let s = document.getElementById('stream').value
        
        window.open(`classledger.php?class=${c}&stream=${s}`)
        

    }
    function pallact54() {
        let c = document.getElementById('class2').value
        let s = document.getElementById('stream2').value

        window.open(`arreas.php?class=${c}&stream=${s}`)


    }
</script>