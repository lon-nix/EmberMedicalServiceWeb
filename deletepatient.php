<?php 

  $title = 'Delete Post';
  
  require_once 'includes/auth_check.php';
  require_once 'db/conn.php';
  if(!$_GET ['id']){

  }else{
      //Get ID values
    $id = $_GET ['id'];

    //Call delete function
    $result = $crud ->deletePatient($id);
    //Reirect to list
    if($result){
        include 'includes/successmessage.php';
        header("Location: patientlist.php");
    }
    else{
        include 'includes/errormessage.php';
    }
  }