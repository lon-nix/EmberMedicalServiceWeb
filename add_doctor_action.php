<?php 

  $title = 'Added Doctor';
  require_once 'includes/header.php';
  require_once 'db/conn.php';
  

  if(isset($_POST['submit'])){
      //extract values from the $_POST array
      $name = $_POST['Name'];
      $address = $_POST['address'];
      $dob = date ('Y-m-d H:i:s',strtotime ($_POST['dateofbirth']));
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      
      

      $orig_file = $_FILES["avatar"]["tmp_name"];
      $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
      $target_dir = 'uploads/';
      $destination = "$target_dir$phone.$ext";
      move_uploaded_file($orig_file,$destination);
       

      //call funcation to insert and track if success or not
      $issuccess = $crud->insertDoctor($name, $address, $phone, $dob, $email, $destination);
      

      if($issuccess){
        
        include 'includes/successmessage.php';
      }
      else{
        include 'includes/errormessage.php';
      }

  }
?>

<div class="container mt-5">
  <div class="row d-flex justify-content-center">
    <div class="col-md-7">
        <div class="card p-3 py-4">
            <div class="text-center"> <img style="width: 18rem;" src="<?php echo empty($destination ) ? 'uploads/userPic.png' : $destination ; ?>"class="card-img-top" alt="..."> </div>
              <div class="text-center mt-3"> <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $_POST['email'] ?> </span>
                  <h5 class="mt-2 mb-0"><?php echo $_POST['Name']?></h5> <span></span>
                  <div class="px-6 mt-3"> 
                    <div class="d-flex  align-items-center flex-column">
                    
                        <table> 
                            <tr><th width="40%" class="text-right">Date of Birth:</th><td width="60%"><?php echo $_POST['dateofbirth']?></td></tr>
                            <tr><th width="40%" class="text-right">Phone</th><td width="60%"><?php echo $_POST['phone']?></td></tr>
                            <tr><th width="40%" class="text-right">Address</th><td width="60%"><?php echo $_POST['address']?></td></tr>
                        </table>
                    </div>
                    <div class=" p-md-4">
                      <a href="doctor.php" class="btn btn-secondary"><i class="bi bi-back"></i></a>
                    </div> 
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

   <?php require_once 'includes/footer.php';?>