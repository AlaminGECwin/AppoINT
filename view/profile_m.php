<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
-->
<?php
if ($_GET['function']!="search_counselling") {
  # code...
  include('model/configuration.php');
  include('model/profile.php');
}

function test($id){
  //echo $id;
  $profile=new Profile_Model();
  $profiles=$profile->select_profile($id);
  //print_r($profiles);
  return $profiles;
}
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <center>
        <h5 class="modal-title text-white" id="exampleModalLabel">Profile</h5>

        </center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <center>
        <?php

          if (isset($_SESSION['profile_uid'])) {
            # code...
            //echo $_SESSION['profile_uid'];
            $id=$_SESSION['profile_uid'];
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
          }
            ?>
        </center>
        
      </div>
      <div class="modal-body">
        <center>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div>