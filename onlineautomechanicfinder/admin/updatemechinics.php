<?php
include('../database.php');
session_start();
$msg= null;
$mach_id = $_POST['mech_id'];
if(isset($_POST['delete']))
{
	$query="DELETE FROM professional WHERE mechanic_id='$mach_id'";
		$dataresult=mysqli_query($connection,$query);
		if($dataresult){
				$msg="Mechanic deleted successfully!";
		}
		if(isset($msg))
		{
			echo("<script>alert('".$msg."'); window.location.replace('manageprofessional.php');</script>");

		}
}

if(isset($_POST['updatemechanic'])){

							$mach_id = $_POST['mech_id'];
							$name = $_POST['name'];
							$cnic = $_POST['cnic'];
							$adress = $_POST['address'];
							$contact = $_POST['mobile'];
							$city = $_POST['city'];
							$email = $_POST['email'];
							$experience = $_POST['experience'];
							$profession = $_POST['profession'];
							$hourlyrate = $_POST['rate'];
							$status = $_POST['status'];
							$query="UPDATE professional SET mechanic_Fullname='$name',mechanic_cnic='$cnic',mechanic_address='$adress ',mechanic_city='$city',mechanic_contact='$contact',mechanic_email='$email',experience='$experience',rate_per_hour='$hourlyrate',status='$status' WHERE mechanic_id='$mach_id'";
							$dataresult=mysqli_query($connection,$query);
							if($dataresult){
								$msg="Machanic Uptdated";
								echo("<script>alert('".$msg."'); window.location.replace('manageprofessional.php');</script>");
							}else{echo mysqli_error($connection);}
}

		 $query="SELECT * FROM professional WHERE mechanic_id='$mach_id'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
						    $mach_id = $row->mechanic_id;
							$proff_name = $row->mechanic_Fullname;
							$cnic    = $row->mechanic_cnic;
							$address = $row->mechanic_address;
							$city = $row->mechanic_city;
							$contact    = $row->mechanic_contact;
							$email = $row->mechanic_email;
							$experience    = $row->experience;
							$rate = $row->rate_per_hour;
							$status    = $row->status;
					}
					}
					}

if(isset($msg))
{
	echo("<script>alert('".$msg."');</script>");
}
include('adminheader.php');
?>

<div class="registrationbox">
			<div class="registrationdivision">
					<form method="post" action="" enctype="multipart/form-data">
				<h2>Machanic Update Form</h2>
					<div class="registrationfirstdivision">
						<input type="text" id="" name="name" value="<?php echo $proff_name; ?>" placeholder="Enter Name" required>
					</div>
					<div class="registrationfirstdivision">
						<input type="text" id="" name="cnic" value="<?php echo $cnic; ?>" placeholder="CNIC" required>
					</div>
					<div class="registrationfirstdivision">
						<input type="text" id="" name="address"  value="<?php echo $address; ?>" placeholder="Address" required>
					</div>
					<div class="registrationfirstdivision">
						<input type="text" id="" name="city" value="<?php echo $city; ?>" placeholder="City" required>
					</div>
					<div class="registrationfirstdivision">
						<input type="text" id="" name="mobile" value="<?php echo $contact; ?>" placeholder="Mobile" required>
					</div>
					<div class="registrationfirstdivision">
						<input type="text" id="" name="email" value="<?php echo $email; ?>" placeholder="Email" required>
					</div>

					<div class="registrationfirstdivision">
						<input type="text" id="" name="experience" value="<?php echo $experience; ?>" placeholder="Experience" required>
					</div>
					<div class="registrationfirstdivision">
						<input type="text" id="" name="rate" value="<?php echo $rate; ?>" placeholder="Per Hour Rate" required>
					</div>
					<div class="registrationfirstdivision">
						<select name="status">
							<?php if($status=="Active")
							{
								echo ('<option value="Active" Selected>Active</option>');
								echo('<option value="DeActive">DeActive</option>');
							}else
							{
								echo ('<option value="Active">Active</option>');
								echo('<option value="DeActive" Selected>DeActive</option>');
							} ?>
						</select>
					</div>

					<input type="hidden"  name="mech_id"  value="<?php echo $mach_id; ?>">
					<input type="submit" value="UPDATE" name="updatemechanic" id="loginbutton">

					</form>
				</div>

			</div>
			<?php
include('footer.php');
?>