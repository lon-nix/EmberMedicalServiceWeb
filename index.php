<?php 
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
    $results = $crud-> getSchedule();
?>
<div class="">
<div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center"
        style= "background-image: url('images/doctor-bg.jpg'); height: 52em; background-size:cover;  background-repeat:no-repeat; background-position: center center;">
        
        
        <div id="intro" class="bg-image shadow-2-strong ">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0);">
                <div class="container d-flex align-items-center justify-content-center text-center h-100">
                    <div class="text-black">
                    
                        <h1 class="mb-3">Ember Medical Service</h1>
                        <h5 class="mb-4">Your Health. Our Priority.</h5> 
                        <a class="btn btn-outline-dark btn-lg m-2" href="register.php"
                        role="button">Sign Up Today!</a>
                    
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<hr>

<div class="container-fluid" id="about">
<div class="col-6 align-center">
                <h2 class="mbr-section-title pb-2 mbr-fonts-style display-2">
                    About Us
                </h2>
            </div>
<div class="bg-white">
    <div class="container" >
            
        
        <div class="row">
            <div class="col-md-6 p-md-5">
                <h2>Who we are and<br>what we do</h2>
                <p class="lead">This is the world's leading portal for<br>easy and quick appointment booking.</p>
            </div>
            
            <div class="col-sm-6 p-md-5 mx-">
                <p class="">Ember Medical Services System is an integrated health care system providing exceptional medical care to our local and global communities. Quality patient care is our priority. Providing excellent clinical and service quality, offering compassionate care, 
                    and supporting research and medical education are essential to our mission.</p>
            </div>
        </div>
    </div>
</div>

  <!-- Groups section start -->
  <section id="groups">
                    <div class="row match-height mt-5" id="team">
                        <div class="col-12 mt-3 mb-1">
                            <h4 class="section-title display-2">Our Team</h4>
                        </div>
                    </div>
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card-group">
                                <div class="card">
                                    <div class="card-content">
                                        <img class="card-img-top img-fluid" src="images/doctor1.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Dr. Myles. B. Abbott, M.D.</h4>
                                            <small class="text-muted">Family Physicians</small>
                                            <p class="card-text">
                                            Adept medical doctor with eight solid years of practice experience. 
                                            Dedicated to exemplary patient outcomes and following all necessary medical procedures with the use of the latest industry equipment and technology.</p>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-content">
                                        <img class="card-img-top img-fluid" src="images/nurse1.jpg"
                                            alt="Card image cap" />
                                        <div class="card-body">
                                            <h4 class="card-title">Dr.Mona.M.Abaza, M.D.</h4>
                                            <small class="text-muted">Internists</small>
                                            <p class="card-text">
                                            Aim to implement my expertise in the field of medicine to cure the sick community and regain the state of health and well-being.
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-content">
                                        <img class="card-img-top img-fluid" src="images/doctor2.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Dr. Fouad. M. Abbas, M.D.</h4>
                                            <small class="text-muted">Anesthesiologists</small>
                                            <p class="card-text">
                                            Competent anesthesiologist with 5 years of experience looks to deploy exceptional 
                                            expertise in a patient focused medical-surgical environment as a Medical Doctor.
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-content">
                                        <img class="card-img-top img-fluid" src="images/nurse2.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Dr. Arthur Reese Abright, M.D.</h4>
                                            <small class="text-muted">Obstetricians</small>
                                            <p class="card-text">
                                            Talented, knowledgeable, and certified medical professional with 10 years of experience in 
                                            cardiology unit interested in working as a Medical Doctor with WeCare Hospital, to contribute top notch services to patients.
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

     <section id="contact">
       <div class="row match-height mt-5 ">
       <div class="container-fluid">

           <h3 class="text-center section-title display-2">Contact Us</h3>
           <p class="text-center w-75 m-auto">We are very prompt with our responses. Please contact us today!</p>
           <div class="row">
             <div class="col-sm-12 col-md-6 col-lg-3 my-5">
               <div class="card border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-phone fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">call us</h4>
                    <p>+876-888-EMBA,+876-888-CARE</p>
                  </div>
                </div>
             </div>
             <div class="col-sm-12 col-md-6 col-lg-3 my-5">
               <div class="card border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-map-marker fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">office loaction</h4>
                   <address>Suite 102, 14 Ocean Blvd, Kingston </address>
                  </div>
                </div>
             </div>
             <div class="col-sm-12 col-md-6 col-lg-3 my-5">
               <div class="card border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-map-marker fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">office loaction</h4>
                    <address>Suite 02, Constant Spring Road, Tropical Plaza </address>
                  </div>
                </div>
             </div>
             <div class="col-sm-12 col-md-6 col-lg-3 my-5 mx-auto">
               <div class="card border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-globe fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">email</h4>
                    <p>http://info@embermedical.com</p>
                  </div>
                </div>
             </div>
           </div>
       </div>
       </div>
    </section>


<div class="container-fluid">
</br>
<?php require_once 'includes/footer.php';?>
</div>