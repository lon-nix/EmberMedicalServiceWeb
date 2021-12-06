<?php 

  $title = 'Appointment List';
  require_once 'includes/header.php';
  require_once 'includes/auth_check.php';
  require_once 'db/conn.php';
  $patient_id = $_SESSION['userid'];
    
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
                            <h3>My Appointment</h3>
                            <p class="text-subtitle text-muted">Appointment</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="patient_dashboard.php">My Profile</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Appointment</li>
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
                                    <h4 class="card-title">My Appointment List</h4> 
                                    <a href="" class="btn-sm btn-success"><i class="fas fa-plus"></i></a>
                                </div>
                                <div class="card-content">
                               
                                    </div>
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <th>Appointment No.</th>
                                            <th>Doctor Name</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>Appointment Day</th>
                                            <th>Appointment Status</th>
                                            <th>Cancel</th>
                                        </tr>
                                            </thead>
                                           
                                            <?php
                                                //Query to find all appointments booked by patient
                                                $res = mysqli_query($con, "select * from appointment a inner join doctorschedule s on a.doctorSchedule_Id = s.schedule_Id 
                                                inner join patient p on a.patient_id = p.patient_id inner  join doctor d on a.doctor_id = d.doctor_id where a.patient_id = $patient_id");
                                                
                                                if ($res==false) {
                                                die("Error running ".mysqli_error($res));
                                                echo '<div class="alert alert-warning text-center" role="alert">
                                                <h4> Error: No Appointments booked.</h4>
                                                </div><br><br>';
                                                }
                                                
                                                
                                                while ($userRow = mysqli_fetch_array($res)) { ?>
                                                <tbody>     
                                                    <td><?php echo $userRow['appt_Id'];?></td>
                                                    <td><?php echo $userRow['doctorName'];?></td>
                                                    <td><?php echo $userRow['scheduleDate'];?></td>
                                                    <td><?php echo date("g.i a", strtotime($userRow['startTime'])).' - ' . date("g.i a", strtotime($userRow['endTime']));?></td>
                                                    <td><?php echo $userRow['scheduleDay'];?></td>
                                                    <td><span class="badge bg-warning"><?php echo $userRow['status'];?></span></td>                                      
                                                    <td>
                                                    <a onclick="return confirm('Are you sure you want to cancel?')" 
                                                        href="deleteappt" class="btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                                    </td>
                                                </tbody>
                                            <?php }?>
                                        
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
 

  


<?php require_once 'includes/footer.php';?>


