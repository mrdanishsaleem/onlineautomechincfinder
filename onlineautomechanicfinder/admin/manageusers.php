<?php
include('adminheader.php');
?>
		<div class="registrationbox">
		<div class="loginpage" style="width:200px;">
				<a href="userregistration.php"><input type="submit" value="Add New" id="loginbutton"></a>
			</div>
			<div class="comboprofessionaldata">
				<h2>Users Management</h2>
				<div class="selectcategory">
				</div>
				<table>
				<tr>
				<th>ID</th>
				<th>Name</th>
				<th>CNIC</th>
				<th>Address</th>
				<th>City</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Update</th>
				<th>Delete</th>
				</tr>
				<tr>
				<?php
				require '../database.php';
				$msg= null;
				 $query="SELECT * FROM user";
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
				?>
				<td><?php echo $user_id; ?></td>
				<td><?php echo $user_name; ?></td>
				<td><?php echo $cnic; ?></td>
				<td><?php echo $address; ?></td>
				<td><?php echo $city; ?></td>
				<td><?php echo $contact; ?></td>
				<td><?php echo $email; ?></td>
				<form action="updateuser.php" method="POST">
				<input type="hidden" name="userid" Value="<?php echo $user_id;?>"/>
				<td><input type="submit" name="update" Value="Update" style="width:auto; margin:0;"/></td>
				<td><input type="submit" name="delete" Value="Delete" style="width:auto; margin:0;" onClick="return confirm('Are you sure you want to delete?')"/></td>
				</form>
				</tr>
				<?php }}} ?>
				</table>
			</div>
		</div>
		<?php
include('footer.php');
?>