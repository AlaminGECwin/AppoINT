<div id="login">
        <h3 class="text-center text-dark pt-5">Retrieve account form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="index.php" method="post">
                            <h3 class="text-center text-info">Forgotten Accoutn?</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>

                            <input type="hidden" name="controller" value="Counselling">
                            <input type="hidden" name="function" value="retrieve_account">
                            


                            <div class="form-group">
                                <input type="submit" name="send_code" class="btn btn-info btn-md" value="Send Code">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>