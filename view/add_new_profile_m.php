<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_new_profile">
  Add New Profile
</button>
-->

<!-- Modal -->
<div class="modal fade" id="add_new_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <center>
        <h5 class="modal-title text-white" id="exampleModalLabel">Profile Link</h5>
        </center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        
        <center>
          <form method="post" action="index.php" enctype="multipart/form-data">
            <div class="row mb-3 pb-3">
              <label for="p_type"></label>&nbsp &nbsp

              <i class="fab fa-linkedin text-primary" style="font-size:36px;"></i> &nbsp &nbsp
              <input class="mt-2" type="radio" name="p_type" onclick="check();" value="linkedin" id="linkedin_link" > &nbsp &nbsp
              
              <i class="fab fa-facebook text-primary" style="font-size:36px;"></i> &nbsp &nbsp
              <input class="mt-2" type="radio" name="p_type" onclick="check();" value="facebook" id="facebook_link" > &nbsp &nbsp
              
              <i class="fab fa-twitter text-primary" style="font-size:36px;"></i> &nbsp &nbsp
              <input class="mt-2" type="radio" name="p_type" onclick="check();" value="twitter" id="twitter_link" > &nbsp &nbsp
              
              <i class="fab fa-youtube text-danger" style="font-size:36px;"></i> &nbsp &nbsp
              <input class="mt-2" type="radio" name="p_type" onclick="check();" value="youtube" id="youtube_link" > &nbsp &nbsp
              
              <i class="fa fa-id-card text-dark" style="font-size:36px;"></i> &nbsp &nbsp
              <input class="mt-2" type="radio" name="p_type" onclick="check();" value="portfolio" id="portfolio_link" > &nbsp &nbsp
              

              <i class="fab fa fa-certificate text-warning" text-info" style="font-size:36px;"></i> &nbsp &nbsp
              <input class="mt-2"  type="radio" name="p_type" onclick="check();" value="file" id="file" > &nbsp &nbsp

            </div>
            <div class="row" id="choose_file">
              <input type="file" name="file_name" >
              
            </div>
            <div class="row" id="enter_link">
              <input type="text" name="profile_link" >
              
            </div>

              <input type="hidden" name="controller" value="Counselling">
              <input type="hidden" name="function" value="add_new_profile">
              
          
          
        
        </center>

      </div>
      <div class="modal-body">
        <center>
        <input type="submit" name="add_profile" class="btn btn-info font-weight-bold"  value="Confirm">
        </center>


            </form>
      
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    document.getElementById('choose_file').style.display='none';
    document.getElementById('enter_link').style.display='none';

    function check(){
      if(document.getElementById('file').checked){
        document.getElementById('choose_file').style.display='block';
        document.getElementById('enter_link').style.display='none';
        
      }else {
        document.getElementById('choose_file').style.display='none';
        document.getElementById('enter_link').style.display='block';
      }
    }
</script>