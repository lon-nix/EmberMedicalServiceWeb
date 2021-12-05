<?php 
//This includes the seesuin file. This file contains code that starts/resumes a session.
//by having it in the header file. It will be included on every page, allowing session capability to be used on every page across the website.
  include_once 'includes/session.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="css/site.css">
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" 
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
 <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 -->
    <!-- JQuery CSS -->
    <link href="assets/css/time/bootstrap-clockpicker.css" rel="stylesheet">
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <!-- Dashboard styling -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.css"> 

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
     <link rel="stylesheet" href="assets/css/app.css"> 
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"> -->
   
    <title>Ember Medical Service - <?php echo $title ?> </title>
  </head>
  <body>
    
    <div class="container-fluid">
       <nav class="navbar sticky-top navbar-expand-lg  navbar-dark bg-primary p-md-3">
        <div class="container-fluid">
          <a href="index.php"><img style="width: 50px; height: 50px;" src="assets/images/logo/LogoIcon.png" alt="Logo" srcset=""></a> 
          <a class="navbar-brand" href="index.php">Ember Medical Service </a> 
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="patient_dashboard.php">Book Appointment</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="./#about">About Us</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="./#contact">Contact Us</a>
                </li>
              </ul>
         
        
            <?php 
             if(!isset($_SESSION['userid']) && !isset($_SESSION['adminid']) )
             {
                  // session has been started
            
            ?>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="register.php">Register</a>
              </li> 
            </ul>
            <?php } else
              if(isset($_SESSION['userid'])) { ?>
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" href="patient_dashboard.php">Hello <?php echo $_SESSION['username'] ?>!</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout <span class="sr-only"></span></a>
              </li> 
            </ul>         
            <?php } else
              if(isset($_SESSION['adminid'])) { ?>
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" href="dashboard.php">Hello <?php echo $_SESSION['admin']; ?>!</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout <span class="sr-only"></span></a>
              </li> 
            </ul>         
            <?php } ?>
          </div>
        </div>  
      </nav> 
    </div>
     