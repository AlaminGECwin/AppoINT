<div id="login">
        <h3 class="text-center text-dark pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="index.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control" required="true">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required="true">
                            </div>
                            <input type="hidden" name="controller" value="Counselling">
                            <input type="hidden" name="function" value="send_request">
                            <input type="hidden" name="request_type" value="user_sign_in">
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="sign_in" class="btn btn-info btn-md" value="Sign in">
                            </div>
                        </form>
                            <div id="leftbox">
                                <div id="register-link" class="text-left ">
                                    <a href="index.php?function=sign_up" class="text-info">Don't have account?</a>
                                </div>
                            </div>
                            <div id="rightbox">

                                <div id="register-link" class="text-right ">
                                    <a href="index.php?function=forgotten_account_email&hh=sfs" class="text-info">Forgotten account?</a>
                                </div>
                            </div>
                    
                    </div>
                </div>
            </div>
        </div>
</div>