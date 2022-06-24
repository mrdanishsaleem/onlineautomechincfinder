<?php
include('adminheader.php');
?>

		<div class="registrationbox">
			<div class="comboprofessionaldata">
			<h2>User Feedbacks</h2>
				<div class="selectcategory">

				</div>
				<div class="bidsinformation">
				<table style="text-align:center">
				<tr>
				<th>S.No</th>
				<th>User Name</th>
				<th>Mechanic Name</th>
				<th>Rating</th>
				<th>Feedback</th>
				<th>Date</th>
				</tr>
				<?php
				require '../database.php';
				$msg= null;
				session_start();

					$sno=1;

				 $query="SELECT *, date(feedback_date) as fbackdate FROM feedback inner join user on user.user_id=feedback_user inner join professional On mechanic_id=feedback_proffessional ";
							$result=mysqli_query($connection,$query);
								if($result){
									if(mysqli_num_rows($result)>0){
										$rating=0;
										while($row = mysqli_fetch_object($result))
										{
											$proff_id = $row->feedback_id;
											$u_name = $row->user_Fullname;
											$machanic_name = $row->mechanic_Fullname;
											$rating = $row->rating;
											$comments = $row->feedback_comments;
											$commentsdate = $row->fbackdate;
				?>
				<tr>
				<td><?php echo $sno++; ?></td>
				<td><?php echo $u_name; ?></td>
				<td><?php echo $machanic_name; ?></td>
				<td><?php echo $rating.' Star'; ?></td>
				<td><?php echo $comments; ?></td>
				<td><?php echo $commentsdate; ?></td>
				</tr>
				<?php }}}else{echo mysqli_error($connection);}
				?>
				</table>
				</div>
			</div>
			</div>
		<?php
include('footer.php');
?>