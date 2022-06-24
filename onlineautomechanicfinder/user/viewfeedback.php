<?php
include('userheader.php');
?>

		<div class="registrationbox">
			<div class="comboprofessionaldata">
			<h2>User Feedback</h2>
				<div class="selectcategory">

				</div>

				<div class="bidsinformation">
				<table style="text-align:center">
				<tr>
				<th>S.No</th>
				<th>User Name</th>
				<th>Rating</th>
				<th>Feedback</th>
				<th>Date</th>
				</tr>
				<?php
				require '../database.php';
				$msg= null;
				session_start();
				if(isset($_POST["viewfeedback"]))
				{
					$sno=1;
					$profid=$_POST["machanicid"];
				$query="SELECT *, date(feedback_date) as fbackdate FROM feedback inner join user on user.user_id=feedback_user  where feedback.feedback_proffessional='$profid' ";
							$result=mysqli_query($connection,$query);
								if($result){
									if(mysqli_num_rows($result)>0){
										$rating=0;
										while($row = mysqli_fetch_object($result))
										{
											$proff_id = $row->feedback_id;
											$u_name = $row->user_Fullname;
											$rating = $row->rating;
											$comments = $row->feedback_comments;
											$commentsdate = $row->fbackdate;
				?>
				<tr>
				<td><?php echo $sno++; ?></td>
				<td><?php echo $u_name; ?></td>
				<td><?php echo $rating.' Star'; ?></td>
				<td><?php echo $comments; ?></td>
				<td><?php echo $commentsdate; ?></td>
				</tr>
									<?php }}}else{echo hmysqli_error($connection);}
				} ?>
				</table>
				</div>
			</div>
		</div>
		<?php
include('footer.php');
?>