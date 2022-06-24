<?php
include('../database.php');
session_start();
$msg= null;
$userid = $_POST['userid'];
if(isset($_POST['delete']))
{
	$query="DELETE FROM user WHERE user_id='$userid'";
		$dataresult=mysqli_query($connection,$query);
		if($dataresult){
				$msg="User deleted successfully!";
		}
		if(isset($msg))
		{
			echo("<script>alert('".$msg."'); window.location.replace('manageusers.php');</script>");

		}
}
if(isset($_POST['updateuser'])){

							$userid = $_POST['userid'];
							$name = $_POST['name'];
							$cnic = $_POST['cnic'];
							$adress = $_POST['address'];
							$contact = $_POST['mobile'];
							$city = $_POST['city'];
							$email = $_POST['email'];
							$query="UPDATE user SET user_Fullname='$name',user_cnic='$cnic',user_address='$adress',user_city='$city',user_contact='$contact',user_email='$email' WHERE user_id='$userid'";
							$dataresult=mysqli_query($connection,$query);
							if($dataresult){
								$msg="User Uptdated";
								echo("<script>alert('".$msg."'); window.location.replace('manageusers.php');</script>");
							}else{echo mysqli_error($connection);}
}

		  $query="SELECT * FROM user WHERE user_id='$userid'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
						    $user_id = $row->user_id;
							$user_name = $row->user_Fullname;
							$cnic    = $row->user_cnic;
							$address = $row->user_address;
							$city = $row->user_city;
							$contact    = $row->user_contact;
							$email = $row->user_email;
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

				<h2>User Update Form</h2>

					<div class="registrationfirstdivision">
						<input type="text" id="" name="name" value="<?php echo $user_name; ?>" placeholder="Enter Name" required>
					</div>

					<div class="registrationfirstdivision">
						<input type="text" id="" name="cnic" value="<?php echo $cnic; ?>" placeholder="CNIC" required>
					</div>

					<div class="registrationfirstdivision">
						<input type="text" id="" name="address"  value="<?php echo $address; ?>" placeholder="address" required>
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

					<input type="hidden"  name="userid"  value="<?php echo $user_id; ?>">
					<input type="submit" value="UPDATE" name="updateuser" id="loginbutton">

					</form>
				</div>

			</div>
			<?php
include('footer.php');
?>