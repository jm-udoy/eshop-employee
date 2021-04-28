<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
    </head>
    <body>
        <?php

            $username = $password ="";
            $usernameerr = $passworderr ="";

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if(empty($_POST['uname'])) {                    
                    $usernameerr = "Please Fill up the Username!";
                }

                else if(empty($_POST['pass'])) {                    
                    $passworderr = "Please Fill up the password!";
                }

                else {
                    $username = $_POST['uname'];
                    $password = $_POST['pass'];

                    $hostname = "localhost";
                    $dbusername = "eshop_user_1";
                    $dbpassword = "123";
                    $dbname = "eshop";

                    echo "<br>";
                    // Mysqli Procedural
                    $conn2 = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);
                    if(mysqli_connect_error()) {
                        echo "Database Connection Failed!...";
                        echo "<br>";
                        echo mysqli_connect_error();
                    }
                    else {
                        //echo "Database Connection Successful!";

                            $stmt = $conn2->prepare("select uname, pass from emp where uname = ?");
                            $stmt->bind_param("s",$p1);
                            $p1 = $username;
                            $stmt->execute();
                            $res1 = $stmt->get_result();
                            $user = $res1->fetch_assoc();

                            // echo "User name: " . $user['pass'] .$username;
                            // echo "User Password: " . $password;

                            if($user['uname'] == $username && $user['pass'] == $password) 
                                {
                                    session_start();
                                    $_SESSION['user'] = $username;
                                    header("Location: EmpInfo.php");
                                }

                    /* $log_file = fopen("EmpLogin.txt", "r");
                    
                    $data = fread($log_file, filesize("EmpLogin.txt"));
                    
                    fclose($log_file);
                    
                    $data_filter = explode("\n", $data);
                    
                    for($i = 0; $i< count($data_filter)-1; $i++) {

                        $json_decode = json_decode($data_filter[$i], true);
                        if($json_decode['username'] == $username && $json_decode['password'] == $password) 
                        {
                            session_start();
                            $_SESSION['user'] = $username;
                            header("Location: EmpInfo.php");
                        } */
                    }
                    echo "<br>";
                    echo "Wrong Username or Password! Please Try Again.";
                }
            }
        ?>
        
        <h1 style="background-color:orange;" align="center">LOGIN TO SEE INFORMATION</h1>

        <p id="errorMsg"></p>

        <form name = "jsForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="POST">

            <h3 style="background-color:black; color: white; padding:10px">Login:</h3>
            <fieldset style="background-color:orange;">
            
                <label for="username">Username:</label>

                <input type="text" name="uname" id="username">
                <?php echo $usernameerr; ?>

                <br>

                <label for="password">Password:</label>
                
                <input type="password" name="pass" id="password">
                <?php echo $passworderr; ?>
                
                </fieldset>

                <br>

                <div align="center" style="background-color:black; padding: 10px">
                    <input type="submit" value="Login"> 

                    <button type="button" onclick="myBack()">Go To Dashboard</button>
                    <script>
                    function myBack() {
                      location.replace("EmpDetails.php")
                    }
                    </script>
                </div>

            
        </form>

        <script>
            function validate(){
                var isValid = false;
                var username = document.forms["jsForm"]["username"].value;
                var password = document.forms["jsForm"]["pass"].value;
                

                //console.log(firstname + " " + password)

                if(username == "" || password == ""){
                    document.getElementById('errorMsg').innerHTML="<b>Please fill up username and password properly!...</b>";
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