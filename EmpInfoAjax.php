<!DOCTYPE html>
<html>
<head>
	<title>Search Log</title>
</head>
<body>
	<?php

			$q = $_GET['searchlog'];

			if(empty($q)){
				echo"<br><br><br>";
				$hostname = "localhost";
                $dbusername = "eshop_user_1";
                $dbpassword = "123";
                $dbname = "eshop";

                $conn2 = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);
                $stmt2 = $conn2->prepare("select pid, price, p_name, username from log");
                            //$stmt2->bind_param("s",$p2);
                            //$p2 = $var;
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
			}

			else{
				echo"<br><br><br>";
				$hostname = "localhost";
                $dbusername = "eshop_user_1";
                $dbpassword = "123";
                $dbname = "eshop";

                $conn2 = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);
                $stmt2 = $conn2->prepare("select pid, price, p_name, username from log where pid =" . $q);
                            //$stmt2->bind_param("s",$p2);
                            //$p2 = $var;
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
                 }
                ?>
    

</body>
</html>