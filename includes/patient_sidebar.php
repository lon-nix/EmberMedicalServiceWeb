<?php 

  $patient_id = $_SESSION['userid'];
  
  $patient = $crud-> getPatientDetails($patient_id);

?>

<div id="app">
    <div id="sidebar" class="active" style="width: 280px;">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between mt-5">
                    <div class="logo mt-3">
                        <a href="index.php"><img style="width: 250px; height: 80px;" src="assets/images/logo/EmberLogo.png" alt="Logo" srcset=""></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    
                    <li class="sidebar-title">
                    <div class="card" >
                        <img src="<?php echo empty($patient['avatar_path']) ? 'uploads/userPic.png' : $patient['avatar_path'] ; ?>"class="card-img-top" alt="..." style="width: 15rem;"> 
                       
                        <div class="card-body" style="width: 18rem;">
                            <h5 class="card-title"><?php echo $patient['patientFirstName'].' '.$patient['patientLastName'] ;?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"></h6>
                            
                            <p class="card-text">Date of Birth: <?php echo date ('Y-m-d',strtotime ($patient['patientDOB']));?></p>
                            <p class="card-text">Phone: <?php echo $patient['patientPhone'] ;?></p>
                            <p class="card-text">Email: <?php echo $patient['patientEmail'];?></p>  
                            
                        </div>
                        
                    </div>
                    </li>
                    
                    <li class="sidebar-item active ">
                        <a href="patient_dashboard.php" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>



                    <li class="sidebar-item">
                        <a href="patientProfile.php" class='sidebar-link'>
                        <i class="fa fa-user"></i>
                            <span>My Profile</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="patientapptlist.php" class='sidebar-link'>
                            <i class="fa fa-calendar"></i>
                            <span>My Appointment</span>
                        </a>
                    </li>
                </ul>
        </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
     </div>
</div>