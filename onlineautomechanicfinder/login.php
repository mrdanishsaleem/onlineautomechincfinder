<?php
include('database.php');
$msg= null;
if(isset($_POST['login'])){
	if(isset($_POST['username']) && isset($_POST['password'])){
		if(!empty($_POST['username']) && !empty($_POST['password'])){

			$username = $_POST['username'];
			$password = $_POST['password'];
			$usertype= $_POST['usertype'];
			if($usertype=='Admin')
			{
				$query="SELECT * FROM admin WHERE admin_username = '$username' AND admin_password = '$password'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						$row = mysqli_fetch_object($results);
						session_start();
							$_SESSION["user_id"] = $row->admin_id;
							$_SESSION["user_name"] = $row->admin_name;

							header('Location:admin/adminhome.php');
						}else{$msg = "Incorect Username Or Password";}
					}// db error code
			}
			elseif($usertype=='machanic')
			{
				$query="SELECT * FROM professional WHERE mechanic_email = '$username' AND password = '$password'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						$row = mysqli_fetch_object($results);

						session_start();
							$_SESSION["proff_id"] = $row->mechanic_id;
							$_SESSION["proff_name"] = $row->mechanic_Fullname;
							$_SESSION["professionid"] = $row->profession;

							header('Location: machanic/professionalhome.php');
						}else{$msg = "Incorect Username Or Password";}
					}// db error code
			}
			elseif($usertype=='User')
			{
				$query="SELECT * FROM user WHERE user_email = '$username' AND user_password = '$password'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						$row = mysqli_fetch_object($results);

						session_start();
							echo $_SESSION["user_id"] = $row->user_id;
							echo $_SESSION["user_name"] = $row->user_Fullname;

							header('Location: user/userhome.php');
						}else{$msg = "Incorect Username Or Password";}
					}// db error code
			}

		}else{$msg = "Fill all input fields";}
	}else{$msg = "Plz Log in properly..";}
}
if(isset($msg))
{
	echo("<script>alert('".$msg."');</script>");
}

?>

<html>
<head>
<title>Online Auto Mechanic Finder</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
	<div class="wrapper">

			<div class="registrationdivision" id="myregistrationdivision">
				<div class="mynavbar" style="width:90%;" >
					<div class="logo" id="mylogo">
						<a href="index.php"><h3>Online Auto Mechanic Finder</h3></a>
					</div>
					<div class="navcombo" id="mynavcombo">
						<div class="headernav" >
							<a href="index.php" >Home</a>
						</div>
					</div>
				</div>
				<div class="admindivision">
				<form method="post" action="">
				<h2>Login Page</h2>
					<div class="registrationfirstdivision" style="width:90%;">
						<input type="text" id="" name="username" placeholder="Email">
					</div>
					<div class="registrationfirstdivision" style="width:90%;">
						<input type="password" id="" name="password" placeholder="Password">
					</div>
					<div class="registrationfirstdivision" style="width:90%;">
						<select id="" name="usertype">
						  <option selected disabled>Select Type</option>
						  <option value="Admin">Admin</option>
						  <option value="machanic">Mechanic</option>
						  <option value="User">User</option>
						</select>
					</div>
					<div class="registrationfirstdivision">
						<a href="index.php" id="forgotpassword">Don't Have account?</a>
					</div>
					<input type="submit" value="Login" name="login">
					</form>
				</div>
			</div>

		</div>
		<?php
include('footer.php');
?>
</div>

		</div>