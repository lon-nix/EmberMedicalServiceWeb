<?php 

  $title = 'Add Patient';
  require_once 'includes/header.php';
  require_once 'db/conn.php';
  require_once 'includes/auth_admin.php';
  
  

  if(isset($_POST['submit'])){
      //extract values from the $_POST array
      $fname = $_POST['firstName'];
      $lname = $_POST['lastName'];
      $address = $_POST['address'];
      $gender = $_POST['gender'];
      $dob = $_POST['dateofbirth'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $phone = $_POST['phone'];
      $new_password = md5($password.$username);
      
      
      $orig_file = $_FILES["avatar"]["tmp_name"];
      $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
      $target_dir = 'uploads/';
      $destination = "$target_dir$phone.$ext";
      move_uploaded_file($orig_file,$destination);

      $user = $crud->getPatientbyUsername($username);
                
      if($result['num'] > 0){
        $_SESSION['error'] = '<div class="alert alert-warning text-center" role="alert">
        <h4> Error: Username already exist : '.$username.' </h4>
        </div><br><br>';
        //redirect('register.php');
  
          header("Location: addpatient.php");
          
      } else{
                  

        $result = $crud-> getPatientbyEmail($email);

        if($result['num'] > 0){
          
        $_SESSION['error'] = '<div class="alert alert-warning text-center" role="alert">
        <h4> Error: Email already exist : '.$email.' </h4>
        </div><br><br>';
        //redirect('register.php');

          header("Location: addpatient.php");
          
          
      } else{

        //call funcation to insert and track if success or not
        $issuccess = $crud->insertPatient($fname, $lname, $dob, $gender, $address, $phone, $email, $username, $new_password, $destination);
        
        

        if($issuccess){
          
            header("Location: patientlist.php");
        }
        else{
          include 'includes/errormessage.php';
        }
      }
    }

  }
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
                            <h3>Add Patient</h3>
                            <p class="text-subtitle text-muted">Patient Form</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">New Patient</li>
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
                                    <h4 class="card-title">New Patient</h4>
                                    
                                </div>
                                <div class="card-content">
                                <div class="container"> 
                                    <form class="row g-3" method="post" action="" enctype="multipart/form-data">
                                        <div class="col-md-6">
                                            <label for="firstName" class="col-sm-5 col-form-label">First Name</label>
                                            <input required class="form-control" id="firstName" name="firstName">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lastName" class="col-sm-5 col-form-label">Last Name</label>
                                            <input required class="form-control" id="lastName" name="lastName">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="dateofbirth" class="form-label">Date of Birth</label>
                                            <input type="text" class="form-control" id="dateofbirth" name="dateofbirth">
                                        </div>
                                        <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Patient Gender<span class="text-danger">*</span></label>
                                                        <select name="gender" id="gender" class="form-control">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>

                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Contact number</label>
                                            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="Help"> 
                                        </div>        

                                        <div class="col-md-10">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address">
                                        </div>
                                    
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email address<span class="text-danger">*</span></label>
                                            <input required type="email" class="form-control" id="email" name="email" aria-describedby="Help">
                                            
                                        </div>

                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                                            <input  class="form-control" id="username" name="username" aria-describedby="Help">
                                            
                                        </div>

                                        <div class="form-group">
                                                <label for="password">Password<span class="text-danger">*</span></label>
                                                <input required type="password" name="password" id="password" class="form-control" required  data-parsley-trigger="keyup" />
                                            </div>

                                        

                                        <div class="col-md-6">
                                            <label for="avatar" class="form-label">Upload Image (optional)</label>
                                            <input class="form-control" type="file" accept="image/*" id="avatar" name="avatar">
                                        </div> 

                                        
                                        <div class="text-center  p-md-5">
                                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                            <a href="patientlist.php" class="btn btn-secondary">Cancel</a>
                                        </div>    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </setion>
            </div>
        </div>
    </div>

 <?php require_once 'includes/footer.php';?>                    