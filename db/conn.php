<?php 

   // Developement connection 
     /* $host = '127.0.0.1';
    $db = 'ember_medical_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';  */

    //Remote connection
    $host = 'remotemysql.com';
    $db = 'ai6Gx27fht';
    $user = 'ai6Gx27fht';
    $pass = '4kaGimnorh';
    $charset = 'utf8mb4'; 

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $con = mysqli_connect("localhost","root","","ember_medical_db");
    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        //echo "<h1 class='text-danger'>No Database Found</h1>";
        throw new PDOException($e->getMessage());
    }


    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);
   
    $user->insertUser("admin","@dministrat0r");

?>