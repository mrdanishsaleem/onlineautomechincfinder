<?php
require '../database.php';
$error = null;
$msg= null;
if(isset($_POST['add_city'])){

			$city_name = $_POST['cityname'];

				$query = "SELECT * FROM cities WHERE city_name='$city_name'";
					$results=mysqli_query($connection,$query);
					if($results){
							if(mysqli_num_rows($results)>0){
								echo('<script>alert("City name already exist!");</script>');
							}else{

								$query= "INSERT INTO  cities VALUES ('','$city_name') ";
								$results=mysqli_query($connection,$query);
					if($results){
									echo('<script>alert("City added successfully!");</script>');
								}

							}

						}
	}


require('adminheader.php');
?>
<div class="registrationbox">
<div class="comboprofessionaldata">
<h1 style="text-align:center">Add New City</h1>
<form method="post" action="">
<div class="registrationfirstdivision">
<input type="text" name="cityname" placeholder="Enter City Name" required>
</div>
<div class="registrationfirstdivision">
<input type="submit" value="Submit" name="add_city" style="width:100%; margin:0;">
</div>
</form>
</div>
</body>
</html>