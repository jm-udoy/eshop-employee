<!DOCTYPE html>
<html>
<head>
	<title>Personal Info</title>
</head>
<body>
	<?php
 
        session_start();
        $var = $_SESSION['user'];
        //unset($_SESSION['user']); 


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
                        echo "Database Connection Successful!";

                            $stmt = $conn2->prepare("select fname, lname, gender, email, uname, recemail from emp where uname = ?");
                            $stmt->bind_param("s",$p1);
                            $p1 = $var;
                            $stmt->execute();
                            $res1 = $stmt->get_result();
                            $user = $res1->fetch_assoc();

                            echo "<br>";
                            echo "Username: " . $user['uname'];

                            $firstname = $user['fname'];
                            $lastname = $user['lname'];
                            $gender = $user['gender'];
                            $email = $user['email'];
                            $username = $user['uname'];
                            $recemail = $user['recemail'];



                            /* $stmt2 = $conn2->prepare("select pid, price, p_name, username from log where username = ?");
                            $stmt2->bind_param("s",$p2);
                            $p2 = $var;
                            $stmt2->execute();
                            $res2 = $stmt2->get_result();
                            // $user2 = $res2->fetch_assoc();

                            // echo "Username: " . $user2['pid'];

                            // $pid = $user['pid'];
                            // $productName = $user['p_name'];
                            // $price = $user['price'];
                            
                                if ($res2->num_rows > 0){
                                    while($row = $res2->fetch_assoc()){
                                        echo "Product ID: " . $row['pid'];
                                    }
                                } */
                                

                        }



        /* $log_file = fopen("EmpRegistration.txt", "r");
        
        $data = fread($log_file, filesize("EmpRegistration.txt"));

        $data_filter = explode("\n", $data);
        
        for($i = 0; $i< count($data_filter)-1; $i++) {
            
            $json_decode = json_decode($data_filter[$i], true);
            

            if($json_decode['username'] == $var) 
            {
                $firstnameerr = $json_decode['firstname'];
                $lastnameerr = $json_decode['lastname'];
                $gendererr = $json_decode['gender'];
                $emailerr = $json_decode['email'];
            }

        }
        fclose($log_file); */

	?>

		<h1 style="background-color:black; color: white; padding:10px" align="center">Employee Information:</h1>
            <fieldset style="background-color:orange;">
            
                <label for="firstname">First Name:</label>
                <?php echo $firstname; ?>

                <br>

                <label for="lastname"> LastName:</label>
                <?php echo $lastname; ?>

                <br>

                <label for="gender">Gender:  </label>
                <?php echo $gender; ?>

                <br>

                <label for="email">Email:</label>
                <?php echo $email; ?>

                <br>

                <label for="email">Username:</label>
                <?php echo $username; ?>

                <br>

                <label for="email">Recovery Email:</label>
                <?php echo $recemail; ?>

                <br>
                <br>
                <h3 style="float: left;">SALES LOG:</h3>
                <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <input type="text" name="searchlog" id="searchlog" placeholder="Enter product id...">
                <button type="button" onclick="sendRequest()">Search Product</button>
                <span id="s1">
                <br>
                <br><br>
                    <?php
                $stmt2 = $conn2->prepare("select pid, price, p_name, username from log where username = ?");
                            $stmt2->bind_param("s",$p2);
                            $p2 = $var;
                            $stmt2->execute();
                            $res2 = $stmt2->get_result();
                            // $user2 = $res2->fetch_assoc();

                            // echo "Username: " . $user2['pid'];

                            // $pid = $user['pid'];
                            // $productName = $user['p_name'];
                            // $price = $user['price'];
                            
                                if ($res2->num_rows > 0){
                                    while($row = $res2->fetch_assoc()){
                                        echo "Product ID: " . $row['pid'];
                                        echo "<br>";
                                        echo "Product Name: " . $row['p_name'];
                                        echo "<br>";
                                        echo "Product Price: " . $row['price'];
                                        echo "<br>";
                                        echo "<br>";

                                    }
                                }
                ?>
                </span>
                <script>
                    function sendRequest(){

                        var searchlog = document.getElementById("searchlog").value;

                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function(){
                            if(this.readyState == 4 && this.status == 200){
                                document.getElementById("s1").innerHTML = xhttp.responseText;
                            }
                        }
                        xhttp.open("GET", "EmpInfoAjax.php?searchlog=" + searchlog, true);
                        xhttp.send();

                    }
                </script>
                

            </fieldset>

            <div align="center" style="background-color:black; padding: 10px">

                    <button type="button" onclick="myBack()">Go To Dashboard</button>
                    <script>
                    function myBack() {
                      location.replace("EmpDetails.php")
                    }
                    </script>
                </div>

</body>
</html>