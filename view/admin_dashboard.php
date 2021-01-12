<?php
include('controller/File.php');
function getUser()
{
	$user_controller=new File_Controller();
	return $user_controller->getAllUser();
}
function test($id)
{
	//echo "test method ".$id;
	$profile=new Profile_Model();
	$profiles=$profile->select_profile($id);
	//print_r($profiles);
	return $profiles;
}
$users=getUser();
//echo "<pre>";
//print_r($users);
?>
<div class="container">
  <h1>Counselor</h1>
	
</div>
<div class="row">
  <div class="col-2">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      
      
      <a  class="nav-link active" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="true">Manage User</a><!--aria-selected="true" active-->
      
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      
      
      
      <div class="tab-pane fade show active " id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"><!--show active-->
        <h1>Manage User</h1>
        

        <table class="table table-bordered table-sm ">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#SL</th>
		      <th scope="col">First Name</th>
		      <th scope="col">Last Name</th>
		      <th scope="col">Profession</th>
		      <th scope="col">Designation</th>
		      <th scope="col">Email</th>
		      <th scope="col">Type</th>
		      <th scope="col">Profile</th>
		      <th scope="col">Picture</th>
		      <th scope="col">Action</th>
		      
		    </tr>
		  </thead>
		  <tbody class="table-sm" >
		  	<?php 
		  	$sl=1;
		  	foreach ($users as $row) {
		  		# code...

		  	
		  	?>
		    <tr>
		      <th class="text-dark" scope="row"><?php echo $sl;?></th>
		      <td class="text-dark"><?php echo $row['first_name'];?></td>
		      <td><?php echo $row['last_name'];?></td>
		      <td><?php echo $row['profession'];?></td>
		      <td><?php echo $row['designation'];?></td>
		      <td><?php echo $row['email'];?></td>
		      <td><?php echo $row['user_type'];?></td>
		      <td>
		      	<!--Modal button-->
		    	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#message<?php echo $row['id'];?>">Profile</button>
		    	<!--/Modal button-->
		      	
		      </td>
		      <td><img src="./assets/images/<?php echo $row['profile_picture'];?>" height="90" width="75" alt="..."></td>
		      <td><?php 
		      $id=$row['id'];
		      	if ($row['active_status']=="active") {
		      		# code...
		      		?>
		      		<a href="index.php?function=change_user_active_status&controller=counselling&active_status=inactive&id=<?php echo $row['id']; ?>">
		      		<button type="button" class="btn btn-success">Inactive</button>
		      		</a>
		      		<?php
		      	}elseif ($row['active_status']=="inactive") {
		      		# code...
		      		?>
		      		<a href="index.php?function=change_user_active_status&controller=counselling&active_status=active&id=<?php echo $row['id']; ?>">
		      		<button type="button" class="btn btn-danger">Active</button>
		      		</a>
		      		<?php
		      	}
		      	?>
		      </td>
		    </tr>


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



			<?php
			$sl++;
		 	}
		 	?>
		    
		  </tbody>
		</table>
        



      </div>
      
    </div>
  </div>
</div>


<div>

    <!-- Nav tabs --
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
      </li>
    </ul>

     !--Tab panes--
    <div class="tab-content">
      <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">Home</div>

      <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">profile
            
      </div>
      
      <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">message</div>
      <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">swttings</div>
    </div>
	-->

</div>
