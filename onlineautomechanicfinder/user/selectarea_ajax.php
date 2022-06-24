<?php
require '../database.php';
$disst=$_POST['distt'];
$option=null;
				$query="SELECT * FROM city_area WHERE area_city='$disst' ";
							$results=mysqli_query($connection,$query);
								if($results){
									if(mysqli_num_rows($results)>0){
									while($row = mysqli_fetch_object($results))
									{
										$constid = $row->area_id;
										 $constname = $row->area_name;
										echo '<option value="'.$constid.'">'.$constname.'</option>';
							}
						}
					}else{echo mysqli_error($connection);}
 //echo $option;
 ?>