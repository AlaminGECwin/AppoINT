<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
-->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <center>
        <h5 class="modal-title text-white text-center" id="exampleModalLabel">Your Specific Problem can make it accepted.</h5>
        </center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        
        

          <form id="login-form" class="form" action="" method="post">              
              <div class="form-group">
                  <label for="username" class="text-info">Your Problem:</label><br>
                  <input type="text" name="username" id="username" class="form-control">
              </div>
              <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-dark btn-md" value="Send the Request">
              </div>
              
          </form>
        
        
        
      </div>
    </div>
  </div>
</div>