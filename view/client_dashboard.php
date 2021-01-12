<div class="container">
  <h1>Client</h1>
  <?php 
  echo "<br>".$_SESSION['first_name'];
  echo "<br>".$_SESSION['last_name'];
  echo "<br>".$_SESSION['profession'];
  echo "<br>".$_SESSION['designation'];
  
  
  include('model/appointment.php');
  

function getAppointments()
{
  $appointments=new Appointment_Model();
  $id=$_SESSION['id'];
  $data=$appointments->select_appointment_for_client($id);
  return $data;

}
function counselor_name($counselor_id){
  $counselor_name=new Appointment_Model();
  return $counselor_name->getName($counselor_id);

}
function counselor_photo($counselor_id){
  $counselor_name=new Appointment_Model();
  return $counselor_name->getPhoto($counselor_id);

}
function profile($id)
{
  //echo "test method ".$id;
  $profile=new Appointment_Model();
  $profiles=$profile->select_profile($id);
  //print_r($profiles);
  return $profiles;
}
function schedule($id){
  $schedule=new Appointment_Model();
  return $schedule->select_schedule($id);
}
$appointments=getAppointments();

  ?>
  <br>
  <img src="./assets/images/<?php echo $_SESSION['profile_picture'];?>" height="100" width="100">
  <a href="index.php?function=sign_out">Sign Out</a>
</div>

<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link "  id="v-pills-home-tab" data-toggle="pill"  href="#v-pills-home" role="tab"  aria-controls="v-pills-home" aria-selected="false">Home</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Manage profile</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Search Counselling</a>
      <a class="nav-link active " id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="true"><!--aria-selected="true" active-->Requested Appointments</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">My Profile</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">My Schedule</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Sign out</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <h1>Home</h1>
        <p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt minim occaecat.</p>

      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_new_profile">
            Add New Profile
          </button>

          <?php
          
           $_SESSION['profile_uid']=$_SESSION['id'];
           profile_button();
           ?>
        
      </div>
      
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
        <h1>Search Counselling</h1>
        <p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt minim occaecat.</p>


      </div>
      <div class="tab-pane fade show active " id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"><!--show active-->
        <h1>Requested Appointments</h1>
        <p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt minim occaecat.</p>
        <div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#SL</th>
                <th scope="col">Counselor Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Profile</th>
                <th scope="col">Problem</th>
                <th scope="col">Schedule</th>
                <th scope="col">Action / Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sl=1;
              foreach ($appointments as $row ) {
                # code...
                $appointment_id=$row['id'];
                $counselor_id=$row['counselor_id'];
              
              ?>
              <tr>
                <th scope="row"><?php echo $sl;?></th>
                <td><img src="./assets/images/<?php echo counselor_photo($row['counselor_id']);?>" height="90" width="70" alt="..."></td>
                <td><?php echo counselor_name($row['counselor_id']);?></td>
                <td>
                <!--Modal button-->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#message<?php echo $row['counselor_id'];?>">Profile</button>
                <!--/Modal button-->
                </td>
                <td><?php echo $row['problem'];?></td>
                <td>
                  <!--Modal button-->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#message<?php echo $row['schedule_id'];?>">Schedule</button>
                <!--/Modal button-->
                </td>

                <?php
                 if ($row['status']=="accept") {
                    # code...
                    echo "<td class='bg-success text-center text-white font-weight-bold'>Accepted";
                    button("Add another","warning","index.php?function=request_schedule_edit&counselor_id=$counselor_id");
                    echo "</td>";
                  }elseif ($row['status']=="reject") {
                    # code...
                    echo "<td class='bg-danger text-center text-white font-weight-bold'>Rejected";
                    button("Try Again","warning","index.php?function=request_schedule_edit&counselor_id=$counselor_id");
                    echo "</td>"; 
                  }elseif ($row['status']=="pending") {
                    # code...
                    echo "<td>";
                    button("Add another","warning","index.php?function=request_schedule_edit&counselor_id=$counselor_id"); 
                    button("Cancel","danger","index.php?function=delete_appointment&id=$appointment_id&controller=counselling");
                    echo "</td>";
                  }
                  
                 ?>
              </tr>





                

                <!--Modal-->
              <div id="message<?php echo $row['counselor_id'];?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header bg-info">
                                    
                  <img class="rounded float-left" src="./assets/images/<?php echo counselor_photo($row['counselor_id']);?>" width="67" height="90" alt="Card image cap">
                  <h4 class="modal-title"><?php echo counselor_name($row['counselor_id']);?></h4>
                </div>
                <div class="modal-body">
                    <center>
                    <?php
                      $id=$row['counselor_id'];
                      
                      $profiles=profile($id);
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

                <!--Modal-->
              <div id="message<?php echo $row['schedule_id'];?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header bg-info">
                                    
                  <img class="rounded float-left" src="./assets/images/<?php echo counselor_photo($row['counselor_id']);?>" width="67" height="90" alt="Card image cap">
                  <h4 class="modal-title"><?php echo counselor_name($row['counselor_id']);?></h4>
                </div>
                <div class="modal-body">
                    <center>
                    <?php
                      $id=$row['schedule_id'];
                      
                      $schedule=schedule($id);
                      //print_r($profiles);
                      //echo "<pre>";
                      //print_r($schedule);
                        # code...
                      

                      //select_profile($id);

                      //$file=new File_Controller();
                      //$profiles=$file->select_profile($id);

                      echo jddayofweek(gregoriantojd($schedule['month'],$schedule['date'],$schedule['year']),1);
                      echo "    Date: ".$schedule['date']."    Month: ".$schedule['month']."    Year: ".$schedule['year'];

                      if($row['slot']==0){
                        echo "    Slot: 10:00 am to 11:00 am";
                      }elseif ($row['slot']==1) {
                        # code...
                        echo "    Slot: 11:00 am to 12:00 pm";
                      }elseif ($row['slot']==2) {
                        # code...
                        echo "    Slot: 12:00 pm to 1:00 pm";
                      }elseif ($row['slot']==3) {
                        # code...
                        echo "    Slot: 1:00 pm to 2:00 pm";
                      }elseif ($row['slot']==4) {
                        # code...
                        echo "    Slot: 2:00 pm to 3:00 pm";
                      }elseif ($row['slot']==5) {
                        # code...
                        echo "    Slot: 3:00 pm to 4:00 pm";
                      }elseif ($row['slot']==6) {
                        # code...
                        echo "    Slot: 4:00 pm to 5:00 pm";
                      }elseif ($row['slot']==7) {
                        # code...
                        echo "    Slot: 5:00 pm to 6:00 pm";
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
              <!--
              <tr>
                <th scope="row">2</th>
                <td><img src="./assets/images/person.png" height="90" width="70" alt="..."></td>
                <td>Dr. Abir</td>
                <td><?php profile_button();?></td>
                <td>Security ......</td>
                <td><?php appointment_schedule_button();?></td>
                <td class="bg-success text-center text-white font-weight-bold">Accepted</td>
              </tr>
            -->
              
            </tbody>
          </table>
        </div>

        

      </div>

      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <h1>My Profile</h1>
        <p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt minim occaecat.</p>

        

      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <h1>My Schedule</h1>
        <p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt minim occaecat.</p>

        

      </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <h1>Sign out</h1>
        <p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt minim occaecat.</p>

        

      </div>
    </div>
  </div>
</div>


<div>

    <!-- Nav tabs -->
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

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">Home</div>
      <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">profile</div>
      <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">message</div>
      <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">swttings</div>
    </div>

</div>
