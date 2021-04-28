<!DOCTYPE html>
<html>
    <head>
        <title>Registration Form</title>
    </head>
    <body>
        <?php

            $firstname = $lastname = $gender = $email = $username = $password = $rec_email ="";
            $firstnameerr = $lastnameerr= $gendererr = $emailerr = $usernameerr = $passworderr = $rec_emailerr = $notavailable = "";

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if(empty($_POST['fname'])) {
                    $firstnameerr = "Please Fill up the firstname!";
                }

                else if(empty($_POST['lname'])) {                    
                    $lastnameerr = "Please Fill up the lastname!";
                    
                }

                else if(empty($_POST['gender'])) {                    
                    $gendererr = "Please Fill up the gender!";
                    
                }

                else if(empty($_POST['e-mail'])) {                    
                    $emailerr = "Please Fill up the email!";
                    
                }

                else if(empty($_POST['uname'])) {                    
                    $usernameerr = "Please Fill up the username!";
                }

                else if(empty($_POST['pass'])) {                    
                    $passworderr = "Please Fill up the password!";
                }

                else if(empty($_POST['remail'])) {                    
                    $rec_emailerr = "Please Fill up the recovery email!";
                }

                else {

                    $firstname = $_POST['fname'];
                    $lastname = $_POST['lname'];
                    $gender = $_POST['gender'];
                    $email = $_POST['e-mail'];
                    $username = $_POST['uname'];
                    $password = $_POST['pass'];
                    $rec_email = $_POST['remail'];


                    $hostname = "localhost";
                    $dbusername = "eshop_user_1";
                    $password = "123";
                    $dbname = "eshop";

                    echo "<br>";
                    // Mysqli Procedural
                    $conn2 = mysqli_connect($hostname, $dbusername, $password, $dbname);
                    if(mysqli_connect_error()) {
                        echo "Database Connection Failed!...";
                        echo "<br>";
                        echo mysqli_connect_error();
                    }
                    else {
                        echo "Database Connection Successful!";
                        /*$sql2 = "insert into users (username, password) values ('ghi', 456)";
                        if(mysqli_query($conn2, $sql2)) {
                            echo "Data Insert Successful!";
                        }
                        else {
                            echo "Failed to Insert Data.";
                            echo "<br>";
                            echo mysqli_error($conn2);
                        }*/

                        $stmt2 = mysqli_prepare($conn2, "insert into emp (fname, lname, gender, email, uname, pass, recemail) values (?, ?, ?, ?, ?, ?, ?)");
                        mysqli_stmt_bind_param($stmt2, "sssssss", $p1, $p2, $p3, $p4, $p5, $p6, $p7);
                        $p1 = $firstname;
                        $p2 = $lastname;
                        $p3 = $gender;
                        $p4 = $email;
                        $p5 = $username;
                        $p6 = $password;
                        $p7 = $rec_email;
                        $res = mysqli_stmt_execute($stmt2);

                        if($res) {
                            echo "Data Insert Successful!";
                            $_SESSION['message'] = "Registration Done";

                            header('Location: EmpMainPage.html');
                        }
                        else {
                            echo "Failed to Insert Data.";
                            echo "<br>";
                            echo $conn2->error;
                        }
                    }

                    mysqli_close($conn2);
        

                    /* $log_file = fopen("EmpLogin.txt", "r");
                    
                    $data = fread($log_file, filesize("EmpLogin.txt"));
                    
                    fclose($log_file);
                    
                    $data_filter = explode("\n", $data);

                    for($i = 0; $i< count($data_filter)-1; $i++) {

                        $json_decode = json_decode($data_filter[$i], true);

                        if( $json_decode['username'] == $username ) 
                        {
                            $notavailable = "Username not available!";
                        }
                        else {                       
                            $details = array('firstname' => $firstname, 'lastname' => $lastname, 'gender' => $gender, 'email' => $email, 'username' => $username, 'password' => $password, 'rec_email' => $rec_email);
                            $details_encoded = json_encode($details);

                            $filepath = "EmpRegistration.txt";

                            $reg_file = fopen($filepath, "a");
                            fwrite($reg_file, $details_encoded . "\n");	
                            fclose($reg_file);

                            $usertable = array('username' => $username, 'password' => $password);
                            $usertable_encoded = json_encode($usertable);

                            $log_filepath = "EmpLogin.txt";

                            $log_file = fopen($log_filepath, "a");
                            fwrite($log_file, $usertable_encoded . "\n");	
                            fclose($log_file); */

                            
                            }
                        }
                    
            
        ?>

        <h1 style="background-color:orange;" align="center">REGISTRATION FORM</h1>

        <p id="errorMsg"></p>

        <form  name = "jsForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="POST">

            <h3 style="background-color:black; color: white; padding:10px">Basic Information:</h3>
            <fieldset style="background-color:orange;">
                <label for="firstname">First Name:</label>
                <input type="text" name="fname" id="firstname">
                <br>
                &emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $firstnameerr; ?>

                <br>

                <label for="lastname"> LastName:</label>
                &nbsp;
                <input type="text" name="lname" id="lastname">
                <br>
                &emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $lastnameerr; ?>

                <br>

                <label for="gender">Gender:  </label>
                &emsp;
                <input type="radio" name="gender" id="male" value="male">  
                <label for="gender">Male </label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="gender">Female </label>
                <input type="radio" name="gender" id="other" value="other">
                <label for="gender">Other </label>
                <br>
                &emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $gendererr; ?>

                <br>

                <label for="email">Email:</label>
                &emsp;&nbsp;&nbsp;&nbsp;
                <input type="email" placeholder="" id="email" name="e-mail">
                <br>
                &emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $emailerr; ?>



            </fieldset>

            <br>

            <h3 style="background-color:black; color: white; padding:10px">Account Information:</h3>
            <fieldset style="background-color:orange;">

                <label for="username">Username:</label>
                &emsp;&emsp;
                <input type="text" name="uname" id="username">
                <br>
                &emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $usernameerr; echo $notavailable; ?>

                <br>

                <label for="password">Password:</label>
                &emsp;&emsp;&nbsp;
                <input type="password" name="pass" id="password">
                <br>
                &emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $passworderr; ?>

                <br>

                <label for="rec_email">Recovery email:</label>
                <input type="email" id="rec_email" name="remail">
                <br>
                &emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $rec_emailerr; ?>
                
                </fieldset>

                <br>

                <div align="center" style="background-color:black; padding: 10px">
                    <input type="submit" value="Submit" >

                    <button type="button" onclick="myBack()">Go To Back</button>
                    <script>
                    function myBack() {
                      location.replace("EmpMainPage.html")
                    }
                    </script>
                </div>
             
        </form>

        <script>
        	function validate(){
        		var isValid = false;
        		var firstname = document.forms["jsForm"]["firstname"].value;
        		var lastname = document.forms["jsForm"]["lastname"].value;
        		var gender = document.forms["jsForm"]["gender"].value;
        		var email = document.forms["jsForm"]["email"].value;
        		var username = document.forms["jsForm"]["username"].value;
        		var password = document.forms["jsForm"]["pass"].value;
        		var remail = document.forms["jsForm"]["remail"].value;

        		//console.log(firstname + " " + password)

        		if(firstname == "" || lastname == "" || gender == "" || email == "" || username == "" || password == "" || remail == ""){
        			document.getElementById('errorMsg').innerHTML="<b>Please fill up the form properly!...</b>";
        			document.getElementById('errorMsg').style.color="red";

        			alert("Please fill up all the fields in the form!");
        		}
        		else{
        			isValid = true;
        		}

        		return isValid;
        	}

        </script>
        
    </body>
</html>


