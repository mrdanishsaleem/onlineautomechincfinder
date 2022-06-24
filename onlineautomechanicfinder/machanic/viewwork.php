<?php
include('../database.php');
$msg= null;
session_start();
if(isset($_POST['accept'])){
				$jobid=$_POST['jobid'];
					$query="UPDATE jobs SET job_status='Accepted' Where job_id='$jobid'";
					$results=mysqli_query($connection,$query);
						if($results){
							$msg="Job Accepted Successfull";
						}else{$msg=mysqli_error($connection);}
}
if(isset($_POST['reject'])){
				$jobid=$_POST['jobid'];
					$query="UPDATE jobs SET job_status='Rejected' Where job_id='$jobid'";
					$results=mysqli_query($connection,$query);
						if($results){
							$msg="Job Rejected Successfull";
						}else{$msg=mysqli_error($connection);}
}

if(isset($msg))
{
	echo("<script>alert('".$msg."');</script>");
}
include('machanicheader.php');
?>

		<div class="registrationbox">
			<div class="comboprofessionaldata">
				<h2>Request For Work</h2>
				<div class="bidsinformation">
				<table>
				<tr>
				<th>S.No</th>
				<th>User Name</th>
				<th>User Address</th>
				<th>User Contact</th>
				<th>Request Date</th>
				<th>Request Status</th>
				<th>Action</th>
				</tr>
				<tr>
				<?php
				require '../database.php';
				$msg= null;
				$sno=1;
				$machanicid=$_SESSION["proff_id"];

				$query="SELECT * FROM jobs inner join user On user.user_id=jobs.user_id  WHERE jobs.job_machanic='$machanicid'";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
						    $jobid = $row->job_id;
						    $user_Name = $row->user_Fullname;
							$address = $row->user_address;
							$city = $row->user_city;
							$Contact = $row->user_contact;
							$date    = $row->job_date;
							$status    = $row->job_status;

				?>
				<td><?php echo $sno++; ?></td>
				<td><?php echo $user_Name; ?></td>
				<td><?php echo $address.' '.$city; ?></td>
				<td><?php echo $Contact; ?></td>
				<td><?php echo $date; ?></td>
				<td><?php echo $status; ?></td>
				<form method="post" action="">
				<input type="hidden" value="<?php echo $jobid; ?>" name="jobid">
				<?php
				if($status=='Pending' || $status=='Rejected' )
				{
					echo '<td><input type="submit" name="accept" value="Accept" style="width:100%; margin:0;"></td>';

				}
				else{
					echo '<td><input type="submit" name="reject" value="Reject" style="width:100%; margin:0;"></td>';
				}
				?>
				
				</form>
				</tr>
				<?php }}} ?>
				</table>
				</div>
				</div>
			</div>
		</div>
		<?php
include('footer.php');
?>