<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update_time_slot">
  Update
</button>
-->

<!-- Modal -->
<div class="modal fade" id="update_time_slot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <center>
        <h5 class="modal-title text-white " id="exampleModalLabel">Update time slot</h5>
        </center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-warning  ">
        <?php
        echo "<br>Slot : ".$_SESSION['slot'];
        echo "<br>Date : ".$_SESSION['date'];
        echo "<br>Month : ".$_SESSION['month'];
        echo "<br>Year : ".$_SESSION['year'];
        ?>
        
        <center>
            <form>
              <div class="row mb-3 pb-3">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                <div class="col-lg-6">
                  <?php
                  available_button(); 
                  ?>  
                </div>
                 &nbsp &nbsp
                <input class="mt-2" type="radio" name="s_type"  value="link" > &nbsp &nbsp <br>
              </div>

              <div class="row mb-3 pb-3">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                <div class="col-lg-6">
                  <?php
                  booked_button(); 
                  ?>  
                </div> &nbsp &nbsp
                <input class="mt-2" type="radio" name="s_type"  value="link" > &nbsp &nbsp <br>
              </div>

              <div class="row mb-3 pb-3">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                <div class="col-lg-6">
                  <?php
                  not_available_button(); 
                  ?>  
                </div> &nbsp &nbsp
                <input class="mt-2" type="radio" name="s_type"  value="link" > &nbsp &nbsp <br>
              </div>
                
            </form>
        </center>
        
      </div>
      <div class="modal-body">
        <center>
        <button type="button" class="btn btn-dark" data-dismiss="modal">Update Slot</button>
        </center>
      </div>
    </div>
  </div>
</div>