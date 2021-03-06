<?php 

  $title = 'Patient Profile';
  require_once 'includes/header.php';
  require_once 'includes/auth_check.php';
  require_once 'db/conn.php';
  $patient_id = $_SESSION['userid'];
  
  $patient = $crud-> getPatientDetails($patient_id);

  if(isset($_POST['submit'])){
    //extract values from the $_POST array
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $dob = date ('Y-m-d',strtotime ($_POST['dateofbirth']));
    $email = $_POST['email'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    
    

    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$phone.$ext";
    move_uploaded_file($orig_file,$destination);

    if(empty($orig_file )){
        $destination = "";
      }
   
    //call funcation to insert and track if success or not
    $issuccess = $crud->editPatient($patient_id, $fname, $lname, $dob, $gender, $address, $phone, $email, $username, $destination);

    //Rediret to viewrecords.php
    if($issuccess){
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
                            <h3>My Profile</h3>
                            <p class="text-subtitle text-muted">Profile Info</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                                    <h4 class="card-title">Profile</h4>
                                    
                                </div>
                                <div class="card-content">
                                    <div class="container"> 
                                        <form class="row g-3" method="post" action="" enctype="multipart/form-data">
                                            <div class="col-md-6">
                                                <label for="firstName" class="col-sm-5 col-form-label">First Name</label>
                                                <input required class="form-control" id="firstName" name="firstName" value="<?php echo $patient['patientFirstName'] ?>">
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <label for="lastName" class="col-sm-5 col-form-label">Last Name</label>
                                                <input required class="form-control" id="lastName" name="lastName" value="<?php echo $patient['patientLastName'] ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="dateofbirth" class="form-label">Date of Birth</label>
                                                <input type="text" class="form-control" id="dateofbirth" name="dateofbirth" value="<?php echo date ("d-m-Y",strtotime ($patient['patientDOB']));?>">
                                            </div>
                                            <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Patient DOB<span class="text-danger"></span></label>
                                                            <select name="gender" id="gender" class="form-control">
                                                            <option value=""><?php echo $patient['patientGender'] ?></option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">Contact number</label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $patient['patientPhone'] ?>"> 
                                            </div>        

                                            <div class="col-md-10">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $patient['patientAddress'] ?>">
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Email address</label>
                                                <input required type="email" class="form-control" id="email" name="email" value="<?php echo $patient['patientEmail'] ?>">
                                                
                                            </div>

                                            <div class="col-md-6">
                                                <label for="username" class="form-label">Username</label>
                                                <input  class="form-control" id="username" name="username" value="<?php echo $patient['username'] ?>">
                                                
                                            </div>

                                            <div class="col-md-6">
                                                <label for="avatar" class="form-label">Upload Image (optional)</label>
                                                <input class="form-control" type="file" accept="image/*" id="avatar" name="avatar" >
                                            </div> 

                                            <div class="text-center  p-md-5">
                                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                <a href="patient_dashboard.php" class="btn btn-secondary">Cancel</a>
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

 <?php require_once 'includes/footer.php';?>                    