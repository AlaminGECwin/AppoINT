<div class="container">
  <h1>Counselor</h1>
  <?php 
  echo "<br>".$_SESSION['first_name'];
  echo "<br>".$_SESSION['last_name'];
  echo "<br>".$_SESSION['profession'];
  echo "<br>".$_SESSION['designation'];

$dateD=25;
$monthD=7;
$yearD=2020;
$slot_scheduleD="11112233";
include('model/schedule.php');
function getRowSchedule($date,$month,$year){
  $schedule=new Schedule_Model();
  $id=$_SESSION['id'];
  $slot_schedules=$schedule->select_schedule($id,$date,$month,$year);
  //print_r($slot_schedules);
  if(sizeof($slot_schedules)>0){
    return $slot_schedules[0];  
  }  
  
}


  include('model/appointment.php');
  

function getAppointments()
{

  $appointments=new Appointment_Model();
  $id=$_SESSION['id'];
  $data=$appointments->select_appointment_for_counselor($id);
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
<div class="container">
  <h1>Counselor</h1>
</div>
<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link "  id="v-pills-home-tab" data-toggle="pill"  href="#v-pills-home" role="tab"  aria-controls="v-pills-home" aria-selected="false">Home</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Manage profile</a>
      <a class="nav-link active" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="true">Manage Schedule</a><!--aria-selected="true" active-->
      <a class="nav-link  " id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Requested Appointments</a>
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
           //echo $_SESSION['id'];
           profile_button();
           ?>

          <button type="button" class="btn btn-primary">
            Profile <span class="badge badge-light">9</span>
            <span class="sr-only">unread messages</span>
          </button>
        

        
      </div>
      
      <div class="tab-pane fade show active" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"><!--show active-->
        <h1>Manage Schedule</h1>
        <p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt minim occaecat.</p>
        



                    <?php
                    //header("Refresh: 20");

                    date_default_timezone_set('Asia/Dhaka');

                    $script_tz = date_default_timezone_get();

                    $current_hour= date("H");
                    ?>

                    <?php
                    //echo "<br>";
                    $d=cal_days_in_month(CAL_GREGORIAN,3,2020);
                    //echo "There was $d days in March 2020";

                    echo "<br>";
                    $jd=gregoriantojd(3,1,2020);//1 march 2020


                    //echo "<br>";
                    $d=mktime(12, 39, 17, 3, 20, 2020);
                    //echo "Created date is " . date("Y-m-d h:i:sa", $d);

                    //echo "<br>";

                    function numtomonth($nmonth)
                    {
                      if($nmonth==1){
                        return "January";
                      }elseif ($nmonth==2) {
                        return "February";
                      }elseif ($nmonth==3) {
                        return "March";
                      }elseif ($nmonth==4) {
                        return "April";
                      }elseif ($nmonth==5) {
                        return "May";
                      }elseif ($nmonth==6) {
                        return "Jun";
                      }elseif ($nmonth==7) {
                        return "July";
                      }elseif ($nmonth==8) {
                        return "August";
                      }elseif ($nmonth==9) {
                        return "September";
                      }elseif ($nmonth==10) {
                        return "October";
                      }elseif ($nmonth==11) {
                        return "November";
                      }elseif ($nmonth==12) {
                        return "December";
                      }else
                      {
                        $nmonth=$nmonth-12;
                        return numtomonth($nmonth);
                      }
                    }



                    if(isset($_GET['done']))
                              {
                                $year=$_GET['year'];
                                $month=$_GET['month'];

                                $day=cal_days_in_month(CAL_GREGORIAN,$month,$year);
                          
                                $jd=gregoriantojd($month,1,$year);//1 march 2020



                              }else
                              {
                                $year=date("Y");
                                $month=date("m");
                                $day=cal_days_in_month(CAL_GREGORIAN,$month,$year);
                          
                                $jd=gregoriantojd($month,1,$year);//1 march 2020
                              }
                    ?>




                    <div class="container cont">
                      <h1>Request Schedule</h1>
                      

                      <div>
                        <form action="index.php" method="get">
                           <div class="form-group">
                              <label for="exampleFormControlSelect1">Select Year</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="year">
                                <option value="<?php echo date("Y");?>"><?php echo date("Y");?></option>
                                
                                
                              </select>
                           </div>
                           <input type="hidden" name="function" value="counselor_dashboard">
                           <div class="form-group">
                              <label for="exampleFormControlSelect1">Select Month</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="month">
                                <option value="<?php echo date("m");?>"  <?php if(date("m")==$month){echo "selected";} ?>  ><?php echo numtomonth(date("m"));?></option>
                                <option value="<?php echo date("m")+1;?>"  <?php if(date("m")+1==$month){echo "selected";} ?>  ><?php echo numtomonth(date("m")+1);?></option>
                                <option value="<?php echo date("m")+2;?>"  <?php if(date("m")+2==$month){echo "selected";} ?>  ><?php echo numtomonth(date("m")+2);?></option>
                              </select>
                           </div>
                           <div>
                            <input type="submit" class="btn btn-success  active" name="done" value="Search" />
                           </div>
                        </form>
                      </div>




















                      <div class="table-responsive-lg" id="divtb">
                        <table class="table table-bordered table-sm ">
                          <thead class="thead-dark">
                            <tr>
                              
                              <th scope="col">Day</th>
                              <th scope="col">10 am-11 am</th>
                              <th scope="col">11 am-12 pm</th>
                              <th scope="col">12 pm- 1 pm</th>
                              <th scope="col"> 1 pm- 2 pm</th>
                              <th scope="col"> 2 pm- 3 pm</th>
                              <th scope="col"> 3 pm- 4 pm</th>
                              <th scope="col"> 4 pm- 5 pm</th>
                              <th scope="col"> 5 pm- 6 pm</th>
                              <th scope="col">Date</th>
                            </tr>
                          </thead>
                          <tbody >
                            <?php

                            $available=false;

                            if(date("m")!=$month){# next month will be available.
                              $available=true;
                              
                              
                            }else{
                              $available=false;
                            }

                            function valid_row($i,$month,$year){
                              if($i==date('d')&&$month==date("m")&&$year==date("Y"))
                                {
                                  return true; 
                                }
                              
                            }

                            function valid_slot($hour,$i,$month,$year){
                              

                              if($i==date('d')&&$month==date("m")&&$year==date("Y")&&$hour>date("H"))
                                {
                                  
                                  return true;
                                   
                                }elseif($i>date('d')){
                                  return true;

                                }
                              
                            }

                            

                            $day_schedule = array("2","2","2","2","2","2","2","2");
                            function get_button($slot_button,$hour,$i,$month,$year)
                            {

                              if($slot_button=="1")
                              { ?>
                              <a href="index.php?function=update_time_slot&status=<?php echo "available";?>&slot=<?php echo $hour-10;?>&date=<?php echo $i;?>&month=<?php echo $month;?>&year=<?php echo $year;?>">
                              <button type="button" class="btn btn-success w-100 h-100 " >Available</button>
                              </a>
                              <?php
                              }elseif($slot_button=="2"){

                              ?>
                              <a href="index.php?function=update_time_slot&status=<?php echo "not available";?>&slot=<?php echo $hour-10;?>&date=<?php echo $i;?>&month=<?php echo $month;?>&year=<?php echo $year;?>">
                              <button type="button" class="btn btn-light w-100 h-100 " >Not Available</button>
                              </a>
                              <?php

                              }elseif ($slot_button=="3") {
                                # code...
                              ?>
                              <a href="index.php?function=update_time_slot&status=<?php echo "booked";?>&slot=<?php echo $hour-10;?>&date=<?php echo $i;?>&month=<?php echo $month;?>&year=<?php echo $year;?>">
                              <button type="button" class="btn btn-danger w-100 h-100 " >Booked</button>
                              </a>
                              <?php
                              }
                            }


                            function getI($month)
                            {
                              if(date("m")!=$month){# next month will be available.
                                return 1;
                                
                                
                              }else{
                                return date("d");
                              }
                            }
                            for ($i=getI($month); $i <=$day ; $i++) { 
                              $hour=10;
                              $row_slot_schedule=getRowSchedule($i,$month,$year);

                          ?>
                              <tr <?php if(valid_row($i,$month,$year)){echo "bgcolor='#9dfc03'";  }?> >
                                
                                <td class="text-primary font-weight-bold"><?php echo jddayofweek(gregoriantojd($month,$i,$year),1); ?></td>
                                <?php
                                for($hour=10; $hour<18; $hour++){

                                ?>
                                <td class="m-0 p-0 ">
                                  <?php

                                  
                                  if($available){#if available is true no action to be needed. and for all the time it will be true.
                                    


                                  }else{
                                    //echo "false"; #why valid_slot function is calling two times?
                                    $available= valid_slot($hour,$i,$month,$year);#if available is not true then it will be checked and try to make it true.
                                  }
                                  
                                  if($available){


                                    if ($row_slot_schedule['date']==$i&&$row_slot_schedule['month']==$month&&$row_slot_schedule['year']==$year) {
                                      # code...
                                      

                                      get_button($row_slot_schedule['slot_schedule'][$hour-10],$hour,$i,$month,$year);
                                    }else{
                                      
                                      get_button($day_schedule[$hour-10],$hour,$i,$month,$year);  
                                    }
                                    
                                              
                                  }else{
                                    expired_button();
                                  }
                                  
                                  ?>
                                </td>
                                <?php
                                }
                                ?>

                                

                                <th class="text-dark" scope="row "><?php echo $i; ?></th>
                              </tr>
                          <?php
                          $jd++;
                            
                            }
                            ?>
                            
                           
                          </tbody>
                        </table>
                      </div>
                      
                    </div>








      </div>
      <div class="tab-pane fade  " id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
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
                $client_id=$row['client_id'];
              
              ?>
              <tr>
                <th scope="row"><?php echo $sl;?></th>
                <td><img src="./assets/images/<?php echo counselor_photo($row['client_id']);?>" height="90" width="70" alt="..."></td>
                <td><?php echo counselor_name($row['client_id']);?></td>
                <td>
                <!--Modal button-->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#message<?php echo $row['client_id'];?>">Profile</button>
                <!--/Modal button-->
                </td>
                <td><?php echo $row['problem'];?></td>
                <td>
                  <!--Modal button-->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#message<?php echo $row['schedule_id'];?>">Schedule</button>
                <!--/Modal button-->
                </td>

                <td><?php 
                if ($row['status']=="accept") {
                  # code...
                  echo "you have accepted.<br>";
                  button("Reject","danger","index.php?function=reject_appointment&id=$appointment_id&controller=counselling");
                  
                }elseif ($row['status']=="pending") {
                  # code...
                  button("Accept","success","index.php?function=accept_appointment&id=$appointment_id&controller=counselling"); 
                  button("Reject","danger","index.php?function=reject_appointment&id=$appointment_id&controller=counselling"); 
                }elseif ($row['status']=="reject") {
                  # code...
                  button("Accept again","success","index.php?function=accept_appointment&id=$appointment_id&controller=counselling");
                  echo "<br>You have rejected this one.";
                }
                ?></td>
              </tr>





                

                <!--Modal-->
              <div id="message<?php echo $row['client_id'];?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header bg-info">
                                    
                  <img class="rounded float-left" src="./assets/images/<?php echo counselor_photo($row['client_id']);?>" width="67" height="90" alt="Card image cap">
                  <h4 class="modal-title"><?php echo counselor_name($row['client_id']);?></h4>
                </div>
                <div class="modal-body">
                    <center>
                    <?php
                      $id=$row['client_id'];
                      
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
                                    
                  <img class="rounded float-left" src="./assets/images/<?php echo counselor_photo($row['client_id']);?>" width="67" height="90" alt="Card image cap">
                  <h4 class="modal-title"><?php echo counselor_name($row['client_id']);?></h4>
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

      <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">profile
            <div class="container mb-3">
              <a class="btn btn-info" href="index.php?function=counselor_add_sector" >
                  <i class="" text-info" style="font-size:36px;">Add Sector</i>
                </a>
                    
            </div>
      </div>
      
      <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">message</div>
      <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">swttings</div>
    </div>

</div>
