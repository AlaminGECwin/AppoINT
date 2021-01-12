
<div class="container">
	

<div class="mx-3">
	<div class="card-deck">
		<div class="row">


<!--

			<div class="card mb-3" style="max-width: 540px;">
			  <div class="row no-gutters">
			    <div class="col-md-4">
			      <img src="./assets/images/person.png" class="card-img" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">Card title</h5>
			        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
			        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
			      </div>
			    </div>
			  </div>
			</div>

			left picture right contant
--> 
			<?php
			function test($id)
			{
				//echo "test method ".$id;
				$profile=new Profile_Model();
				$profiles=$profile->select_profile($id);
				//print_r($profiles);
				return $profiles;
			}



			if (isset($_GET['sector'])) {
			 	# code...
			 	foreach ($counselors_by_sectors as $row) {
			 		# code...
			 	
			?>

				<div class="col-md-6 col-lg-3 my-3 mx-3 px-3">
					<div class="card" style="width: 18rem;">
					  <img class="card-img-top" src="./assets/images/<?php echo $row['profile_picture'];?>" width="130" height="300" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title"><?php echo $row['first_name'];?></h5>
					    <p class="card-text"><?php echo $row['profession'];?></p>
					    <p class="card-text"><?php echo $row['designation'];?></p>
					    <center>
					    	<?php
					    	$test=$row['first_name']; 
					    	?>

					    	<!--Modal button-->
					    	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#message<?php echo $row['id'];?>">Profile</button>
					    	<!--/Modal button-->

					    	<!--Modal-->
							<div id="message<?php echo $row['id'];?>" class="modal fade" role="dialog">
							<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header bg-info">
							    							    
							    <img class="rounded float-left" src="./assets/images/<?php echo $row['profile_picture'];?>" width="67" height="90" alt="Card image cap">
							    <h4 class="modal-title"><?php echo $row['first_name'];?></h4>
							  </div>
							  <div class="modal-body">
							  		<center>
							  		<?php
							  			$id=$row['id'];
							  			
							  			$profiles=test($id);
							  			//print_r($profiles);
							  			foreach ($profiles as $profile) {
							  				# code...
							  			

							  			//select_profile($id);

							  			//$file=new File_Controller();
							  			//$profiles=$file->select_profile($id);
          
							          $link="https://www.youtube.com/";
							        ?>
							    	
							    	<?php
							    	if ($profile['profile_type']=="linkedin") {
							    	
							    	?>
							        <a href=<?php echo $profile['profile_link']; ?> target="_blank">
							          <i class="fab fa-linkedin text-primary" style="font-size:36px;"></i>
							        </a>
							        <?php
							        }
							        if ($profile['profile_type']=="facebook") {
							        ?>
							        <a href=<?php echo $profile['profile_link']; ?> target="_blank">
							          <i class="fab fa-facebook text-primary" style="font-size:36px;"></i>
							        </a>
							        <?php
							        }
							        if ($profile['profile_type']=="twitter") {
							        ?>
							        
							        <a href=<?php echo $profile['profile_link']; ?> target="_blank">
							          <i class="fab fa-twitter text-primary" style="font-size:36px;"></i>
							        </a>
							        <?php
							        }
							        if ($profile['profile_type']=="youtube") {
							        ?>
							        <a href=<?php echo $profile['profile_link']; ?> target="_blank">
							          <i class="fab fa-youtube text-danger" style="font-size:36px;"></i>
							        </a>
							        <?php
							        }
							        if ($profile['profile_type']=="portfolio") {
							        ?>
							        <a href=<?php echo $profile['profile_link']; ?> target="_blank">
							          <i class="fa fa-id-card text-dark " style="font-size:36px;"></i>
							        </a>
							        <?php
							        }
							        if ($profile['profile_type']=="file") {
							        ?>
							        <a href="index.php?function=read_pdf&file=<?php echo $profile['profile_link']; ?>" target="_blank">
						              <i class="fab fa fa-certificate text-warning" text-info" style="font-size:36px;"></i>
						            </a>
							        <?php
							        }
							        }
							        ?>
							        </center>
							        
							        
							    
							  </div>
							  <div class="modal-footer">
							    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>
							</div>

							</div>
							</div>
							<!--/Modal-->

						    
							<a href="index.php?function=request_schedule&counselor_id=<?php echo $row['id']; ?>">

								<button type="button" class="btn btn-dark">Request</button>
							</a>
						</center>

					  </div>
					</div>
				</div>
			<?php
				}
			}
			?>








			
		</div>
	  
	  

	</div>
</div>
</div>


