<?php 

  $title = 'Edit Doctor';
  require_once 'includes/header.php';
  require_once 'includes/auth_admin.php';
  require_once 'db/conn.php';
  
  $id = $_GET['id'];
  $doctor = $crud -> getDoctorDetails($id);

  if(isset($_POST['submit'])){
    //extract values from the $_POST array
    $name = $_POST['name'];
    $address = $_POST['address'];
    $dob = date ('Y-m-d H:i:s',strtotime ($_POST['dateofbirth']));
    $email = $_POST['email'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    
    

    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$phone.$ext";
    move_uploaded_file($orig_file,$destination);
   
    //call funcation to insert and track if success or not
    $issuccess = $crud->editDoctor($id, $name, $address, $phone, $dob, $email, $username, $destination);

    //Rediret to viewrecords.php
    if($issuccess){
      include 'includes/successmessage.php';
        header("Location: doctor.php");
        $_SESSION['success'] =
        '<div class="alert alert-success alert-dismissible show fade text-center container-fluid">
            <i class="bi bi-check-circle"></i> '.$name.' successfully updated 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else{
      include 'includes/errormessage.php';
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
                            <h3>Edit Doctor</h3>
                            <p class="text-subtitle text-muted">Doctor Info</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Doctor</li>
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
                                    <h4 class="card-title"> Doctor Profile</h4>
                                    
                                </div>
                                <div class="card-content">
                                    <div class="container"> 
                                        <form class="row g-3" method="post" action="" enctype="multipart/form-data">
                                            <div class="col-md-6">
                                                <label for="name" class="col-sm-5 col-form-label">Name</label>
                                                <input required class="form-control" id="name" name="name" value="<?php echo $doctor['doctorName']; ?>">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="dateofbirth" class="form-label">Date of Birth</label>
                                                <input type="text" class="form-control" id="dateofbirth" name="dateofbirth" value="">
                                            </div>
                                            

                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">Contact number</label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $doctor['doctorPhone']; ?>"> 
                                            </div>        

                                            <div class="col-md-10">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $doctor['doctorAddress']; ?>">
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Email address</label>
                                                <input required type="email" class="form-control" id="email" name="email" value="<?php echo $doctor['doctorEmail']; ?>">
                                                
                                            </div>

                                            <div class="col-md-6">
                                                <label for="username" class="form-label">Username</label>
                                                <input  class="form-control" id="username" name="username" value="<?php echo $doctor['username'] ;?>">
                                                
                                            </div>

                                            <div class="col-md-6">
                                                <label for="avatar" class="form-label">Upload Image (optional)</label>
                                                <input class="form-control" type="file" accept="image/*" id="avatar" name="avatar" >
                                            </div> 

                                            
                                            <div class="text-center  p-md-5">
                                                <button type="submit" class="btn btn-primary" name="submit">Save</button>
                                                <a href="doctor.php" class="btn btn-secondary">Cancel</a>
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