<div class=" container mx-auto mx-3">
	<div class="card-deck">
		<div class="row ">

			<?php
			foreach ($counselors as $row) {
				# code...
				//print_r($row);
			
			?>
			<div class="col-md-6 col-lg-3 my-3 mx-3 px-3">
				<div class="card" style="width: 18rem;">
				  <img class="card-img-top" src="./assets/images/<?php echo $row['profile_picture'];?>" width="130" height="300" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title"><?php echo $row['first_name'];?></h5>
				    <p class="card-text"><?php echo $row['profession'];?></p>
				    <p class="card-text"><?php echo $row['designation'];?></p>
				    
				  </div>
				</div>
			</div>
			<?php
			}
			?>



			
		</div>
	  
	  

	</div>
</div>