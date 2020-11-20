<?php
/** 
  * Author       :SanJeosutin
  * Purpose      : - To sanitised user input before it is inserted into the data base
  *                - To process user data 
  * Created      : 17-Jun-2020
  * Last updated : 22-Jun-2020
 **/

    /*CLEAN INPUT FUNCTION*/
    function cleanInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Web seminars">
    <meta name="keywords" content="seminar, seminars, web seminars, online seminar">
    <meta name="author" content="SanJeosutin">
    <link href="styles/style.css" rel="stylesheet" />
    <link rel="icon" href="images/FinalLogo.jpg" />
    <title>Training Seminars</title>
</head>

<body>
    <header>
        <a href="index.html">Index</a>
        <a class="nada">|</a>
        <a href="register.html" class="current">Register</a>
        <a class="nada">|</a>
        <a href="manager.php">Manage</a>
    </header>
    <br>
    <section class="content">
        <?php
        $okToGo = true;
                    /*CLEANING THE DATA*/
        $refNumber = cleanInput($_POST["seminarReferenceNumber"]);
        $username = cleanInput($_POST["username"]);
        $qualification = $_POST["qualification"];
        $role = $_POST["Role"];
        $uEmail = cleanInput($_POST["uEmail"]);
        $phoneNumber = cleanInput($_POST["PhoneNumber"]);

            /*CHECK IF THE RADIO BUTTON IS SELECTED*/
        if(!isset($qualification)){
            echo "<h1>Please select your qualification</h1>";
            $okToGo = false;
        } 
        elseif ($qualification == "Undergraduate" && $role == "Organiser"){
            echo "<h1>Error!</h1>
                <p>Undergraduates cannot be registered as organisers.</p>";
            $okToGo = false;
        }

        /*IF EVERYTHING CHECKED OUT. THEN RUN THE FOLLOWING*/
        if($okToGo){
           require_once("functions/settings.php");
           $conn = mysqli_connect($host, $user, $pass, $sql_db);
            /*IF CONNECTION IS SUCCESSFUL, THEN CHECK IF TABLE IS ALREADY EXIST*/
            if($conn){
                /*PREPARING A STATEMENT FOR THE TABLE*/
                $query = "CREATE TABLE registration (
                reg_ID INT AUTO_INCREMENT PRIMARY KEY,
                Seminar_Reference_Number varchar(6),
                Username varchar(20),
                Qualification enum('Undergraduate', 'Postgraduate'),
                User_Role enum('Organiser', 'Participant'),
                Email_Address varchar(40),
                Phone_Number int(10));";
                /*CHECK IF TABLE EXIST*/
                $isTableExist = "SELECT 1 FROM 'registration';";
                $isTableExist = mysqli_query($conn, $isTableExist);
                if(!$isTableExist){
                    mysqli_query($conn, $query);
                }
                /*REPLACING $query VAR WITH A NEW STATEMENT AND PUT IT ONTO THE TABLE*/
                $query = "INSERT INTO registration (Seminar_Reference_Number, Username, Qualification, User_Role, Email_Address, Phone_Number) 
                          VALUES ('$refNumber', '$username', '$qualification', '$role' ,'$uEmail', '$phoneNumber');";
                $insertResult = mysqli_query($conn, $query);
                if($insertResult){
                    echo "<h1>Successfully registered!</h1>";
                }
            } 
        }
        ?>
    </section>
    <footer>
        <p>SanJeosutin</p>
        <p>Bachelor of Computer Science</p> 
        <p>University of Swinburne</p>
    </footer>
</body>
</html>