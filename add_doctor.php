<?php 
    $title = 'Add Doctor';
    require_once 'includes/header.php';
    require_once 'includes/auth_admin.php';
    require_once 'db/conn.php';
    
    
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
                            <h3>Doctor</h3>
                            <p class="text-subtitle text-muted">Add doctor</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">New Doctor</li>
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
                                    <h4 class="card-title">Doctor</h4>
                                    <a href="add_doctor.php" class="btn btn-success">New <i class="fas fa-plus"></i></a>
                                
                                    
                                </div>
                                <div class="card-content">
                                    <div class="container">

                                        <h1 class="text-center">Add Doctor</h1>

                                        <form method="post" action="add_doctor_action.php" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="Name" class="form-label">Name</label>
                                                <input required class="form-control" id="Name" name="Name">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="dateofbirth" class="form-label">Date of Birth</label>
                                                <input type="text" class="form-control" id="dateofbirth" name="dateofbirth">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="address" class="form-control" id="address" name="address" aria-describedby="Help"> 
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Contact number</label>
                                                <input type="text" class="form-control" id="phone" name="phone" aria-describedby="Help">
                                                
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email address</label>
                                                <input required type="email" class="form-control" id="email" name="email" aria-describedby="Help"> 
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input required class="form-control" class="form-control" id="username" name="username" aria-describedby="Help"> 
                                            </div>

                                            
                                            <div class="mb-3">
                                                <label for="avatar" class="form-label">Upload Image (optional)</label>
                                                <input class="form-control" type="file" accept="image/*" id="avatar" name="avatar">
                                            </div> 

                                            
                                            <div class="text-center  p-md-5">
                                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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