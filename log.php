<?php


    
if (empty($DATA_OBJECT->username)) {
    $Err="inputs cant be  empty";

}else {
    $username = test_input($DATA_OBJECT->username);
}

if (empty($DATA_OBJECT->password)) {
    $Err="inputs cant be  empty";

}else {
    $password = test_input($DATA_OBJECT->password);
}

if ($Err=="") {

  $sql="SELECT * FROM users where username ='$username'";
  
  $results=$DB->read($sql,[]);
  
  if (is_array($results)) {
    
      $results=$results[0];
      if ($password==$results->password) {
         
          
          $info->type = "login";
          echo json_encode($info);
      }else{
          $passwordErr="Wrong password";
          $info->message =$passwordErr;
          $info->type = "Err";
          echo json_encode($info);
      }
  
  }else
  {
      $usernameErr="Username doesn't exist"; 
      $info->message =$usernameErr;
      $info->type = "Err";
      echo json_encode($info);
  }
}else {
    
      $info->message =$Err;
      $info->type = "Err";
      echo json_encode($info);
    
}
?>