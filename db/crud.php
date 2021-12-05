 <?php 
    class crud {
        //private databes object
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        //function to insert a new record into the attendee database
        public function insertPatient($fname, $lname, $dob, $gender, $address, $phone, $email, $username, $password, $avatar_path){
            try {
                $result = $this->getPatientbyUsername($username);
                
                if($result['num'] > 0){
                    return false; 
                    
                } else{
                    

                $sql = "INSERT INTO patient (patientFirstName, patientLastName, patientDOB, patientGender, patientAddress, patientPhone, patientEmail, username, password, avatar_path) 
                VALUES(:fname, :lname, :dob, :gender, :address, :phone, :email, :username, :password, :avatar_path)";
                $stmt = $this->db->prepare($sql);

                
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':gender',$gender);
                $stmt->bindparam(':address',$address);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$password);
                $stmt->bindparam(':avatar_path',$avatar_path);
                //execute statement
                $stmt->execute();
                return true;
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getPatients(){
            try {
                $sql = "SELECT * FROM `patient`";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
                
                
        }

        public function loginPatient($username,$password){
            try{
                $sql = "select * from patient where username = :username AND password = :password ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
           }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getPatientbyUsername($username){
            try{
                $sql = "select count(*) as num from patient where username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username',$username);
                
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
            }
        }


        public function getPatientbyEmail($email){
            try{
                $sql = "select count(*) as num from patient where patientEmail = :email";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email',$email);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
            }
        }

        public function getPatientDetails($id){
            try {    
                $sql = "select * from patient where patient_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        public function editPatient($id, $fname, $lname, $dob, $gender, $address, $phone, $email, $username, $avatar_path){
            try {
                    $sql = "UPDATE `patient` SET `patientFirstName`=:fname,`patientLastName`=:lname,`patientDOB`=:dob,
                    `patientGender`=:gender, `patientAddress`=:address,`patientPhone`=:phone, `patientEmail`=:email, `username`=:username,`avatar_path`=:avatar_path WHERE `patient_id`= :id";
                    
                        $stmt = $this->db->prepare($sql);

                        $stmt->bindparam(':id',$id);
                        $stmt->bindparam(':fname',$fname);
                        $stmt->bindparam(':lname',$lname);
                        $stmt->bindparam(':dob',$dob);
                        $stmt->bindparam(':gender',$gender);
                        $stmt->bindparam(':address',$address);
                        $stmt->bindparam(':phone',$phone);
                        $stmt->bindparam(':email',$email);
                        $stmt->bindparam(':username',$username);
                        $stmt->bindparam(':avatar_path',$avatar_path);
                        //execute statement
                        $stmt->execute();
                        return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function adminEditPatient($id, $fname, $lname, $dob, $gender, $address, $phone, $username){
            try {
                    $sql = "UPDATE `patient` SET `patientFirstName`=:fname,`patientLastName`=:lname,`patientDOB`=:dob,
                    `patientGender`=:gender, `patientAddress`=:address,`patientPhone`=:phone,`username`=:username WHERE `patient_id`= :id";
                    
                        $stmt = $this->db->prepare($sql);

                        $stmt->bindparam(':id',$id);
                        $stmt->bindparam(':fname',$fname);
                        $stmt->bindparam(':lname',$lname);
                        $stmt->bindparam(':dob',$dob);
                        $stmt->bindparam(':gender',$gender);
                        $stmt->bindparam(':address',$address);
                        $stmt->bindparam(':phone',$phone);
                        $stmt->bindparam(':username',$username);
                        //execute statement
                        $stmt->execute();
                        return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deletePatient($id){
            try {
                $sql = "delete from patient where patient_id = :id";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        //function to insert a new record into the attendee database
        public function insertDoctor($name, $address, $phone, $dob, $email, $avatar_path){
            try {
                $sql = "INSERT INTO doctor (doctorName, doctorAddress, doctorPhone, doctorDOB ,doctorEmail, avatar_path) 
                VALUES(:name, :address, :phone, :dob, :email, :avatar_path)";
                $stmt = $this->db->prepare($sql);

                
                $stmt->bindparam(':name',$name);
                $stmt->bindparam(':address',$address);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':avatar_path',$avatar_path);
                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getDoctors(){
            try {
                $sql = "select * from doctor";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
                
                
        }

        public function getDoctorDetails($id){
            try {    
                $sql = "select * from doctor where doctor_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        public function editDoctor($id, $name, $address, $phone, $dob, $email, $username, $avatar_path){
            try {
                    $sql = "UPDATE `doctor` SET `doctorName`= :name, `doctorAddress`=:address,
                     `doctorPhone`=:phone, `doctorDOB`=:dob, `doctorEmail`=:email, `username`=:username, `avatar_path`=:avatar_path WHERE `doctor_id`= :id";
                    
                        $stmt = $this->db->prepare($sql);

                        $stmt->bindparam(':id',$id);
                        $stmt->bindparam(':name',$name);
                        $stmt->bindparam(':address',$address);
                        $stmt->bindparam(':phone',$phone);
                        $stmt->bindparam(':dob',$dob);
                        $stmt->bindparam(':email',$email);
                        $stmt->bindparam(':username',$username);
                        $stmt->bindparam(':avatar_path',$avatar_path);
                        //execute statement
                        $stmt->execute();
                        return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteDoctor($id){
            try {
                $sql = "delete from doctor where doctor_id = :id";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        //function to insert a new record into the Doctor Schedule database
        public function insertSchedule($scheduleDate, $scheduleDay, $startTime, $endTime, $bookAvail, $doctor){
            try {
                $sql = "INSERT INTO doctorschedule (scheduleDate, scheduleDay, startTime, endTime, bookAvail , doctor_id) 
                VALUES(:schedule_Date, :schedule_Day, :start_Time, :end_Time, :book_Avail, :doctor)";
                $stmt = $this->db->prepare($sql);

                
                $stmt->bindparam(':schedule_Date',$scheduleDate);
                $stmt->bindparam(':schedule_Day',$scheduleDay);
                $stmt->bindparam(':start_Time',$startTime);
                $stmt->bindparam(':end_Time',$endTime);
                $stmt->bindparam(':book_Avail',$bookAvail);
                $stmt->bindparam(':doctor',$doctor);
                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getSchedule(){
            try {
                $sql = "SELECT * FROM `doctorschedule`  s inner  join doctor d on s.doctor_id = d.doctor_id";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
                
                
        }

        public function getScheduleDetails($id){
            try {    
                $sql = "select * from doctorschedule s inner  join doctor d on s.doctor_id = d.doctor_id where schedule_Id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        public function editSchedule($id, $scheduleDate, $scheduleDay, $startTime, $endTime, $bookAvail, $doctor){
            try {
                    $sql = "UPDATE `doctorschedule` SET `scheduleDate`=:schedule_Date,`scheduleDay`=:schedule_Day, `startTime`=:start_Time,
                     `endTime`=:end_Time, `bookAvail`=:book_Avail, `doctor_id`=:doctor  WHERE `schedule_Id`= :id";
                    
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindparam(':id',$id);
                        $stmt->bindparam(':schedule_Date',$scheduleDate);
                        $stmt->bindparam(':schedule_Day',$scheduleDay);
                        $stmt->bindparam(':start_Time',$startTime);
                        $stmt->bindparam(':end_Time',$endTime);
                        $stmt->bindparam(':book_Avail',$bookAvail);
                        $stmt->bindparam(':doctor',$doctor);
                        //execute statement
                        $stmt->execute();
                        return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function editScheduleAvailability($id, $bookAvail){
            try {
                    $sql = "UPDATE `doctorschedule` SET `bookAvail`=:book_Avail WHERE `schedule_Id`= :id";
                    
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindparam(':id',$id);
                        $stmt->bindparam(':book_Avail',$bookAvail);
                        //execute statement
                        $stmt->execute();
                        return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteSchedule($id){
            try {
                $sql = "delete from doctorschedule where schedule_Id = :id";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }


        //function to insert a new record into the Appointment database
        public function insertAppt($schedule, $patient, $appt_Symptom, $appt_Comment, $status, $doctor){
            try {
                $sql = "INSERT INTO appointment (doctorSchedule_Id, patient_Id, apptSymptom, apptComment, status, doctor_id) 
                VALUES(:schedule, :patient, :appt_Symptom, :appt_Comment, :status, :doctor)";
                $stmt = $this->db->prepare($sql);

                
                $stmt->bindparam(':schedule',$schedule);
                $stmt->bindparam(':patient',$patient);
                $stmt->bindparam(':appt_Symptom',$appt_Symptom);
                $stmt->bindparam(':appt_Comment',$appt_Comment);
                $stmt->bindparam(':status',$status);
                $stmt->bindparam(':doctor',$doctor);
                
                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAppt(){
            try {
                $sql = "SELECT * FROM `appointment`  a inner  join doctor d on a.doctor_id = d.doctor_id
                 inner  join doctorschedule s on a.doctorSchedule_id = s.schedule_Id inner  join patient p on a.patient_Id = p.patient_id";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
                
                
        }

        public function getApptDetails($id){
            try {    
                $sql = "select * from appointment s inner  join doctor d on s.doctor_id = d.doctor_id where appt_Id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        public function paitentApptDetails($id){
            try {    
                $sql = "select * from appointment a inner join doctorschedule s on a.doctorSchedule_Id = s.schedule_Id 
                inner join patient p on a.patient_id = p.patient_id inner  join doctor d on a.doctor_id = d.doctor_id where a.patient_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }
        public function getPatientAppt($id){
            try {    
                $sql = "select * from appointment a inner join doctorschedule s on a.doctorSchedule_Id = s.schedule_Id 
                inner join patient p on a.patient_id = p.patient_id inner  join doctor d on a.doctor_id = d.doctor_id where a.patient_id = :id"; 
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                
               // $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        public function editAppt($id, $scheduleDate, $scheduleDay, $startTime, $endTime, $bookAvail, $doctor){
            try {
                    $sql = "UPDATE `appointment` SET `scheduleDate`=:schedule_Date,`scheduleDay`=:schedule_Day, `startTime`=:start_Time,
                     `endTime`=:end_Time, `bookAvail`=:book_Avail, `doctor_id`=:doctor  WHERE `appt_Id`= :id";
                    
                        $stmt = $this->db->prepare($sql);
                        $stmt->bindparam(':id',$id);
                        $stmt->bindparam(':schedule_Date',$scheduleDat);
                        $stmt->bindparam(':schedule_Day',$scheduleDay);
                        $stmt->bindparam(':start_Time',$startTime);
                        $stmt->bindparam(':end_Time',$endTime);
                        $stmt->bindparam(':book_Avail',$bookAvail);
                        $stmt->bindparam(':doctor',$doctor);
                        //execute statement
                        $stmt->execute();
                        return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteAppt($id){
            try {
                $sql = "delete from appointment where appt_Id = :id";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        public function NumAppt(){
            try {
                $sql = "SELECT COUNT(*) FROM appointment";;
                $stmt = $this->db->query($sql)->fetch()[0];      
                return $stmt;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }
        public function todayAppt(){
            try {
                $sql = "SELECT * FROM appointment
                INNER JOIN doctorschedule
                ON doctorschedule.schedule_Id = appointment.doctorSchedule_Id 
                WHERE scheduleDate = CURDATE()";
                $stmt = $this->db->prepare($sql)->fetch()[0];
                               
                //$stmt->rowCount();
                
                if($stmt == 0) { // here I am facing issue
                    //some stuff
                    return $stmt ?? 0;
                } else {
                    //some stuff
                    return $stmt;
                }
                   
                
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }

        public function NumPatient(){
            try {
                $sql = "SELECT COUNT(*) FROM patient";;
                $stmt = $this->db->query($sql)->fetch()[0];      
                return $stmt;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }
        public function NumDoctor(){
            try {
                $sql = "SELECT COUNT(*) FROM doctor";;
                $stmt = $this->db->query($sql)->fetch()[0];      
                return $stmt;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

        }



     


    }   

?>