<?php 

$title = 'View Doctor';
require_once 'includes/header.php';
require_once 'includes/auth_admin.php';
require_once 'db/conn.php';

$id = $_GET['id'];
$doctor = $crud-> getDoctorDetails($id);

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
                          <h3>View Doctor</h3>
                          <p class="text-subtitle text-muted">Doctor Info</p>
                      </div>
                      <div class="col-12 col-md-6 order-md-2 order-first">
                          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">View Doctor</li>
                              </ol>
                          </nav>
                      </div>
                  </div>
              </div>                                  
            </div>                                  

              <!-- Hoverable rows start -->
            <div class="container mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-7">
                        <div class="card p-3 py-4">
                            <div class="text-center"> <img style="width: 18rem;" src="<?php echo empty($doctor['avatar_path']) ? 'uploads/userPic.png' : $doctor['avatar_path'] ; ?>"class="card-img-top" alt="..."> </div>
                            <div class="text-center mt-3"> <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $doctor['doctorEmail'] ?> </span>
                                <h5 class="mt-2 mb-0"><?php echo $doctor['doctorName']?></h5> <span><?php echo $doctor['username'] ?></span>
                                <div class="px-6 mt-3"> 
                                <div class="d-flex  align-items-center flex-column">
                                
                                    <table> 
                                        <tr><th width="40%" class="text-right">Date of Birth:</th><td width="60%"><?php echo $doctor['doctorDOB']?></td></tr>
                                        <tr><th width="40%" class="text-right">Phone</th><td width="60%"><?php echo $doctor['doctorPhone']?></td></tr>
                                        <tr><th width="40%" class="text-right">Address</th><td width="60%"><?php echo $doctor['doctorAddress']?></td></tr>
                                    </table>
                                </div>
                                <div class=" p-md-4">
                                            <a href="doctor.php" class="btn btn-secondary"><i class="bi bi-back"></i></a>
                                            <a href="editdoctor.php?id=<?php echo $r['doctor_id'];?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
                
                
             <!--  <section class="section">
                  <div class="row" id="table-hover-row">
                      <div class="col-12">
                            <div class="card">
                                
                                <div class="card-content">
                                    
                                    <div class="container"> 
                                        <div class="text-center"> <img style="width: 18rem;" src="<?php// echo empty($doctor['avatar_path']) ? 'uploads/userPic.png' : $doctor['avatar_path'] ; ?>"class="card-img-top" alt="..."> </div>
                                            <fieldset disabled class="align-self-md-center">
                                                <div class="col-md-6">
                                                    <label for="firstName" class="col-sm-5 col-form-label">Name</label>
                                                    <input required class="form-control" value="<?php //echo $doctor['doctorName']; ?>">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="dateofbirth" class="form-label">Date of Birth</label>
                                                    <input type="text" class="form-control" id="dateofbirth" name="dateofbirth" value="<?php //echo $doctor['doctorDOB'];?>">
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label for="phone" class="form-label">Contact number</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php// echo $doctor['doctorPhone'] ?>"> 
                                                </div>        

                                                <div class="col-md-10">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="<?php //echo $doctor['doctorAddress'] ?>">
                                                </div>
                                            
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email address</label>
                                                    <input required type="email" class="form-control" id="email" name="email" value="<?php //echo $doctor['doctorEmail'] ?>">
                                                    
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input  class="form-control" id="username" name="username" value="<?php //echo $doctor['username'] ?>">
                                                    
                                                </div>
                                            </fieldset>
                    
                                                <div class="col-md-8 p-md-4">
                                            
                                                <a href="doctor.php" class="btn btn-secondary">Cancel</a>
                                                </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->


<?php require_once 'includes/footer.php';?>          
                                    
                                    