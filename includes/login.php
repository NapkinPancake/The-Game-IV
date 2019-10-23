<?php 

if (isset($_POST['login-submit'])) {

    session_start();
    require 'users_DB.php' ;

    $username = $_POST['username'];
    $password = $_POST['pass'];

    $_SESSION['username'] = $username;

    if (empty($username) || empty($password) ) {
        header('location: ../php_modules/login_form.php?emtyFields'); 
    } else {
        $sql = "SELECT * FROM users WHERE Username=?;";
        $stmt = mysqli_stmt_init($connectDB);
        if (!mysqli_stmt_prepare($stmt , $sql)) {
            header('location: ../php_modules/login_form.php?MySQLproblems'); 
        } else {
            mysqli_stmt_bind_param($stmt , 's' , $username);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);

            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck == 0) {
                $_SESSION['NoSuchUser'] = true;
                $_SESSION['WrongPass'] = false;
                header('location: ../php_modules/login_form.php?NoSuchUser'); 
            } else {
                $_SESSION['NoSuchUser'] = false;
                $row = mysqli_fetch_assoc($result);
                $passVerify = password_verify($password , $row['Password']);
    
                if ($passVerify == false) {
                    $_SESSION['WrongPass'] = true;
                    header('location: ../php_modules/login_form.php?wrongPass'); 
                } else if ($passVerify == true) {
                    $_SESSION['username'] = $row['Username'];
                    header('location: ../index.php?loginSUCCES');
                }
            }
        }
    }

}
else {
    header('location: ../index.php');
}