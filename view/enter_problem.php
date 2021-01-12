<div class="container mx-auto my-auto">
  

<div class="modal-header bg-info">
  <center>
  <h5 class="modal-title text-white text-center" id="exampleModalLabel">Your Specific Problem can make it accepted.</h5>
  </center>
  
</div>
<div class="modal-body ">
  
  

    <form id="login-form" class="form" action="index.php" method="post">              
        <div class="form-group " >
            <label for="username" class="text-info">Your Problem:</label><br>
            <input type="text" name="problem" class="form-control">
        </div>
        <input type="hidden" name="schedule_id" value="<?php echo $_GET['schedule_id'];?>">
        <input type="hidden" name="slot" value="<?php echo $_GET['slot'];?>">
        
        <input type="hidden" name="counselor_id" value="<?php echo $_GET['counselor_id'];?>">

        <input type="hidden" name="controller" value="counselling">
        <input type="hidden" name="function" value="send_appointment_request">
        <div class="form-group">
            <input type="submit" name="send_appointment_request" class="btn btn-dark btn-md" value="Send the Request">
        </div>
        
    </form>
  
  
  
</div>
</div>