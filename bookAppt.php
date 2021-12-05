<?php 

  $title = 'Book Appt';
  require_once 'includes/header.php';
  require_once 'includes/auth_check.php';
  require_once 'db/conn.php';
  $patient_id = $_SESSION['userid'];
  
  $patient = $crud-> getPatientDetails($patient_id);
  $schedule_id = $_GET['id'];
  $schedule = $crud-> getScheduleDetails($schedule_id);
  if(isset($_POST['submit'])){
      //extract values from the $_POST array
      
      $doctor_id = $schedule['doctor_id'];
      $appt_Symptom = $_POST['symptom'];
      $appt_Comment ='';
      $status = 'Booked';
           
      
      
      //call funcation to insert and track if success or not
      $issuccess = $crud->insertAppt($schedule_id, $patient_id, $appt_Symptom, $appt_Comment, $status, $doctor_id);
      

      if($issuccess){
        $scheduleStatus = 'Unavailable';
        $crud->editScheduleAvailability($schedule_id, $scheduleStatus);
        include 'includes/successmessage.php';
        header("Location: patient_dashboard.php");
      }
      else{
        include 'includes/errormessage.php';
      }

  }
?>
    <div id="app">
        <?php require_once 'includes/patient_sidebar.php';?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Make Appointment</h3>
                            <p class="text-subtitle text-muted">Appointment Info</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Make Appointment</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Booking </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>                                  

                <!-- Hoverable rows start -->
                <section class="section">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Book Appointment</h4>
                                    
                                </div>
                                <div class="card-content">
                                    <div class="d-flex  align-items-center flex-column">   
                                    <form method="post" id="appointment">
                                            <span id="form_message"></span>
                                            <h4 class="text-center">Patient Details</h4>    
                                            <table class="table table-borderless table-sm">
                                                <tr>
                                                    <th class="text-center" >Patient Name:</th>
                                                    <td ><?php echo $patient['patientFirstName'].' '.$patient['patientLastName'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">Contact No.:</th>
                                                    <td> <?php echo $patient['patientPhone'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">Address:</th>
                                                    <td><?php echo $patient['patientAddress'] ?></td>
                                                </tr>
                                                </table>

                                                    <h4 class="text-center">Appointment Details</h4>
                                                    <table class="table table-borderless table-sm">
                                                                
                                                    
                                                        <tr>
                                                            <th class="text-right">Doctor Name</th>
                                                            <td><?php echo $schedule['doctorName'];?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">Appointment Date</th>
                                                            <td><?php echo $schedule['scheduleDate'];?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">Appointment Day</th>
                                                            <td><?php echo $schedule['scheduleDay'];?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right">Available Time</th>
                                                            <td><?php echo date("g.i a", strtotime($schedule['startTime'])).' - ' . date("g.i a", strtotime($schedule['endTime']));?></td>
                                                        </tr>
                                                        
                                                        </table>
                                                    
                                                    <div class="form-group">
                                                    <label><b>Reason for Appointment</b></label>
                                                    <textarea placeholder="Enter symptom(s) here" name="symptom" id="symptom" class="form-control" required rows="5"></textarea>
                                                </div>
                                                    
                                            
                                                
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-success" name="submit">Book</button>
                                                <a href="patient_dashboard.php" class="btn btn-outline-secondary">Close</a>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

 

  


<?php require_once 'includes/footer.php';?>


