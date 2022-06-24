<?php
include('adminheader.php');
?>
		<div class="registrationbox">
			<div class="loginpage" style="width:200px;">
				<a href="workerregistration.php"><input type="submit" value="Add New" id="loginbutton"></a>
			</div>
			<div class="comboprofessionaldata">
				<h2>Mechanic Management</h2>
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
				<th>Photo</th>
				<th>Status</th>
				<th>Update</th>
				<th>Delete</th>
				</tr>
				<tr>
				<?php
				require '../database.php';
				$msg= null;
				 $query="SELECT * FROM professional";
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
							$experience    = $row->experience;
							$rate = $row->rate_per_hour;
							$status    = $row->status;
							$filePhoto = $row->profile_photo;
				?>
				<td><?php echo $proff_id; ?></td>
				<td><?php echo $proff_name; ?></td>
				<td><?php echo $cnic; ?></td>
				<td><?php echo $address; ?></td>
				<td><?php echo $city; ?></td>
				<td><?php echo $contact; ?></td>
				<td><?php echo $email; ?></td>
				<td><img src="../profilePhoto/<?php echo $filePhoto;?>" alt="image" height="50" width="50"></td>
				<td><?php echo $status; ?></td>
				<form action="updatemechinics.php" method="POST">
				<input type="hidden" name="mech_id" Value="<?php echo $proff_id;?>"/>
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