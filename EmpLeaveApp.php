<!DOCTYPE html>
<html>
<head>
	<title>Leave Application</title>
</head>
<body>

	<?php

	error_reporting(0);
		
		$name = $_FILES['fileToUpload']['name'];
		$tmp_name = $_FILES['fileToUpload']['tmp_name'];

		if(move_uploaded_file($tmp_name, "LeaveApplication".$name))
		{
			echo "File is uploaded...";
		}
		else
		{
			echo "file is not uploaded!";
		}
	
	?>

	


	<h1 style="background-color:orange;" align="center">LEAVE APPLICATION</h1>

	<br>

	<div align="center" style="background-color:black; padding: 20px">
                <button type="button" onclick="myAppDown()">Download leave application</button>
                <script>
                function myAppDown() {
                  location.replace("https://www.wordstemplates.org/wp-content/uploads/2012/08/Leave-Application-Form.docx")
                }
                </script>
     </div>

     <div align="center" style="background-color:orange; padding: 20px">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
				  [Upload your leave application below]
				  <br>
				  <br>
				  <input type="file" name="fileToUpload" id="fileToUpload">
				  <input type="submit" value="Upload" name="submit">
				</form>
     </div>

     <div align="center" style="background-color:black; padding: 20px">
                <button type="button" onclick="myBack()">Go To Dashboard</button>
	                <script>
	                function myBack() {
	                  location.replace("EmpDetails.php")
	                }
	                </script>
     </div>

</body>
</html>