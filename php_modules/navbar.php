<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="#!" class="navbar-brand">The Game </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"> 
                <select name="lvl" class='form-control  form-control-lg' id="lvl">
                    <option value='' selected disabled hidden>Lvl</option>
                    <option value="Easy" id='dropEasy'>Easy</option>
                    <option value="Medium" id='dropMedium'>Meduim</option>
                    <option value="Hard" id='dropHard'>Hard</option>
                    <option value="Incredible" disabled >Incredible </option>
                </select>
            </li>
            <li class="nav-item  ml-5 my-auto"> <?php
             if (empty($_SESSION['username'])) {
                 echo " <h4  id='LiederShipTable'> </h4>";
             } 
             if (empty($_SESSION['score'])) {
               echo "";
             } else {
                    echo "<h4> Global score: ".$_SESSION['score']."</h4>";
                    
                }  
                ?>
            </li> 
         </ul>
         

            <a class='mx-2' href='#' <?php not_loged() ?> > Wanna competition? </a>
            <a class="btn btn-dark mx-1" href="php_modules/signup_form.php" role="button" <?php not_loged() ?> >Sign Up</a>
            <a class="btn btn-dark mx-1" href="php_modules/login_form.php" role="button"  <?php not_loged() ?> >Log In</a>
            <h2 class='nav-item mx-5' <?php loged() ?> ><?php echo $_SESSION['username'] ?> </h2>
            <a class="btn btn-dark mx-1" href="includes/logout.php" role="button" <?php loged() ?>>Log Out</a>
        
        
        <?php 
        function not_loged() {
        if (empty($_SESSION['username'])) { 
         echo "";
         } else {
         echo "hidden";
         } 
        } 

        function loged() {
            if (empty($_SESSION['username'])) { 
             echo "hidden";
             } else {
             echo "";
             } 
            } 
    
            ?> 
    </div>
</nav>