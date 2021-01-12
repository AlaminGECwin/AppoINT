<div id="login">
    <h3 class="text-center text-dark pt-5">Retrieve account form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="index.php?function=sign_in" method="post">
                        <h3 class="text-center text-info">Forgotten Accoutn?</h3>
                        <div class="form-group">
                            <label for="password" class="text-info">New Password:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Confirm Password:</label><br>
                            <input type="text" name="confirm_password" id="password" class="form-control">
                        </div>


                        <input type="hidden" name="controller" value="Counselling">
                        <input type="hidden" name="function" value="update_user_password">
                        <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>">
                        

                        <div class="form-group">
                            <input type="submit" name="update_password" class="btn btn-info btn-md" value="Confirm">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
