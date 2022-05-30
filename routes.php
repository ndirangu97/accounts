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
    include "./log.php";

}

elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "pupilName") {
  include "./pupilname.php";
  

}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "trans") {
  include "./trans.php";
  

}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "fees") {
  include "./fees.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "delfee") {
  include "./delfee.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "delstmt") {
  include "./delstmt.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "delhead") {
  include "./delhead.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "getfullfees") {
  include "./fullfees.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "payFees") {
  include "./payfees.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "addFees") {
  include "./addfees.php";
  
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "setFees") {
    include_once "./setfees.php";
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "stmt") {
  include_once "./stmt.php";
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "yearly") {
  include_once "./yearly.php";
 
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "import") {
  include_once "./import.php";
  
 
}
elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "gethead") {
  include_once "./gethead.php";
  
 
}


elseif (isset($DATA_OBJECT->type) && $DATA_OBJECT->type == "deletePupil") {
  include "./includes/deletePupil.php";
  
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
