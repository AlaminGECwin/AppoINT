<?php 

  
  
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
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />
    
    <!--footer-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    

    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="assets/css/footer.css">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >

    <!--<title><?php echo $arr['title']?></title>-->
    
    
    <link href="assets/fontawesome/css/all.css" rel="stylesheet">
    






<link rel="icon" type="image/png" href="assets/logo/cm short.png">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<title>Counselling Manager</title>
<style>
h4{
    	font-family: 'Sofia';font-size: 22px;
    }
#navbaar {
  overflow: hidden;
 
}
#navbaar a {
  float: left;
  display: block;
 
  text-align: center;
  padding: 14px;
  
}
.sticky {
  
  top: 0;
  width: 100%;
}
body,h1,h2,h3,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px; overflow:auto;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
/* Flaired edges */

hr.style-three {
height: 30px;
border-style: solid;
border-color: black;
border-width: 1px 0 0 0;
border-radius: 20px;
}
hr.style-three:before {
display: block;
content: "";
height: 30px;
margin-top: -31px;
border-style: solid;
border-color: black;
border-width: 0 0 1px 0;
border-radius: 20px;
}
</style>
</head>

<body class="w3-light-grey">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-pale-green w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold; " id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <!--profile-->
    <div class="w3-container">
       <h4 class="w3-center"><?php  echo $_SESSION['first_name']." ".$_SESSION['last_name'];?></h4>
       <p class="w3-center"><img src="assets/images/<?php echo $_SESSION['profile_picture'];?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
       <hr class="style-three my-0 py-0">
       <p class="my-0 py-0"><i class="fa fa-pencil fa-fw  w3-pale-green"></i><?php echo $_SESSION['profession'].", ".$_SESSION['designation'];?></p>
      </div>
    </div>
    <!--profile-->

  </div>
  <div class="w3-bar-block">
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="#manage_profile" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Manage Profile</a> 
    <a href="#requested_appointments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Requested Appointments</a> 
    
    
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-pale-green w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-pale-green w3-margin-right" onclick="w3_open()">☰</a>
  <span>AppoINT</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


<!--navigation bar-->
<div id="navbaar" class="sticky">
<div class="w3-bar w3-pale-green" style="margin-left:300px;margin-right:40px;">

  <a href="#" class="w3-bar-item w3-button w3-padding-16 "><img src="assets/logo/cm logo.png" width="100" height="20">ER</a>

  <a class="nav-link " href="index.php?function=search_counselling"><button type="button" class="btn btn-light text-dark font-weight-bold">Search Counselling</button></a>
  <!--
  <a  href="#" class="w3-bar-item w3-button w3-padding-16">
  		<button type="button" class="btn btn-info">
	    Profile <span class="badge badge-light">9</span>
	    <span class="sr-only">unread messages</span>
	  	</button>
  </a>-->
  <div class="w3-dropdown-hover" >
    <button class="w3-button w3-padding-16">
      <img src="assets/images/<?php echo $_SESSION['profile_picture'];?>" class="w3-circle" style="height:30px;width:30px" alt="Avatar">Me <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="javascript:void(0)" class="w3-bar-item w3-button">Link 1</a>
      <a href="javascript:void(0)" class="w3-bar-item w3-button">Link 2</a>
      <a href="index.php?function=sign_out" class="w3-bar-item w3-button">Sign out</a>
    </div>
  </div>
</div>
</div>
<!--!navigation bar-->

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  
  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="manage_profile">
    <h1 class="w3-jumbo"><b>AppoINT</b></h1>
    <h1 class="w3-xxxlarge w3-text-pale-green"><b>Manage Profile.</b></h1>
    <hr style="width:50px;border:5px solid orange" class="w3-round">
  </div>
  
  <div>
	  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_new_profile">
        Add New Profile
      </button>

      <?php
      
       $_SESSION['profile_uid']=$_SESSION['id'];
       //echo $_SESSION['id'];
       profile_button();
       ?>

      
  </div>


  
  <!-- Designers -->
  <div class="w3-container" id="requested_appointments" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-pale-green"><b>Requested Appointments.</b></h1>
    <hr style="width:50px;border:5px solid orange" class="w3-round">
    <p>If any Counselor want to manage all Appointments and clicked on Review all Appointments button on Counselor Dashboard.Counselor can reject the request of an Appointment if it is in pending state.</p>
    <p>Counselor can manage all the Appointments. Every Appointment status can be three types Pending, Accepted, Rejected. Canceling the Request will and only will work when Appointment status is pending. Then Counselor can click on accept button of that Request that will make that Appointment accepted.Counselor can manage all the Appointments. Every Appointment status can be three types Pending, Accepted, Rejected. Canceling the Request will and only will work when Appointment status is pending. Then Counselor can click on reject button of that Request that will make that Appointment rejected.
    </p>



	<table class="table table-bordered w3-light-grey">
	    <thead class="thead-dark">
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
	            echo "<td class='bg-success text-center text-white font-weight-bold'>";
	            button("Add another","warning","index.php?function=request_schedule_edit&counselor_id=$counselor_id");
	            button("Delete","danger","index.php?function=delete_appointment&id=$appointment_id&controller=counselling");
	            echo "<br>Accepted</td>";
	          }elseif ($row['status']=="reject") {
	            # code...
	            echo "<td class='bg-danger text-center text-white font-weight-bold'>";
	            button("Try Again","warning","index.php?function=request_schedule_edit&counselor_id=$counselor_id");
	            button("Delete","dark","index.php?function=delete_appointment&id=$appointment_id&controller=counselling");
	            echo "<br>Rejected</td>"; 
	          }elseif ($row['status']=="pending") {
	            # code...
	            echo "<td class='bg-info text-center text-white font-weight-bold'>";
	            button("Add another","warning","index.php?function=request_schedule_edit&counselor_id=$counselor_id"); 
	            button("Cancel","danger","index.php?function=delete_appointment&id=$appointment_id&controller=counselling");
	            echo "<br>Pending</td>";
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

	              echo "Day: ".jddayofweek(gregoriantojd($schedule['month'],$schedule['date'],$schedule['year']),1);
	              echo "    <br>Date: ".$schedule['date']."    <br>Month: ".$schedule['month']."    <br>Year: ".$schedule['year'];

	              if($row['slot']==0){
	                echo "<br>Slot: 10:00 am to 11:00 am";
	              }elseif ($row['slot']==1) {
	                # code...
	                echo "<br>Slot: 11:00 am to 12:00 pm";
	              }elseif ($row['slot']==2) {
	                # code...
	                echo "<br>Slot: 12:00 pm to 1:00 pm";
	              }elseif ($row['slot']==3) {
	                # code...
	                echo "<br>Slot: 1:00 pm to 2:00 pm";
	              }elseif ($row['slot']==4) {
	                # code...
	                echo "<br>Slot: 2:00 pm to 3:00 pm";
	              }elseif ($row['slot']==5) {
	                # code...
	                echo "<br>Slot: 3:00 pm to 4:00 pm";
	              }elseif ($row['slot']==6) {
	                # code...
	                echo "<br>Slot: 4:00 pm to 5:00 pm";
	              }elseif ($row['slot']==7) {
	                # code...
	                echo "<br>Slot: 5:00 pm to 6:00 pm";
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



  

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Powepale-green by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></p></div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>

 <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/popper.min.js" ></script>
<script src="assets/js/bootstrap.min.js" ></script>

</body>
</html>
