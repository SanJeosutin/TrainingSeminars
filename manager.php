<?php
/** 
  * Author       :SanJeosutin
  * Purpose      : To display users registration form
  * Created      : 17-Jun-2020
  * Last updated : 17-Jun-2020
 **/
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
        <a href="register.html">Register</a>
        <a class="nada">|</a>
        <a href="manager.php" class="current">Manage</a>
    </header>
    <br>
    <section class="content">
        <h1>Displaying Result</h1>
        <?php
        /*CONNECT TO THE DATABASE*/
            require_once("functions/settings.php");
            $conn = mysqli_connect($host, $user, $pass, $sql_db);
            /*IF CONNECTION IS SUCCSESSFUL, DISPLAY 
            USERNAME FROM THE TABLE AS A DROPDOWN MENU*/
            if($conn){
                $query = "SELECT Username FROM registration;";
                
                $result = mysqli_query($conn, $query);?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <p>Select Username:</p>
            <select name="userName">
                <?php
                foreach($result as $row){
                    $username = $row['Username'];
                    echo "<option value='$username'>$username</option>";
                }?>
            </select>
            <input type="submit" value="Display Selected" class="button" name="displayUsername">
            <br>
            <p>Select Role:</p>
            <select name="userRole">
                <?php
                $query = "SELECT User_Role FROM registration;";
                $result = mysqli_query($conn, $query);
                foreach($result as $row){
                    $uRole = $row['User_Role'];
                    echo "<option value='$uRole'>$uRole</option>";
                }?>
            </select>
            <input type="submit" value="Display Selected" class="button" name="displayRole">
            <br>
            <p>Display all records:</p>
            <input type="submit" value="Display All" class="button" name="displayAll">
            <br>
            <p>Sort User by:</p>
            <input type="submit" value="Display username by ascending order" class="button" name="ascending">
            <br>
            <input type="submit" value="Display username by descending order" class="button" name="descending">
            <br>
            <p>Drop Table: <em class="caution">FOR TESTING PURPOSES ONLY</em></p>
            <input type="submit" value="Drop Table" class="button" name="dropTable">
        </form>
        <?php
        
        /*IF displayAll IS CLICKED. DISPLAY, ALL RECORDS FROM THE TABLE*/
            if(isset($_POST['displayAll'])){
                $query = "SELECT * FROM registration;";
                $result = mysqli_query($conn, $query);
                if($result){
                    $record = mysqli_fetch_assoc($result);
                    if($record){
                        echo"
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Ref Number</th>
                                <th>Qualification</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        ";
                        while($record){
                            echo "
                            <tr>
                                <td>{$record['reg_ID']}</td>
                                <td>{$record['Username']}</td>
                                <td>{$record['Seminar_Reference_Number']}</td>
                                <td>{$record['Qualification']}</td>
                                <td>{$record['User_Role']}</td>
                                <td>{$record['Email_Address']}</td>
                                <td>{$record['Phone_Number']}</td>
                            </tr>
                            ";
                            $record = mysqli_fetch_assoc($result);
                        }
                        ?>
                        </table>
                        <?php
                        mysqli_free_result ($result);
                    } else { echo "<p>Table is empty.</p>";}
                } else {echo "<p>Failed to fetch result.</p>";}
                mysqli_close($conn);
            }

        /*IF displayUsername IS CLICKED. DISPLAY THE 
        SELECTED USERNAME FROM THE DROPDOWN MENU*/
            if(isset($_POST['displayUsername'])){
                $username = $_POST['userName'];
                $query = "SELECT * FROM registration WHERE Username LIKE '$username';";
                $result = mysqli_query($conn, $query);
                if($result){
                    $record = mysqli_fetch_assoc($result);
                    if($record){
                        echo"
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Ref Number</th>
                                <th>Qualification</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        ";
                        while($record){
                            echo "
                            <tr>
                                <td>{$record['reg_ID']}</td>
                                <td>{$record['Username']}</td>
                                <td>{$record['Seminar_Reference_Number']}</td>
                                <td>{$record['Qualification']}</td>
                                <td>{$record['User_Role']}</td>
                                <td>{$record['Email_Address']}</td>
                                <td>{$record['Phone_Number']}</td>
                            </tr>
                            ";
                            $record = mysqli_fetch_assoc($result);
                        }
                        ?>
                        </table>
                        <?php
                        mysqli_free_result ($result);
                    } else { echo "<p>Table is empty.</p>";}
                } else {echo "<p>Failed to fetch result.</p>";}
                mysqli_close($conn); //closed the connection to the database
            }
            
        /*IF displayRole IS CLICKED. DISPLAY THE 
        SELECTED ROLE FROM THE DROPDOWN MENU*/
            if(isset($_POST['displayRole'])){
                $role = $_POST['userRole'];
                $query = "SELECT * FROM registration WHERE User_Role LIKE '$role';";
                $result = mysqli_query($conn, $query);
                if($result){
                    $record = mysqli_fetch_assoc($result);
                    if($record){
                        echo"
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Ref Number</th>
                                <th>Qualification</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        ";
                        while($record){
                            echo "
                            <tr>
                                <td>{$record['reg_ID']}</td>
                                <td>{$record['Username']}</td>
                                <td>{$record['Seminar_Reference_Number']}</td>
                                <td>{$record['Qualification']}</td>
                                <td>{$record['User_Role']}</td>
                                <td>{$record['Email_Address']}</td>
                                <td>{$record['Phone_Number']}</td>
                            </tr>
                            ";
                            $record = mysqli_fetch_assoc($result);
                        }
                        ?>
                        </table>
                        <?php
                        mysqli_free_result ($result);
                    } else { echo "<p>Table is empty.</p>";}
                } else {echo "<p>Failed to fetch result.</p>";}
                mysqli_close($conn); //closed the connection to the database
            }
        
        /*IF ascending IS CLICKED. DISPLAY THE 
        SELECTED ROLE FROM THE DROPDOWN MENU AND
        SORT IT FROM ASCENDING ORDER*/
        if(isset($_POST['ascending'])){
            $role = $_POST['userName'];
            $query = "SELECT * FROM registration ORDER BY userName ASC;";
            $result = mysqli_query($conn, $query);
            if($result){
                $record = mysqli_fetch_assoc($result);
                if($record){
                    echo"
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Ref Number</th>
                            <th>Qualification</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    ";
                    while($record){
                        echo "
                        <tr>
                            <td>{$record['reg_ID']}</td>
                            <td>{$record['Username']}</td>
                            <td>{$record['Seminar_Reference_Number']}</td>
                            <td>{$record['Qualification']}</td>
                            <td>{$record['User_Role']}</td>
                            <td>{$record['Email_Address']}</td>
                            <td>{$record['Phone_Number']}</td>
                        </tr>
                        ";
                        $record = mysqli_fetch_assoc($result);
                    }
                    ?>
                    </table>
                    <?php
                    mysqli_free_result ($result);
                } else { echo "<p>Table is empty.</p>";}
            } else {echo "<p>Failed to fetch result.</p>";}
            mysqli_close($conn); //closed the connection to the database
        }

        /*IF descending IS CLICKED. DISPLAY THE 
        SELECTED ROLE FROM THE DROPDOWN MENU AND
        SORT IT FROM DESCENDING ORDER*/
        if(isset($_POST['descending'])){
            $role = $_POST['userName'];
            $query = "SELECT * FROM registration ORDER BY userName DESC;";
            $result = mysqli_query($conn, $query);
            if($result){
                $record = mysqli_fetch_assoc($result);
                if($record){
                    echo"
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Ref Number</th>
                            <th>Qualification</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    ";
                    while($record){
                        echo "
                        <tr>
                            <td>{$record['reg_ID']}</td>
                            <td>{$record['Username']}</td>
                            <td>{$record['Seminar_Reference_Number']}</td>
                            <td>{$record['Qualification']}</td>
                            <td>{$record['User_Role']}</td>
                            <td>{$record['Email_Address']}</td>
                            <td>{$record['Phone_Number']}</td>
                        </tr>
                        ";
                        $record = mysqli_fetch_assoc($result);
                    }
                    ?>
                    </table>
                    <?php
                    mysqli_free_result ($result);
                } else { echo "<p>Table is empty.</p>";}
            } else {echo "<p>Failed to fetch result.</p>";}
            mysqli_close($conn); //closed the connection to the database
        }

        /*NOT NECCESSARY, BUT QUITE HANDY FOR DROPPING TABLE QUICKLY*/

        /*IF dropTable IS CLICKED. DISPLAY A PROMPT ASKING
        THE MANAGER IF THEY WANTED TO DROP THE TABLE*/
            if(isset($_POST['dropTable'])){
                echo"
                <form method='post' action='manager.php'>
                    <p>Are you sure you want to DROP this table?</p>
                    <input type='submit' value='Yes' class='button' name='yesDrop'>
                    <input type='submit' value='No' class='button' name='noCancel'>
                </form>";
            }
            
            if(isset($_POST['yesDrop'])){
                $query = "DROP TABLE registration;";
                $result = mysqli_query($conn, $query);
                echo "<p>Table has been successfully dropped.</p>";
            }

            if(isset($_POST['noCancel'])){
                header("location:manager.php");
            }

        } else {echo "<p>Connection failed from the server.</p>";}
        ?>
    </section>
    <footer>
        <p>SanJeosutin</p>
        <p>Bachelor of Computer Science</p> 
        <p>University of Swinburne</p>
    </footer>
</body>
</html>