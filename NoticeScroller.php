<!DOCTYPE html>
<html>
<head>
	<title>Notice Scroller</title>

	<link rel="stylesheet" type="text/css" href="NoticeStyle.css">
</head>
<body>

	<?php


                    $hostname = "localhost";
                    $dbusername = "eshop_user_1";
                    $dbpassword = "123";
                    $dbname = "eshop";

                    
                    // Mysqli Procedural
                    $conn2 = mysqli_connect($hostname, $dbusername, $dbpassword, $dbname);
                    if(mysqli_connect_error()) {
                        echo "Database Connection Failed!...";
                        echo "<br>";
                        echo mysqli_connect_error();
                    }
                    else {
                        //echo "Database Connection Successful!";

                            $stmt2 = $conn2->prepare("select note from notice where id = ?");
                            $stmt2->bind_param("s",$p2);
                            $p2 = 0;
                            $stmt2->execute();
                            $res2 = $stmt2->get_result();
                            $user = $res2->fetch_assoc();

                                

                        }


	?>


	<div class="container">
		<div class="ticker">
			<div class="title"><h4>NOTICE:</h4></div>
			<div class="news">
				<marquee>
					<?php echo "<p>" . $user['note'] . "</P>"; ?>
				</marquee>
			</div>
		</div>
	</div>
		

</body>
</html>