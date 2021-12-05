<?php 

  $title = 'Added schdule';
  require_once 'includes/header.php';
  require_once 'db/conn.php';
  

  if(isset($_POST['submit'])){
      //extract values from the $_POST array
      $scheduleDate = date ('Y-m-d H:i:s',strtotime ($_POST['doctor_schedule_date']));
      $scheduleDay = date('l', strtotime($_POST['doctor_schedule_date']));
      $startTime = $_POST['doctor_schedule_start_time'];
      $endTime = $_POST['doctor_schedule_end_time'];
      $bookAvail = $_POST['bookavail'];
      $doctor = $_POST['doctor_id'];
      

      //call funcation to insert and track if success or not
      $issuccess = $crud->insertSchedule($scheduleDate, $scheduleDay, $startTime, $endTime, $bookAvail, $doctor);
     

      if($issuccess){
       
        include 'includes/successmessage.php';
        header("Location: doctorschedule.php");
      }
      else{
        include 'includes/errormessage.php';
      }
    }
?>



<?php require_once 'includes/footer.php';?>