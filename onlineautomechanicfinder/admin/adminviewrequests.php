<?php
include('adminheader.php');
?>
		<div class="registrationbox">
			<div class="comboprofessionaldata">
				<h2>View All Requests</h2>
				<div class="bidsinformation">
				<table>
				<tr>
				<th>S.No</th>
				<th>User Name</th>
				<th>Mechanic Name</th>
				<th>Mechanic Address</th>
				<th>Request Date</th>
				<th>Request Status</th>
				<th>Feedback</th>
				</tr>
				<tr>
				<?php
				require '../database.php';
				$msg= null;
				$sno=1;
				session_start();

				$query="SELECT * FROM jobs inner join user On user.user_id=jobs.user_id inner join professional On mechanic_id=job_machanic  inner join city_area On city_area.area_id=professional.machanic_city_area inner join cities On cities.city_id=professional.mechanic_city ";
				$results=mysqli_query($connection,$query);
					if($results){
						if(mysqli_num_rows($results)>0){
						while($row = mysqli_fetch_object($results))
						{
						    $jobid = $row->job_id;
							$mach_Name = $row->mechanic_Fullname;
							$user_Name = $row->user_Fullname;
							$address = $row->mechanic_address;
							$city = $row->city_name;
							$contact    = $row->mechanic_contact;
							$area = $row->area_name;
							$professionalid    = $row->mechanic_id;
							$date    = $row->job_date;
							$status    = $row->job_status;
				?>
				<td><?php echo $sno++; ?></td>
				<td><?php echo $user_Name; ?></td>
				<td><?php echo $mach_Name; ?></td>
				<td><?php echo $address.' '.$area.' '.$city; ?></td>
				<td><?php echo $date; ?></td>
				<td><?php echo $status; ?></td>
				<td><a href="placefeedback.php?professional=<?php echo $professionalid; ?>">Feedback</a></td>
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