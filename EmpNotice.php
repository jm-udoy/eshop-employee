<!DOCTYPE html>
<html>
<head>
	<title>Add Notice</title>
</head>
<body>

	<?php

		$notice = "";

		$noticeerr ="";


		if($_SERVER['REQUEST_METHOD'] == "POST"){

			if(empty($_POST['notice'])) {
                    $noticeerr = "Please Fill up the notice!";
                }


            else {

            	$notice = $_POST['notice'];

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

                        $stmt2 = mysqli_prepare($conn2, "update notice set note =? where id = 0");
                        mysqli_stmt_bind_param($stmt2, "s", $p1);
                        $p1 = $notice;
                        
                        $res = mysqli_stmt_execute($stmt2);

                        if($res) {
                            echo "Data Insert Successful!";
                            $_SESSION['message'] = "Registration Done";

                            header('Location: EmpDetails.php');
                        }
                        else {
                            echo "Failed to Insert Data.";
                            echo "<br>";
                            echo $conn2->error;
                        }
                    }

                    mysqli_close($conn2);

            	/* $myfile = fopen("notice.txt", "w") or die("Unable to open file!");
				fwrite($myfile, $notice);
				fclose($myfile);

				header("Location: EmpDetails.php"); */

            }
		}


	?>


	<h1 style="background-color:orange;" align="center">NOTICE ENTRY</h1>

    <p id="errorMsg"></p>

	<form name = "jsForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="POST">

            <h3 style="background-color:black; color: white; padding:10px">Enter notice or announcements:</h3>
            <fieldset style="background-color:orange;">

                <label for="notice">Notice:</label>
                <input type="text" name="notice" id="notice"style="width: 600px;  height: 50px" placeholder="Enter your notice here...">
                <?php echo $noticeerr; ?>
            </fieldset>

            <br>

                <div align="center" style="background-color:black; padding: 10px">
                    <input type="submit" value="Submit" >

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
                var notice = document.forms["jsForm"]["notice"].value;
                

                //console.log(firstname + " " + password)

                if(notice == ""){
                    document.getElementById('errorMsg').innerHTML="<b>Please fill up notice properly!...</b>";
                    document.getElementById('errorMsg').style.color="red";
                }
                else{
                    isValid = true;
                }

                return isValid;
            }

        </script>



</body>
</html>