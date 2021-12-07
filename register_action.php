<?php 

  $title = 'Registration complete';
  require_once 'includes/header.php';
  require_once 'db/conn.php';
  require_once 'sendemail.php';
  
  

  if(isset($_POST['submit'])){
      //extract values from the $_POST array
      $fname = $_POST['firstName'];
      $lname = $_POST['lastName'];
      $address = $_POST['address'];
      $gender = $_POST['gender'];
      $dob = date ('Y-m-d H:i:s',strtotime ($_POST['dateofbirth']));
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
      
      if(empty($orig_file )){
        $destination = "";
      }
     
      $user = $crud->getPatientbyUsername($username);
                
      if($user['num'] > 0){
        $_SESSION['error'] = '<div class="alert alert-warning text-center" role="alert">
        <h4> Error: Username : '.$username.' already exist </h4>
        </div><br><br>';
  
          header("Location: register.php");
          
      } else{
                  

        $result = $crud-> getPatientbyEmail($email);

        if($result['num'] > 0){
          
        $_SESSION['error'] = '<div class="alert alert-warning text-center" role="alert">
        <h4> Error: Email already exist : '.$email.' </h4>
        </div><br><br>';

          header("Location: register.php");
          
          
      } else{



        //call funcation to insert and track if success or not
      $issuccess = $crud->insertPatient($fname, $lname, $dob, $gender, $address, $phone, $email, $username, $new_password, $destination);
        
        

        if($issuccess){
          SendEmail::sendMail($email,'Welcome to Ember Medical Service',"Thank you".$fname.' '. $lname." for registering and a big welcome to the Ember Medical Service family.");
          include 'includes/successmessage.php';
        }
        else{
          include 'includes/errormessage.php';
        }  
      } 
    }

  }
?>
 
 <div class="container mt-5">
  <div class="row d-flex justify-content-center">
    <div class="col-md-7">
      <div class="card p-3 py-4">
        <div class="text-center"> <img style="width: 18rem;" src="<?php echo empty($orig_file ) ? 'uploads/userPic.png' : $destination ;?>"class="card-img-top" alt="..."> </div>
          <div class="text-center mt-3"> <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $_POST['email'];?> </span>
              <h5 class="mt-2 mb-0"><?php echo $_POST['firstName'].' '. $_POST['lastName'];?></h5> <span><?php echo $_POST['username'];?></span>
              <div class="px-6 mt-3"> 
                <div class="d-flex  align-items-center flex-column">
                
                    <table> 
                        <tr><th width="40%" class="text-right">Date of Birth:</th><td width="60%"><?php echo $_POST['dateofbirth'];?></td></tr>
                        <tr><th width="40%" class="text-right">Phone</th><td width="60%"><?php echo $_POST['phone'];?></td></tr>
                        <tr><th width="40%" class="text-right">Address</th><td width="60%"><?php echo $_POST['address']?></td></tr>
                    </table>
                </div>
                <div class=" p-md-4">
                    <a href="patient_dashboard.php" class="btn btn-info"><i class="fas fa-book"></i> Appointments</a>
                </div> 
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  

<?php require_once 'includes/footer.php';?>