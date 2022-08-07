<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./dashboard.css">
</head>

<body>
    <div class="logoHolder">
        <img class="logo" src="./images/campuslogo.png" alt="">
    </div>
    <div class="container">
        <a href="./students.php">STUDENTS</a>
        <a href="./teachers.php">TEACHERS</a>
        <a href="./staff.php">STAFF</a>
        <a href="./marks.php">MARKS</a>

    </div>
    <div class="add">
        <img onclick="document.getElementById('id01').style.display='block'" src="./images/outline_add_black_24dp.png" title="Add">

    </div>
    <!-- The Modal -->
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

        <div class="modHeader"><h3>ADD</h3></div>

        <div>
            <div class="entry" onclick="addPupil()">PUPIL</div>
            <div class="entry" onclick="addTeacher()">TEACHER</div>
            <div class="entry" onclick="addStaff()">STAFF</div>
        </div>
       
       
    </div>
</body>

</html>
<script>
function addPupil() {
    window.location="./addPupil.php"
}
function addTeacher() {
    window.location="./addTeacher.php"
}
function addStaff() {
    window.location="./addStaff.php"
}

</script>