<?php

require_once "./connection.php";

$DATA_RAW = file_get_contents('php://input');
$DATA_OBJECT = json_decode($DATA_RAW);

$info = (object)[];

$DB=new Database();
$mess="";
$mess2="";



$username =""; $password = "";
$Err="";

if (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "login"){
    include "./includes/logininclude.php";

}elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "grade1") {
    include_once "./includes/grade1Include.php";


}

elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "pupilName") {
  include "./includes/pupilname.php";
  

}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "nameteacher") {
  include "./includes/teachername.php";

}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "namestaff") {
  include "./includes/nameStaff.php";

}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "grad") {
  include "./includes/grads.php";

}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "getKitchen") {
  // include "./includes/allnamesinclude.php";
  echo 'gg';
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "getSecurity") {
  // include "./includes/addpupilinclude.php";
  echo '99';
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "getEnvironment") {
  // include "./includes/addteacherinclude.php";
  echo '0';
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "addStaff") {
  include "./includes/addstaffinclude.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "addTeacher") {
  include "./includes/addteacherinclude.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "addPupil") {
 
  include "./includes/addpupilinclude.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "getroll") {
 
  include "./includes/rollinclude.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "getcorrect") {
 
  include "./includes/correctinclude.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "changename") {
 
  include "./includes/changename.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "transferPupil") {
  include "./includes/pupiltransfer.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "deletePupil") {
  include "./includes/deletePupil.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "deleteTeacher") {
  include "./includes/deleteTeacher.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "deleteStaff") {
  include "./includes/deletestaff.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "yearly") {
  include "./includes/yearly.php";
 
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "leave") {
  include "./includes/leave.php";
 
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "setsal") {
  include "./setsalary.php";
 
  
}




  
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function generateuserid()
	{

		$rand = "";
		$randCount = rand(4,60);
		for ($i=0; $i < $randCount; $i++) { 
			
			$r = rand(0,9);
			$rand .= $r;
		}

		return $rand;
	}
