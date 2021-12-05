<?php 
    $title = 'User login';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
    //If data was submitted via a form POST request, then...
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $new_password = md5($password.$username);

     

    $result = $user->getUser($username,$new_password);
    /* $sql="select * from patient where username='".$username."' AND password='".$new_password."' ";

    $patient =mysqli_query($con,$sql);
  
    $row=mysqli_fetch_array($patient); */
    /*if(!$result){
        echo '<div class="alert alert-danger">Incorrect Username or Password</div>';
    }else if($username='admin'){
        $_SESSION['admin'] = $username;
        $_SESSION['adminid'] = $result['id'];
        header("Location: dashboard.php");
    } */
    $user = $crud->loginPatient($username,$new_password);
    if($user){

      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $user['patient_id'];
      
      header("Location: patient_dashboard.php");
      
    }elseif($result){
      $_SESSION['admin'] = $username;
      $_SESSION['adminid'] = $result['id'];
      header("Location: dashboard.php");
  }else{
    echo '<div class="alert alert-danger text-center">Incorrect Username or Password</div>';
  }

  }
?>

<h1 class="text-center"><?php echo $title ?> </h1>

 <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="images/login.png" class="img-fluid"
          alt="Sample image">
      </div>

      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
         
          <div class="form-outline mb-4">
            <label class="form-label" for="username">Username</label>
            <input type="text" name= "username" id="username" class="form-control form-control-lg" 
            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>"/>
            
          </div>

         
          <div class="form-outline mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" name= "password" id="password" class="form-control form-control-lg"/>
            
          </div>

            <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" value="Login" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>

                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                    class="link-danger">Register</a></p>
          </div>

        </form>
      </div> 
    </div> 
  </div> 

  <div class="container-fluid">
</br>
<?php require_once 'includes/footer.php';?>
</div>

     