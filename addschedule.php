<?php 
    $title = 'Add Doctor Schedule';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
    $results = $crud-> getDoctors();
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
                            <h3>Add Schedule</h3>
                            <p class="text-subtitle text-muted">Schedule</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Schedule</li>
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
                                    <h4 class="card-title">Schedule</h4>
                                    
                                </div>
                                <div class="card-content">
                                    <div class="container"> 
                                        <form method="post" action="doctorschedule_action.php" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Select Doctor</label>
                                                <select name="doctor_id" id="doctor_id" class="form-select" required>
                                                    <option value=""> </option>
                                                        <?php while($r = $results ->fetch(PDO::FETCH_ASSOC)){ ?>
                                                            <option value= "<?php echo $r['doctor_id']?>"><?php echo $r['doctorName'];?></option>
                                                        <?php } ?>
                                                </select>    
                                            </div>
                                            
                                            <div class="form-group">
                                                    <label>Schedule Date</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar fa-2x"></i></span>
                                                        </div>
                                                        <input type="text" name="doctor_schedule_date" id="doctor_schedule_date" class="form-control"  />
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Start Time</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-clock fa-2x"></i></span>
                                                            </div>
                                                            <input type="text" name="doctor_schedule_start_time" id="doctor_schedule_start_time" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#doctor_schedule_start_time" required onkeydown="return false" onpaste="return false;" ondrop="return false;" autocomplete="off" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>End Time</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-clock fa-2x"></i></span>
                                                            </div>
                                                            <input type="text" name="doctor_schedule_end_time" id="doctor_schedule_end_time" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#doctor_schedule_end_time" required onkeydown="return false" onpaste="return false;" ondrop="return false;" autocomplete="off" />
                                                        </div>
                                                    </div>

                                                

                                                    <div class="form-group">
                                                        <label>Availabilty</label>
                                                        <select name="bookavail" id="bookavail" class="form-select" required>
                                                            <option value=""> </option>
                                                            <option value="Available"> Available </option>
                                                            <option value="Unavailable"> Unavailable </option>
                                                        </select>    
                                                    </div>
                                                </div>
                                            <div class="text-center  p-md-5">
                                                <button type="submit" class="btn btn-primary" name="submit">Save</button>
                                                <a href="doctorschedule.php" class="btn btn-secondary">Cancel</a>
                                            </div> 
                                        
                                        </form>
                                    </div>  
                                </div>  
                            </div>  
                         </div>  
                    </div>  
                </secton>
            </div>                          
        </div>  
    </div>  
                
<?php require_once 'includes/footer.php';?>