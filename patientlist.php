<?php 
    $title = 'Patients';
    require_once 'includes/header.php';
    require_once 'includes/auth_admin.php';
    require_once 'db/conn.php'; 
    $results = $crud-> getPatients();
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
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
                            <h3>Patients</h3>
                            <p class="text-subtitle text-muted">List of patients</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Patient List</li>
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
                                    <h4 class="card-title">Patient list</h4>
                                    <a href="addpatient.php" class="btn btn-success">New <i class="fas fa-plus"></i></a>
                                
                                    
                                </div>
                                <div class="container">
                                <div class="card-content">
                                    
                                    
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                    <table class="table table-striped" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>NAME</th>
                                                    <th>GENDER</th>
                                                    <th>EMAIL</th>
                                                    <th>PHONE</th>
                                                    <th>LOCATION</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php while($r = $results ->fetch(PDO::FETCH_ASSOC)){ ?>
                                                    <tr>
                                                    <td> <?php echo $r['patient_id'];?></td>
                                                    <td><?php echo $r['patientFirstName']." ".$r['patientLastName'];?></td>
                                                    <td><?php echo $r['patientGender'];?></td>
                                                    <td><?php echo $r['patientEmail'];?></td>
                                                    <td><?php echo $r['patientPhone'];?></td>
                                                    <td><?php echo $r['patientAddress'];?></td>
                                                    <td>
                                                        <a href="viewpatient.php?id=<?php echo $r['patient_id'];?>" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                                                        <a href="editpatient_admin.php?id=<?php echo $r['patient_id'];?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a onclick="return confirm('Are you sure you want to delete this record?')" 
                                                        href="deletepatient.php?id=<?php echo $r['patient_id'];?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
                                                    </td>
                                                    
                                                    </tr>
                                                     
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Hoverable rows end -->
            </div>
        </div>
    </div>

<div class="container">
    
 <?php require_once 'includes/footer.php';?>

 </div>