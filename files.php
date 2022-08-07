<?php


require_once './connection.php';

$DB=new Database();

$info=(object)[];
$err="";

// print_r($_FILES);
// print_r($_POST);

if (empty($_POST['userid'])) {
    $info->message = 'no userid';
        $info->dataType = 'err';
        echo json_encode($info);
    
}else {
    if ($_FILES['file']['name']!="" && $_FILES['file']['error']==0) {

        $folder='./uploads/' ; 
        if (!file_exists($folder)) {
            mkdir($folder,0777,true);
        }  
    
        $destination=$folder.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'],$destination);
    }
    
    
    if ($_POST['type']=='changePupilProfilePic') {
       
        $query=false;
        $data=false;
        
        $image=$destination;
        $userid=$_POST['userid'];
    
        $query="UPDATE students set img='$image' where userid= '$userid'";
        $write1=$DB->write($query,[]);
        if ($write1) {

            $sql=false;
            $sql="SELECT * FROM students WHERE userid ='$userid' LIMIT 1";
            $read=$DB->read($sql,[]);

            if (is_array($read)) {
                
                $read=$read[0];
            $info->message = $read->img;
            $info->type = 'updatePupilProfile';
            echo json_encode($info);

            }else {
                $info->message = 'oops!Something went wrong';
        $info->type = 'err';
        echo json_encode($info);
            }

            
    
        }
    }elseif ($_POST['type']=='changeTeacherProfilePic') {
        $query=false;
        $data=false;
        
        $image=$destination;
        $userid=$_POST['userid'];
    
        $query="UPDATE teachers set img='$image' where userid= '$userid'";
        $write1=$DB->write($query,[]);
        if ($write1) {

            $sql=false;
            $sql="SELECT * FROM teachers WHERE userid ='$userid' LIMIT 1";
            $read=$DB->read($sql,[]);

            if (is_array($read)) {
                
                $read=$read[0];
            $info->message = $read->img;
            $info->type = 'updateTeacherProfile';
            echo json_encode($info);

            }else {
                $info->message = 'oops!Something went wrong';
        $info->datatype = 'err';
        echo json_encode($info);
            }

            
    
        }
        
    }
    elseif ($_POST['type']=='changeStaffProfilePic') {
        $query=false;
        $data=false;
        
        $image=$destination;
        $userid=$_POST['userid'];
    
        $query="UPDATE staff set img='$image' where userid= '$userid'";
        $write1=$DB->write($query,[]);
        if ($write1) {
            

            $sql=false;
            $sql="SELECT * FROM staff WHERE userid ='$userid' LIMIT 1";
            $read=$DB->read($sql,[]);

            if (is_array($read)) {
                
                $read=$read[0];
            $info->message = $read->img;
            $info->type = 'updateStaffProfile';
            echo json_encode($info);

            }else {
                $info->message = 'oops!Something went wrong';
                $info->dataType = 'err';
                echo json_encode($info);
            }

            
    
        }
        
    }
    
}

