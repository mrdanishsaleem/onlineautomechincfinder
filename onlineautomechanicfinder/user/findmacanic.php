<?php
include('../database.php');
$msg= null;
session_start();
if(isset($_POST['sendrequest'])){

			$machanic = $_POST['machanicid'];
			$userid = $_SESSION["user_id"];
			$currentdatetime=date('Y-m-d H:i:s');
			$query="INSERT INTO  jobs VALUES ('','$userid','$machanic','$currentdatetime','Pending')";
				$results=mysqli_query($connection,$query);
					if($results){

						$msg="Your request for mechanic is submited successfully!";
					}else{echo mysqli_error($connection);}


}
if(isset($msg))
{
	echo("<script>alert('".$msg."');</script>");
}

include('userheader.php');
?>


		<script>
	function loadarea(){
		var disttrict=$('#distt').val();
			$.ajax({
			   type: "POST",
			   url: "selectarea_ajax.php",
			   data: {
						'distt' : disttrict
				},
			   success: function(data) {
			        console.log(data);
					$('#area').append(data);
				}
		});
	}
	</script>
		<div class="registrationbox">
			<div class="comboprofessionaldata">

				<h2>Find Mechanic In Your Area</h2>
				<div class="selectcategory">
					<div class="registrationfirstdivision">
					<form method="post" action="" enctype="multipart/form-data">
						<select id="distt" name="disstrict" onchange="loadarea()">
						  <option selected disabled>Select City</option>
						   <?php

							$query="SELECT * FROM cities ";
							$results=mysqli_query($connection,$query);
								if($results){
									if(mysqli_num_rows($results)>0){
									while($row = mysqli_fetch_object($results))
									{
										$cityid = $row->city_id;
										$cityname = $row->city_name;

							?>
						  <option value="<?php echo $cityid; ?>"><?php echo $cityname; ?></option>
						  <?php }}} ?>
						</select>

					<div class="myregistrationfirstdivision">
						<select id="area" name="area" onchange="">
							<option selected disabled>Select Area</option>
						</select>
					</div>
					<input type="submit" value="Search" name="searchmechanic" style="width:100%; margin:0;">
					</form>
					</div>


				</div>

			</div>
		</div>
		<div class="comboprofessionaldata">
					 <?php if(isset($_POST['searchmechanic'])){ ?>
				<h2 style="text-align:center">All Mechanics In Your Selected Area</h2>

				<div class="selectcategory">
				</div>
				<table>
				<tr>
				<th>S.No</th>
				<th>Name</th>
				<th>Address</th>
				<th>Experience</th>
				<th>Rate/Houe</th>
				<th>Contact</th>
				<th>Rating</th>
				<th>Update</th>
				<th>Delete</th>
				</tr>
				<tr>
				<?php
				require '../database.php';
				$msg= null;
				$sno=1;
				$selectedarea=$_POST['area'];
				 $query="SELECT * ,IFNULL((SELECT (SUM(rating)/COUNT(rating))  FROM feedback WHERE feedback_proffessional=professional.mechanic_id ), 0) AS mechRating FROM professional inner join city_area On city_area.area_id=professional.machanic_city_area inner join cities On cities.city_id=professional.mechanic_city Where machanic_city_area='$selectedarea'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
						    $machanicid = $row->mechanic_id;
							$mach_name = $row->mechanic_Fullname;

							$address = $row->mechanic_address;
							$city = $row->city_name;
							$contact    = $row->mechanic_contact;
							$area = $row->area_name;
							$experience = $row->experience;
							$rateperhour = $row->rate_per_hour;
							$rating = $row->mechRating;
				?>
				<td><?php echo $sno++; ?></td>
				<td><?php echo $mach_name; ?></td>
				<td><?php echo $address.' '.$area.' '.$city; ?></td>
				<td><?php echo $experience." Year's"; ?></td>
				<td><?php echo $rateperhour." Rupees"; ?></td>
				<td><?php echo $contact; ?></td>
				<td><?php echo $rating." Star";?></td>
				<form action="viewfeedback.php" method="POST">
				<input type="hidden" name="machanicid" Value="<?php echo $machanicid;?>"/>
				<td><input type="submit" name="viewfeedback" Value="Feedbacks" style="width:auto; margin:0;"/></td>
				</form>
				<form action="" method="POST">
				<input type="hidden" name="machanicid" Value="<?php echo $machanicid;?>"/>
				<td><input type="submit" name="sendrequest" Value="Send Request" style="width:auto; margin:0;" /></td>
				</form>

				</tr>
				<?php }}} ?>
				</table>
				<?php } ?>
			</div>
		<?php
include('footer.php');
?>