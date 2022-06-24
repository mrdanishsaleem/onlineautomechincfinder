<?php
require '../database.php';
$error = null;
$msg= null;
if ( isset ($_POST['add_area'] ) ) {

			$city = $_POST['city'];
			$area_name = $_POST['area'];
			$query = "SELECT * FROM city_area WHERE area_name='$area_name' AND area_city='$city'";
					$results=mysqli_query($connection,$query);
					if($results){
							if(mysqli_num_rows($results)>0){
								echo('<script>alert("Aread name already exist!");</script>');
							}else{

								$query= "INSERT INTO  city_area VALUES ('','$area_name','$city') ";
								$results=mysqli_query($connection,$query);
								if($results){
									echo('<script>alert("Area added successfully!");</script>');
								}

							}

						}else{echo mysqli_error($connection);}
	}


require('adminheader.php');
?>
<div class="registrationbox">
<div class="comboprofessionaldata">
<h1 style="text-align:center">Add New Area in City</h1>
<form method="post" action="">
<div class="registrationfirstdivision">
<select name="city">
<option selected disabled>Select City</option>
						   <?php
							$query="SELECT * FROM cities ";
							$results=mysqli_query($connection,$query);
								if($results){
									if(mysqli_num_rows($results)>0){
									while($row = mysqli_fetch_object($results))
									{
										$cityid = $row->city_id;
										$cityName = $row->city_name;

							?>
						  <option value="<?php echo $cityid; ?>"><?php echo $cityName; ?></option>
						  <?php }}} ?>
</select>
</div>
<div class="registrationfirstdivision">
<input type="text" name="area" placeholder="Enter Area Name" required>
</div>
<div class="registrationfirstdivision">
<input type="submit" value="Submit" name="add_area" style="width:100%; margin:0;">
</div>
</form>
</div>
</body>
</html>