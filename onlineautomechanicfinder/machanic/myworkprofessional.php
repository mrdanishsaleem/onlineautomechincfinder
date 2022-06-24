<?php
require '../database.php';

?>

<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
	<div class="container">
	<div class="wrapper">
		<div class="mynavbar">
			<div class="logo">
				<a href="userhome.php"><p>Maintenance<span>Repaire</span></p></a>
			</div>
			<div class="navcombo" style="width:65%;">
			<div class="headernav" >
				<a href="professionalhome.php" style="color:#34a1eb">Home</a>
			</div>
			<div class="headernav" >
				<a href="viewwork.php">View Work</a>
			</div>
			<div class="headernav" >
				<a href="myworkprofessional.php">AwardedJob</a>
			</div>
			<div class="headernav">
				<a href="viewfeedback.php">View Feedback</a>
			</div>
			</div>
			<div class="logoutdiv">
				<a href='../logout.php'><input type="submit" value="Logout" id="logoutbtn"></a>
			</div>
		</div>

		<div class="registrationbox">
			<div class="comboprofessionaldata">

				<div class="bidsinformation">
				<table>
				<tr>
				<th>User Name</th>
				<th>Address</th>
				<th>City</th>
				<th>Contact No</th>
				<th>Work Type</th>
				<th>Discription</th>
				<th>Time For Work</th>
				<th>Price</th>
				<th>Status</th>
				<th>Button</th>
				</tr>
				<?php

				$msg= null;
				session_start();

					$user_id= $_SESSION["proff_id"];
					$query="SELECT * FROM job_bids  inner join jobs on jobs.job_id=job_bids.job_id inner join user on jobs.user_id=user.user_id where job_bids.professional_id='$user_id' AND bid_status='Accepted' ";
							$result=mysqli_query($connection,$query);
								if($result){
									if(mysqli_num_rows($result)>0){
										$rating=0;
										while($row = mysqli_fetch_object($result))
										{

											$bid_id = $row->bid_id;
											$job_id = $row->job_id;
											$username = $row->user_Fullname;
											$address = $row->user_address;
											$city = $row->user_city;
											$contact = $row->user_contact;
											$discription = $row->job_discription;
											$jobimage= $row->job_image;
											$jobtime = $row->job_time;
											$bidprice = $row->bid_amount;
											$jobtype = $row->job_type;
											$status = $row->job_status;
				?>
				<tr>
				<td><?php echo $username; ?></td>
				<td><?php echo $address; ?></td>
				<td><?php echo $city; ?></td>
				<td><?php echo $contact; ?></td>
				<td><?php echo $jobtype; ?></td>
				<td><?php echo $discription; ?></td>
				<td><?php echo $jobtime; ?></td>
				<td><?php echo $bidprice; ?></td>
				<td><?php echo $status; ?></td>

				</tr>
									<?php }}}else{echo mysqli_error($connection);}
				 ?>
				</table>
				</div>
			</div>
		</div>

		<div class="footer">
			<div class="copyright">
				<p><span>Online</span>Auto Mechanic Finder 2020 | All Right Reserved </p>
			</div>
		</div>

	</div>
	</div>
</body>
</html>