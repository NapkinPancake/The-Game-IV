<?php session_start(); ?> 
<?php include 'html-head.html' ?>

<body>

    <div class="container">
        <div class="row  mt-5">
            <div class="col-4"></div>
            <div class="col-4" >
                <form method="POST" id=userForm action='../includes/login.php' class="border p-5  log_form">
                    <div class=form-group>
                        <span class="form-group badge badge-danger" <?php include 'functions/no_such_user_SPAN.php'?> > No such user</span>
                        <span class="form-group badge badge-danger" <?php include 'functions/wrong_pass_SPAN.php'?> > Wrong password</span>
                        <input type="text" class='form-control  form-control-lg' name="username" id="Username"
                            placeholder="Player Name" required value='<?php include 'functions/value=name.php'?>'> 
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" name="pass" id="PlayerPass"
                            placeholder="Password" required>
                            
                    </div>
                    <div class=form-group>
                        <input type="submit" class='btn btn-dark btn-lg mt-3' name="login-submit" id="nameButt" value="Choose">
                    </div>

                </form>
            </div>
            <div class="col-2"></div>
            <div class="col-2">
                <ul id=LiederShipTable>

                </ul>
            </div>
        </div>
        <div>

        <?php include 'html-foot.html'?>