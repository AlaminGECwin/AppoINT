<div class="container">
	<h1>sector setup counselor</h1>
	<a href="index.php?function=sign_out">Sign Out</a>
	
</div>
<div id="login">
        <h3 class="text-center text-dark pt-5">Counselor Sector Setup form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="index.php" method="post" >
                            <h3 class="text-center text-info">Step 2</h3>
                            <div class="form-group">
                                <label for="text" class="text-info">Sector:</label><br>
                                <input type="text" name="sector" id="sector" class="form-control" placeholder="By what Client can search you.">
                            </div>
                            
                            <input type="hidden" name="controller" value="Counselling">
                            <input type="hidden" name="function" value="send_request">
                            <input type="hidden" name="request_type" value="counselor_add_sector">
                            <div class="form-group">
                                
                                <input type="submit" name="add_sector" class="btn btn-info btn-md" value="Finish">
                            </div>
                        </form>
                            
                    
                    </div>
                </div>
            </div>
        </div>
</div>