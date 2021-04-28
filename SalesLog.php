<!DOCTYPE html>
<html>
<head>
	<title>Sales Log</title>
</head>
<body>

	<?php

		$productId = $product_price = $salesman = $note = "";

		$productIderr = $product_priceerr = $salesmanerr = $noteerr ="";


		if($_SERVER['REQUEST_METHOD'] == "POST"){

			if(empty($_POST['pid'])) {
                    $productIderr = "Please Fill up the product ID!";
                }

            else if(empty($_POST['p_price'])) {                    
                    $product_priceerr = "Please Fill up the product price!";  
                }

            else if(empty($_POST['s_man'])) {                    
                    $salesmanerr = "Please Fill up the name!";  
                }

            else if(empty($_POST['note'])) {                    
                    $noteerr = "Please Fill up the product note!";  
                }


            else {

            	$productId = $_POST['pid'];
            	$productPrice = $_POST['p_price'];
            	$username = $_POST['s_man'];
            	$productName = $_POST['note'];

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

                        $stmt2 = mysqli_prepare($conn2, "insert into log (pid, price, p_name, username) values (?, ?, ?, ?)");
                        mysqli_stmt_bind_param($stmt2, "ssss", $p1, $p2, $p3, $p4);
                        $p1 = $productId;
                        $p2 = $productPrice;
                        $p3 = $productName;
                        $p4 = $username;
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

            	/* $details = array('productId' => $productId, 'product_price' => $product_price, 'salesman' => $salesman, 'product_name' => $note);

                            $details_encoded = json_encode($details);

                            $filepath = "SalesLog.txt";

                            $sales_file = fopen($filepath, "a");
                            fwrite($sales_file, $details_encoded . "\n");	
                            fclose($sales_file);

                            header('Location: EmpDetails.php'); */

            }
		}


	?>


	<h1 style="background-color:orange;" align="center">SALES LOG ENTRY</h1>

    <p id="errorMsg"></p>

	<form name = "jsForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="POST">

            <h3 style="background-color:black; color: white; padding:10px">Sales Information:</h3>
            <fieldset style="background-color:orange;">

                <label for="productId">Product ID:</label>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="pid" id="productId">
                <?php echo $productIderr; ?>

                <br>

                <label for="note">Product Name:</label>
                
                <input type="text" name="note" id="note">
                <?php echo $noteerr; ?>

                <br>

                <label for="product_price">Selling Price:</label>
                &nbsp;
                <input type="text" name="p_price" id="product_price">
                <?php echo $product_priceerr; ?>

                <br>

                <label for="salesman">Username:</label>
                &nbsp;&emsp;&nbsp;
                <input type="text" name="s_man" id="salesman">
                <?php echo $salesmanerr; ?>

                



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
                var pid = document.forms["jsForm"]["pid"].value;
                var product_name = document.forms["jsForm"]["note"].value;
                var price = document.forms["jsForm"]["p_price"].value;
                var username = document.forms["jsForm"]["s_man"].value;
                

                console.log(pid + " " + price);

                if(pid == "" || product_name == "" || price == "" || username == ""){
                    document.getElementById('errorMsg').innerHTML="<b>Please fill all information properly!...</b>";
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