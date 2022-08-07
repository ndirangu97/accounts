<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="leftcol">
            <div class="leftHolder">
                <img src="./images/milimani.jpg" style="object-fit: contain;" alt="">
                <p>MILIMANI PRIMARY SCHOOL</p>
                <p>P.O.BOX 804 Naivasha</p>
            </div>
        </div>
        <div class="rightcol">
            <div class="formHolder">
                <p>Login</p>
                <form action="" id="form">
                    <div class="error" id="usernameErr"></div>
                    <input type="text" name="username" placeholder="username" id="">
                    <div class="error" id="passwordErr"></div>
                    <input type="password" name="password" placeholder="password" id="">

                    <input type="submit" value="Login" id="submit" onclick="signInUser(event)">
                </form>
            </div>

        </div>
    </div>

</body>

</html>
<script>
    var form = document.getElementById('form')
    var inputs = form.getElementsByTagName('input')
    var uErr = document.getElementById('usernameErr')
    var pErr = document.getElementById('passwordErr')
    var data = {}

    //to collect user signin data 
    const signInUser = (e) => {


        e.preventDefault();

        for (let index = 0; index < inputs.length - 1; index++) {

            var key = inputs[index].name

            switch (key) {
                case 'username':
                    data.username = inputs[index].value

                    break;

                case 'password':
                    data.password = inputs[index].value
                    break;

                default:
                    break;
            }

        }

        sendData(data, 'login')
      
    }

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
            case 'Err':
                uErr.innerHTML = info.message;

                break;
            case 'login':
                window.location = "./index.php";

                break;


            default:
                break;
        }

    }
</script>