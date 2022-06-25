<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
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
        height: 600px;
        width: 100%;
        overflow-y: hidden;
      }
      
    .content-table{
      border-collapse: collapse;
      margin: 0;
      font-size: 0.9em;
      height: 80%;
      border-radius: 5px 5px 0 0 ;
      overflow: hidden;
      font-size: 16px;
      box-shadow: 0  0 20px rgba(0,0,0,0.15);
     
    }
    .content-table thead tr{
      background: #009879;
      color: #ffffff;
     
      text-align: left;
      font-weight: bold;
    }
    .content-table th,
    .content-table td{
      padding: 10px 15px;
      
    }
    .content-table tbody tr{
      border-bottom: 1px solid #dddddd;
    }
    .content-table tbody tr:nth-last-of-type(even){
      background: #b1afaf;
    }
    .content-table tbody tr:last-of-type{
      border-bottom: 2px solid #009879;
    }
    ::-webkit-scrollbar{
    width: 10px;
    height: 100%;
    background: inherit;
}
::-webkit-scrollbar-thumb{
    height: 20px;
    width: 7px;
    background: grey;
    cursor: pointer;
    border-radius: 4px;
}
::-webkit-scrollbar-track{
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
        <div class="bodyWrapper"  style="height: 100%;">
          <div style="display: flex; height: 100%;flex-direction: column;align-items: center;position: relative;" id="cardHolder">
            <div
              style="
                height: 30px;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 25px;
                position: relative;
               
              "
            >
              <h4 style="letter-spacing: 2px ;">VOTEHEAD</h4>
              <div style="position: absolute;right: 20px;top: 0;" onclick="getModal()"><img src="./images/menu.png" width="30px" height="30px" style="cursor:pointer"></div>
            </div>
            <div id="set" style="height:80px;width: 100%;display: flex;align-items: center;justify-content: center;">

            </div>

            <div style="display: flex; width: 60%;height:400px;justify-content: center;align-items: center;margin-bottom: 80px;flex-direction: column;border: 1px solid #009879; box-shadow: 0  0 20px rgba(0,0,0,0.15);border-radius: 8px;">
            <div style="display: flex;">
              <div style="margin-left: 60px">
                <div><label for="class">Class: </label></div>

                <select
                  name="class"
                  id="cl"
                  style="width: 120px; border: 1px solid #7c7cff;border-radius: 4px;height: 40px;"
                >
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
              <div style="margin-left: 60px">
                <div><label for="month">Month: </label></div>
                <span id="cErr"></span>
                <select
                  name="month"
                  id="clm"
                  style="width: 120px; border: 1px solid #7c7cff;border-radius: 4px;height: 40px;"
                >
                  <option value="january">January</option>
                  <option value="february">February</option>
                  <option value="march">March</option>
                  <option value="april">April</option>
                  <option value="may">May</option>
                  <option value="june">June</option>
                  <option value="july">July</option>
                  <option value="august">August</option>
                  <option value="september">September</option>
                  <option value="october">October</option>
                  <option value="november">November</option>
                  <option value="december">December</option>
                </select>
              </div>
            
              <div style="margin-left: 60px">
                <div><label for="class">Year: </label></div>
                <span id="cErr"></span>
                <input style="border: 1px solid #7c7cff;border-radius: 4px;height: 40px;width: 80px;" value="2022"  min="2019" max="2100"  type="number" name="" id="y">
              </div>
              <div style="margin-left: 40px">
                <div>Fees:  <span id="er" style="color: red;"></span></div>
               
                <input style="border: 1px solid #7c7cff;border-radius: 4px;height: 40px;width: 120px;margin-top: 8px;padding-left: 20px;" type="text" id="cl3" name="" />
              </div>
            </div>


              <div style="margin-top: 60px;display: flex;">
                <div><button id="btn" onclick="setFees()" style="margin-top: 40px;padding:8px 60px;border:1px solid #009879;border-radius:8px"><b>Set Fees</b></button></div>  <div id="gif" style="display: none;"> <img   src="./images/loader.gif" style="height: 30px;width: 30px;margin-left: 10px;"> </div></div>
             
            </div>

            <div id="headModal" style="position: absolute;right: 0;top: 0;height: 100%;width: 400px;z-index: 1;border-top-left-radius: 10px;display: none;flex-direction: column;overflow-y: scroll;border:1px solid #009879;background: #ffffff; ">
              <div style="flex-basis: 8%;display: flex;margin-bottom: 10px;margin-top: 10px;">

                <div style="display:flex;justify-content: center;align-items: center;width: 100%;position: relative;" >
                  <h5>VOTEHEADS SET</h5>
                  <div style="position: absolute;right: 5px;top: 10px;color: red;width: 30px;height: 30px;cursor: pointer;" onclick="document.getElementById('headModal').style.display='none'">X</div>
                </div>
                
              </div>
              <div style="flex-basis: 8%;display: flex;justify-content: space-around;align-items: center;margin-bottom: 10px;">
              
                <div> Year : <input style="width: 80px;height: 30px;border: 1px solid #7c7cff;border-radius: 4px;" type="number" id="hry" min="2019" max="2100"  value="2022" ></div>
                <div style="display: flex;">
                  <div style="display: flex;">
                    <div><label for="class" style="margin-right: 2px;">Class : </label> </div>
    
                    <select
                      name="class"
                      id="hcl"
                      style=" border: 1px solid #7c7cff;border-radius: 4px;height: 30px;width: 80px;"
                    >
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

                </div>
                <button style="width: 80px;height: 30px;border: 1px solid #7c7cff;border-radius: 4px;" onclick="getHead()">Get</button>
              
              </div>
              <div style="display: flex;flex-basis:84% ; justify-content: center;align-items: center;" id="table" >
                
         

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
  var b=document.getElementById('gif')
  var t=document.getElementById('btn')
  const sendData = (data, type) => {
    
    b.style.display='block'
   
    t.innerHTML='Loading....'
    

    var xml = new XMLHttpRequest();

    xml.onload = function () {
      if (xml.readyState == 4 || xml.status == 200) {
        handleResult(xml.responseText);
        b.style.display='none'
        t.innerHTML='SET FEES'
      }
    };

    data.type = type;
    var dataString = JSON.stringify(data);
    xml.open("POST", "./routes.php", true);
    xml.send(dataString);
  };
  const handleResult = (results) => {
    // alert(results);
    var info = JSON.parse(results);

    switch (info.type) {
      case "set":
        let ch = document.getElementById("set");
        ch.style.color='green'
        ch.innerHTML = info.message;
        break;
        case "upfees":
        getHead()
        break;
      case "err":
        let h = document.getElementById("set");
        h.style.color='red'
        h.innerHTML = info.message;
        
        break;
      case "head":
        let t = document.getElementById("table");
        t.innerHTML=info.message
        
        
        break;

      default:
        break;
    }
  };
  const pupilName = (e) => {
    if (e.target.value == "") {
      location.reload();
    } else {
      sendData(
        {
          name: e.target.value,
        },
        "pupilName"
      );
    }
  };
  function setFees() {
    
    let cl = document.getElementById("cl");
    let clm = document.getElementById("clm");
    let y = document.getElementById("y");
    let f = document.getElementById("cl3");

    let clv = cl.value;
    
    let clv3 = f.value;
    let yv = y.value;
    let m=clm.value
   
    if ( clv3=="") {
      let e=document.getElementById('er')
      e.innerHTML='Fees cannot be empty'

      
    }else{
      let cn=window.confirm( `Are you sure you want to set Ksh${clv3} as fees for Class ${clv} Month of ${m}  Year ${yv}`)
      if (cn) {
        sendData(
      {
        class: clv,
        month:m,
        fees: clv3,
           year:yv
      },
      "setFees"
    );
      }

     
    }

   
  }
  function getHead() {
    
    let y=document.getElementById('hry')
    let l=document.getElementById('hcl')
   
    sendData({
      year:y.value,
      class:l.value

    },'gethead')

    
  }
  function getModal() {
    let m=document.getElementById('headModal')
    m.style.display='flex'
    
  }
  // function close() {
  //   alert('hey')
  //   let m=document.getElementById('headModal')
  //   m.style.display='none'
    
  // }
  function headmod(e) {
   
    let m=e.target.id
    let c=e.target.className
    sendData({
      month:m,
      id:c
    },'delhead')
    
  }
</script>
