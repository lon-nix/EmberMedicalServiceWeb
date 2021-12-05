<?php 
    $title = 'Registration';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
?>


                <h1 class="text-center">Register</h1>
</br>
</br>
            <div class="container"> 
                <form class="row g-3" method="post" action="register_action.php" enctype="multipart/form-data">
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
                        <label for="email" class="form-label">Email address</label>
                        <input required type="email" class="form-control" id="email" name="email" aria-describedby="Help">
                        
                    </div>

                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
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
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                    </div>    
                </form>
            </div>
        
   

 <?php require_once 'includes/footer.php';?>