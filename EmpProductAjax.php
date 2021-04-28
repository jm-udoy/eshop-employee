<?php

			$q = $_GET['searchlog'];

			if(empty($q)){
				$hostname = "localhost";
                $dbusername = "eshop_user_1";
                $dbpassword = "123";
                $dbname = "eshop";

                $conn2 = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);
                $stmt2 = $conn2->prepare("select pid, price, p_name, image from product");
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

                                        $image = "image/".$row['image'];
                                        $width = "250px";
                                        $hight = "800px";
                                        echo "<div align='center' style='background-color:orange; padding: 10px; width: 280px; float: left; margin-right: 10px; margin-top: 30px; margin-left: 20px;'>";
                                            echo "<img src='".$image."' width='".$width."' hight='".$hight."'>";
                                            echo "<br>";
                                            echo "Product ID: " . $row['pid'];
                                            echo "<br>";
                                            echo "Product Name: " . $row['p_name'];
                                            echo "<br>";
                                            echo "<b>Product Price:</b> <span style='color:red'><b> " . $row['price']. "</b></span>";
                                            echo "<br>";
                                           
                                        echo "</div>";

                                    }
                                    
                                }
			}

			else{
				$hostname = "localhost";
                $dbusername = "eshop_user_1";
                $dbpassword = "123";
                $dbname = "eshop";

                $conn2 = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);
                $stmt2 = $conn2->prepare("select pid, price, p_name, image from product where p_name like '%".$q."%'");
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

                                        $image = "image/".$row['image'];
                                        $width = "250px";
                                        $hight = "800px";
                                        echo "<div align='center' style='background-color:orange; padding: 10px; width: 280px; float: left; margin-right: 10px; margin-top: 30px; margin-left: 20px;'>";
                                            echo "<img src='".$image."' width='".$width."' hight='".$hight."'>";
                                            echo "<br>";
                                            echo "Product ID: " . $row['pid'];
                                            echo "<br>";
                                            echo "Product Name: " . $row['p_name'];
                                            echo "<br>";
                                            echo "<b>Product Price:</b> <span style='color:red'><b> " . $row['price']. "</b></span>";
                                            echo "<br>";
                                           
                                        echo "</div>";

                                    }
                                    
                                }
                        }
                ?>