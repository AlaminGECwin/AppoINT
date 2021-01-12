<div id="login">
    <h3 class="text-center text-dark pt-5">Create account</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="index.php" method="post">
                        <h3 class="text-center text-info">Sign Up</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">First Name:</label><br>
                            <input type="text" name="first_name" id="username" class="form-control" required="true">
                        </div>

                        <div class="form-group">
                            <label for="username" class="text-info">Last Name:</label><br>
                            <input type="text" name="last_name" id="username" class="form-control" required="true">
                        </div>

                        <div class="form-group">
                            <label for="username" class="text-info">Email:</label><br>
                            <input type="text" name="email" id="username" class="form-control" required="true">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="text" name="password" id="password" class="form-control" required="true">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Confirm Password:</label><br>
                            <input type="text" name="confirm_password" id="password" class="form-control" required="true">
                        </div>


                        <div class="form-group">
                            
                          
                            <label class="text-info" for="exampleFormControlSelect1">Select user Type:</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="user_type">
                              <option value="counselor">Counselor</option>
                              <option value="client">Client</option>
                            </select>
                                                       
                        </div>

                        <center>
                            <input type="hidden" name="controller" value="Counselling">
                            <input type="hidden" name="function" value="send_request">
                            <input type="hidden" name="request_type" value="user_registry">

                        <div class="form-group ">
                            
                            <input type="submit" name="register" class="btn btn-info btn-md" value="Create account">
                        </div>

                        </center>

                        
                        
                        <div id="register-link" class="text-center">
                            <a href="index.php?function=registration_help" class="text-info">Registration Help</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>