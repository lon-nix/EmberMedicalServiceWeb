<?php 
    $title = 'Available Appointment';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    $_SESSION['userid'];
    
    
    $results = $crud-> getSchedule();
    
    $patient = $crud-> getPatientDetails($_SESSION['userid']);
?>


<div id="app">
    <div><?php require_once 'includes/patient_sidebar.php';?> </div>
    
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
                            <h3>Doctors Schedule List</h3>
                            <p class="text-subtitle text-muted">Available Appointment</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Schedule</li>
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
                                    <h4 class="card-title">Doctor's Schedule</h4>  
                                </div>
                                <div class="card-content">
                                    <div class="card">
                                        <form method="post" action="">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <th>Doctor Name</th>
                                                            <th>Appointment Date</th>
                                                            <th>Appointment Day</th>
                                                            <th>Available Time</th>
                                                            <th>Action</th>
                                                            
                                                        </thead>
                                                        <tbody>
                                                    
                                                        
                                                            <?php while($r = $results ->fetch(PDO::FETCH_ASSOC)){ 
                                                                
                                                                if ($r['bookAvail'] =='Available') {
                                                                    
                                                                ?>
                                                                    <tr>
                                                                        
                                                                    <td><?php echo $r['doctorName'];?></td>
                                                                    <td><?php echo $r['scheduleDate'];?></td>
                                                                    <td><?php echo $r['scheduleDay'];?></td>
                                                                    <td><?php echo date("g.i a", strtotime($r['startTime'])).' - ' . date("g.i a", strtotime($r['endTime']));?></td>
                                                                    <td><a type="button" href="bookAppt.php?id=<?php echo $r['schedule_Id'];?>" class="btn btn-primary btn-sm">Get Appointment</a></td>  
                                                                    <!-- <td><a href="#<?php //echo $r['schedule_Id'];?>" id="get_appointment" class="btn btn-primary">Get Appointment</a></td>-->
                                                                
                                                                    </tr>
                                                                <?php } ?> 
                                                                <?php } ?> 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                </section>
            </div>
        </div>
    </div>


<!-- <div id="appointmentModal" class="modal" role="dialog">
  	<div class="modal-dialog">
    	<form method="post" id="appointment">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title">Make Appointment</h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>
        		<div class="modal-body">
        			<span id="form_message"></span>
                    <div id="appointment_detail">
                    <div class="panel panel-default">
                    <h4 class="text-center">Patient Details</h4>                               
		                <table class="table">
                        <tr>
                            <th width="40%" class="text-right">Patient Name:</th>
                            <td><?php //echo $patient['patientFirstName'].' '.$patient['patientLastName'] ?></td>
                                </tr>
                                <tr>
                                    <th width="40%" class="text-right">Contact No.:</th>
                                    <td> <?php //echo $patient['patientPhone'] ?></td>
                                </tr>
                                <tr>
                                    <th width="40%" class="text-right">Address:</th>
                                    <td><?php //echo $patient['patientAddress'] ?></td>
                            </tr>
					</table>
                   
                    
                    <h4 class="text-center">Appointment Details</h4>
                    <table class="table">
                                
                    
                        <tr>
                            <th width="40%" class="text-right">Doctor Name</th>
                            <td><?php //echo $r['doctorName'];?></td>
                        </tr>
                        <tr>
                            <th width="40%" class="text-right">Appointment Date</th>
                            <td><?php //echo $schedule['doctorName'];?></td>
                        </tr>
                        <tr>
                            <th width="40%" class="text-right">Appointment Day</th>
                            <td><?php //echo $schedule['doctorName'];?></td>
                        </tr>
                        <tr>
                            <th width="40%" class="text-right">Available Time</th>
                            <td><?php //echo $schedule['doctorName'];?></td>
                        </tr>
                        
                        </table>
                    </div>
                    <div class="form-group">
                    	<label><b>Reason for Appointment</b></label>
                    	<textarea name="symptom" id="symptom" class="form-control" required rows="5"></textarea>
                 </div>
                    
        		</div>
                
        		<div class="modal-footer">
          			<input type="hidden" name="hidden_doctor_id" id="hidden_doctor_id" />
          			<input type="hidden" name="hidden_doctor_schedule_id" id="hidden_doctor_schedule_id" />
          			<input type="hidden" name="action" id="action" value="book_appointment" />
          			<input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Book" />
          			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div> -->



<?php require_once 'includes/footer.php';?>
<script type="text/javascript">
 $(document).on('click', '#get_appointment', function(){
        $('#appointmentModal').modal('show');
  
});
</script>
