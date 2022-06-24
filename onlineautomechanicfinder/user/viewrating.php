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
				<a href="userhome.php" style="color:#34a1eb;margin-left: 3px;">Home</a>
			</div>
			<div class="headernav" style="margin-left:0l;" >
				<a href="chooseservice.php" >Service Requirement</a>
			</div>	
			<div class="headernav" >
				<a href="mywork.php" >View Work</a>
			</div>
			<div class="headernav" >
				<a href="viewbids.php" >View bids</a>
			</div>
			<div class="headernav" >
				<a href="closework.php" >Close Work</a>
			</div>
			<div class="headernav">
				<a href="viewfeedback.php" >View Feedback</a>
			</div>
			</div>
			<div class="logoutdiv">
				<a href='../logout.php'><input type="submit" value="Logout" id="logoutbtn"></a>
			</div>
		</div>

		<div class="registrationbox">
			<div class="comboprofessionaldata">
				<div class="selectcategory">
				<form method="post" action="">
					<div class="registrationfirstdivision">

						<select id="" name="category">
						  <option selected disabled>Select Profession</option>
						   <?php
							require '../database.php';
							$query="SELECT * FROM profession ";
							$results=mysqli_query($connection,$query);
								if($results){
									if(mysqli_num_rows($results)>0){
									while($row = mysqli_fetch_object($results))
									{
										$profession_id = $row->profession_id;										$proff_name = $row->profession_name;
							?>
						  <option value="<?php echo $profession_id; ?>"><?php echo $proff_name; ?></option>
						  <?php }}} ?>
						</select>

					</div>
					<div class="selectbutton">
						<input type="submit" value="Search" >
					</div>
					</form>
				</div>
				<div class="bidsinformation">
				<table>
				<tr>
				<th>Professional Name</th>
				<th>Work Type</th>
				<th>City</th>
				<th>Work Experience</th>
				<th>Review</th>
				<th>Rating</th>
				</tr>
				<?php
				require '../database.php';
				$msg= null;
				session_start();
				if(isset($_POST["category"]))
				{
					$profid=$_POST["category"];
				$query="SELECT * FROM professional inner join profession On profession_id=professional.profession WHERE profession='$profid'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
						    $proff_id = $row->mechanic_id;
						    $proff_name = $row->mechanic_Fullname;
							$city    = $row->mechanic_city;
							$profession = $row->profession_name;
							$experience = $row->experience;
							$averagerating=0;
							$total=0;
							$rateinglevel="Unknown";
							$query="SELECT * FROM feedback WHERE feedback_proffessional='$proff_id'";
							$result=mysqli_query($connection,$query);
								if($result){
									if(mysqli_num_rows($result)>0){
										$rating=0;
										while($data = mysqli_fetch_object($result))
										{
											$rating += $data->rating;
											$total++;
										}
										$averagerating=$rating/$total;
										if($averagerating<3){$rateinglevel="BAD";}elseif($averagerating<5){$rateinglevel="GOOD";}else{$rateinglevel="EXELENT";}
									}

								}

				?>
				<tr>
				<td><?php echo $proff_name; ?></td>
				<td><?php echo $profession; ?></td>
				<td><?php echo $city; ?></td>
				<td><?php echo $experience; ?></td>
				<td><?php echo $rateinglevel; ?></td>
				<td><?php echo $averagerating; ?></td>
				</tr>
					<?php }}}else{echo hmysqli_error($results);}
					} ?>
				</table>
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