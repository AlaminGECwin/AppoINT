<div class="container">
	<h1>setup counselor</h1>
	<a href="index.php?function=sign_out">Sign Out</a>
	
</div>
<div id="login">
        <h3 class="text-center text-dark pt-5">Counselor Setup form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="index.php" method="post" enctype="multipart/form-data">
                            <h3 class="text-center text-info">Step 1</h3>
                            <div class="form-group">
                                <label for="text" class="text-info">Profession:</label><br>
                                <input type="text" name="profession" id="profession" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="text" class="text-info">Designation:</label><br>
                                <input type="text" name="designation" id="designation" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="file" class="text-info">Profile Picture:</label><br>
                                <input type="file" name="profile_picture" id="file" class="form-control">
                            </div>
                            <input type="hidden" name="controller" value="Counselling">
                            <input type="hidden" name="function" value="send_request">
                            <input type="hidden" name="request_type" value="counselor_setup">
                            <div class="form-group">
                                
                                <input type="submit" name="setup_counselor" class="btn btn-info btn-md" value="Next">
                            </div>
                        </form>
                            
                    
                    </div>
                </div>
            </div>
        </div>
</div>