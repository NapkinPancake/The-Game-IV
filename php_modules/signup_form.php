<?php 
    session_start();

    include 'html-head.html';    
    include 'span_utils.php';

    //ob_start();    
?>

<body>

    <div class="container">
        <div class="row  mt-5">
            <div class="col-4"></div>
            <div class="col-4" class=''>
                <form method="POST" id=userForm action='../includes/signup.php' class="border p-5  log_form">
                    <div class=form-group>
                        <span class="form-group badge badge-danger" <?php name_already_used() ?>>The name is already used</span>
                        <input type="text" class='form-control  form-control-lg' name="username" id="Username"
                            placeholder="Player Name" required value='<?php include 'functions/value=name.php'?>'> 
                             
                    </div>
                           
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" name="pass" id="PlayerPass"
                            placeholder="Password" required>
                            
                    </div>
                    <div class="form-group">
                        <div class="custom control custom-switch">
                            <input type="checkbox" class='custom-control-input' id='customSwitch1' name='mystery'
                                aria-label="Wanna be cute">
                            <label for="customSwitch1" class="custom-control-label">Wanna have specific game
                                match</label>
                        </div>

                    </div>
                    <div class=form-group>
                        <input type="submit" class='btn btn-dark btn-lg' name="submit" id="nameButt" value="Choose">
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