<?php
if (isset($_POST['submit'])) {

    session_start(); 
    include_once '../includes/users_DB.php';
    
    $username = $_POST['username'];
    $mystery = $_POST['mystery'];
    $password = $_POST['pass'];
    
    
    $_SESSION['username'] = $username;
    
    $sqlCheck = "SELECT * FROM users WHERE Username ='$username';";
    $result = mysqli_query($connectDB , $sqlCheck);
    $resultCheck = mysqli_num_rows($result);
    
    
    if ($resultCheck > 0 ) {
        header('location: ../php_modules/signup_form.php?name=alreadyInUse');
    } elseif (empty($username)) {
        header('location: ../php_modules/signup_form.php?name=incorrect');
    } else {
        $sqlAddUser =  "INSERT INTO users (Username , Mystery , Password ) VALUES (? , ? , ?);";
        $stmt = mysqli_stmt_init($connectDB);
        if (!mysqli_stmt_prepare($stmt , $sqlAddUser)) {
            header('location: ../php_modules/signup_form.php?MySQLproblems');
        }  else {
            $hashedPass = password_hash($password , PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt , 'sss' , $username , $mystery , $hashedPass);
            mysqli_stmt_execute($stmt);
            header('location: ../index.php?Signup=success');
        }
    }
    
} else {
    header('location: ../index.php?ComeThroughTheForm');
}
 