<?php 

  $title = 'View Patient';
  require_once 'includes/header.php';
  require_once 'includes/auth_admin.php';
  require_once 'db/conn.php';
  
  
  $id = $_GET['id'];
  $patient = $crud-> getPatientDetails($id);

  
?>

<div id="app">
        <?php require_once 'includes/sidebar.php';?>
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
                            <h3>View Patient</h3>
                            <p class="text-subtitle text-muted">Patient Info</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Patient</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>                                  
            </div>                                  

                <!-- Hoverable rows start -->
                <section class="section">
                    <div class="row" id="table-hover-row">
                        <div class="">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Patient Info</h4>
                                    
                                </div>
                                <div class="card-content">
                                    <div class="container"> 
                                        <div class="text-center"> <img style="width: 18rem;" src="<?php echo empty($patient['avatar_path']) ? 'uploads/userPic.png' : $patient['avatar_path'] ; ?>"class="card-img-top" alt="..."> </div>
                                            
                                            <fieldset disabled >
                                                <div class="col-md-4">
                                                    <label for="firstName" class="col-sm-5 col-form-label">First Name</label>
                                                    <input required class="form-control" id="firstName" name="firstName" value="<?php echo $patient['patientFirstName'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="lastName" class="col-sm-5 col-form-label">Last Name</label>
                                                    <input required class="form-control" id="lastName" name="lastName" value="<?php echo $patient['patientLastName'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="dateofbirth" class="form-label">Date of Birth</label>
                                                    <input type="text" class="form-control" id="dateofbirth" name="dateofbirth" value="<?php echo $patient['patientDOB'];?>">
                                                </div>
                                                <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Patient Gender<span class="text-danger"></span></label>
                                                                <select name="gender" id="gender" class="form-control" >
                                                                <option value="<?php echo $patient['patientGender'] ?>"><?php echo $patient['patientGender'] ?></option>	
                                                                </select>
                                                            </div>
                                                        </div>

                                                <div class="col-md-4">
                                                    <label for="phone" class="form-label">Contact number</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $patient['patientPhone'] ?>"> 
                                                </div>        

                                                <div class="col-md-4">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $patient['patientAddress'] ?>">
                                                </div>
                                            
                                                <div class="col-md-4">
                                                    <label for="email" class="form-label">Email address</label>
                                                    <input required type="email" class="form-control" id="email" name="email" value="<?php echo $patient['patientEmail'] ?>">
                                                    
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input  class="form-control" id="username" name="username" value="<?php echo $patient['username'] ?>">
                                                    
                                                </div>
                                            </fieldset>
                                            
                                            <div class="col-md-6 p-md-4">
                                            <div class="buttons"> 
                                                <a href="patientlist.php" class="btn btn-secondary px-4"><i class="bi bi-back"> back</i></a>
                                                <a href="editpatient_admin.php?id=<?php echo $patient['patient_id'];?>" class="btn btn-warning px-4 ms-4"><i class="fas fa-edit"></i> edit</a> </div>
                                            </div>    
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>



 <?php require_once 'includes/footer.php';?>                    