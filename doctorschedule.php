<?php 
    $title = 'Patients';
    require_once 'includes/header.php';
    
    require_once 'db/conn.php'; 
    $results = $crud-> getSchedule();
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
                            <h3>Doctor's Schedule</h3>
                            <p class="text-subtitle text-muted">Schedule list</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Schedule</li>
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
                                    <h4 class="card-title">Doctor's Schedule List</h4>
                                    <a href="addschedule.php" class="btn btn-success">New <i class="fas fa-plus"></i></a>
                                </div>
                                <div class="card-content">
                                    <div class="container">
                                    
                                    
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="table1">
                                            <thead>
                                            <th>Doctor's Name</th>
                                            <th>Schedule Date</th>
                                            <th>Schedule Day</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                            </thead>
                                            <tbody>
                                            <?php while($r = $results ->fetch(PDO::FETCH_ASSOC)){ ?>
                                                    <tr>
                                                    <td><?php echo $r['doctorName'];?></td>
                                                    <td><?php echo $r['scheduleDate'];?></td>
                                                    <td><?php echo $r['scheduleDay'];?></td>
                                                    <td><?php echo $r['startTime'];?></td>
                                                    <td><?php echo $r['endTime'];?></td>
                                                    <?php if($r['bookAvail'] =='Available'){
                                                        echo '<td><span class="badge bg-success">Available</span> </td>';
                                                        }else{
                                                            echo '<td><span class="badge bg-secondary">Unavailable</span> </td>';
                                                        }?> 
                                                    <!-- <td><?php //echo $r['bookAvail'];?></td> -->
                                                    
                                                    <td>
                                                        <!-- <a href="view.php?id=<?php //echo $r['schedule_Id'];?>" class="btn btn-primary"><i class="fas fa-eye"></i></a> -->
                                                        <a href="editschedule.php?id=<?php echo $r['schedule_Id'];?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a onclick="return confirm('Are you sure you want to delete this record?')" 
                                                        href="deleteschedule.php?id=<?php echo $r['schedule_Id'];?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
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
                    </div>
                </section>
                <!-- Hoverable rows end -->

                
            </div>
        </div>
    </div>

 <?php require_once 'includes/footer.php';?>