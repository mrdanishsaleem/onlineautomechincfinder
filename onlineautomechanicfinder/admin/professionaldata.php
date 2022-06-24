<?php
				require '../database.php';
					$msg= null;
							$proff_id = null;
							$proff_name = null;
							$cnic = null;
							$address = null;
							$city = null;
							$contact = null;
							$email = null;
							$profession = null;
							$experience = null;
							$rate = null;
							$status = null;
				if(isset($_GET["proffid"]))
				{
					$profid=$_GET["proffid"];
				 $query="SELECT * FROM professional INNER JOIN profession ON profession.profession_id=professional.profession WHERE mechanic_id='$profid'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
						    $proff_id = $row->mechanic_id;
							$proff_name = $row->mechanic_Fullname;
							$cnic    = $row->mechanic_cnic;
							$address = $row->mechanic_address;
							$city = $row->mechanic_city;
							$contact    = $row->mechanic_contact;
							$email = $row->mechanic_email;
							$profession = $row->profession_name;
							$experience    = $row->experience;
							$rate = $row->rate_per_hour;
							$status    = $row->status;
							$filePhoto = $row->profile_photo;
						}
						}
					}
				}
				?>


<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="../style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container">
	<div class="wrapper">
		<div class="mynavbar">
			<div class="logo">
				<a href="adminhome.php"><p>Maintenance<span>Repaire</span></p></a>
			</div>
			<div class="navcombo" style="width:65%;">
			<div class="headernav" >
				<a href="adminhome.php" >Home</a>
			</div>
			<div class="headernav">
				<a href="addProfessions.php">Add Profession</a>
			</div>
			<div class="headernav" >
				<a href="manageprofessional.php" style="color:#34a1eb">Manage Professional</a>
			</div>
			<div class="headernav">
				<a href="viewrating.php">Rating</a>
			</div>
			<div class="headernav">
				<a href="viewbids.php">Bids</a>
			</div>
			<div class="headernav">
				<a href="viewfeedback.php" >Feedback</a>
			</div>
			</div>
			<div class="logoutdiv">
				<a href='../logout.php'><input type="submit" value="Logout" id="logoutbtn"></a>
			</div>
		</div>

		<div class="registrationbox">
			<div class="comboprofessionaldata">
				<h2><?php echo $proff_name; ?></h2>
				<div class="professionalinformation">
					<div class="informationheading">
						<h3>City </h3>
					</div>
					<div class="actualinformation">
						<h3><?php echo $city; ?></h3>
					</div>
					<div class="informationheading">
						<h3>Country</h3>
					</div>
					<div class="actualinformation">
						<h3><?php echo $proff_name; ?></h3>
					</div>
					<div class="informationheading">
						<h3>CNIC </h3>
					</div>
					<div class="actualinformation">
						<h3><?php echo $cnic; ?></h3>
					</div>
					<div class="informationheading">
						<h3>Profession Type</h3>
					</div>
					<div class="actualinformation">
						<h3><?php echo $profession; ?></h3>
					</div>
					<div class="informationheading">
						<h3>Experience</h3>
					</div>
					<div class="actualinformation">
						<h3><?php echo $experience ; ?></h3>
					</div>

					<div class="informationheading">
						<h3>Per Hour Rate</h3>
					</div>
					<div class="actualinformation">
						<h3><?php echo $rate; ?></h3>
					</div>
				</div>
					<div class="professionalpicture" >
						<img src="../profilePhoto/<?php echo $filePhoto; ?>" height="250" width="200" alt="professional image">
					</div>
				</div>
			</div>
			</div>
		<div class="footer">
			<div class="copyright">
				<p><span>Maintenance</span>Repair 2020| All Right Reserved </p>
			</div>
		</div>
	</div>
	</div>
</body>
</html>