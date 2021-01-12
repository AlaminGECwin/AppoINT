<div class="modal-content">
      <div class="modal-header bg-info">
        <center>
        <h5 class="modal-title text-white " id="exampleModalLabel">Update time slot</h5>
        </center>
        
      </div>
      <div class="modal-body bg-warning  " >
        <?php
        echo "<br>Counselor Id : ".$_SESSION['id'];
        echo "<br>Status : ".$_GET['status'];
        echo "<br>Slot : ".$_GET['slot'];
        echo "<br>Date : ".$_GET['date'];
        echo "<br>Month : ".$_GET['month'];
        echo "<br>Year : ".$_GET['year'];

        ?>
        
        
            <form action="index.php" method="post">
              <div class="row mt-2">
                <div class=" bg-success mx-auto col-md-6" role="alert" >
                  <h1 class="text-center">Available <input class="mt-2" type="radio" name="status"  value="available" <?php if ($_GET['status']=="available") {
                    # code...
                    echo "checked";
                  } ?> ></h1>
                </div>                 
                
              </div>
              <div class="row mt-2">
                <div class=" bg-danger mx-auto col-md-6" role="alert">
                  <h1 class="text-center">Booked <input class="mt-2" type="radio" name="status"  value="booked" <?php if ($_GET['status']=="booked") {
                    # code...
                    echo "checked";
                  } ?> ></h1>
                </div>                 
                
              </div>

              <div class="row mt-2 ">
                <div class=" bg-light mx-auto col-md-6" role="alert">
                  <h1 class="text-center">Not Available <input class="mt-2" type="radio" name="status"  value="not available" <?php if ($_GET['status']=="not available") {
                    # code...
                    echo "checked";
                  } ?> ></h1>
                </div>                 
                
              </div>
              <input type="hidden" name="controller" value="counselling">
              <input type="hidden" name="function" value="update_slot">
              
              <input type="hidden" name="slot" value="<?php echo $_GET['slot'];?>">
              <input type="hidden" name="date" value="<?php echo $_GET['date'];?>">
              <input type="hidden" name="month" value="<?php echo $_GET['month'];?>">
              <input type="hidden" name="year" value="<?php echo $_GET['year'];?>">

                
            
        
        
      </div>
      <div class="modal-body">
        <center>
        <input type="submit" class="btn btn-dark" name="update_slot" value="Update Slot">
        </center>
            </form>
      </div>
    </div>