<?php 
session_start(); 
$username = $_SESSION['username'];
include_once '../includes/users_DB.php';

if (isset($_POST['globalScore'])) {
    if (empty($username)) {
        header('location: ../index.php?noUsername');
    } else { 
        $sqlSelect = "SELECT * FROM users WHERE Username='$username';";
        $selected = mysqli_query($connectDB, $sqlSelect);
    
        $row = mysqli_fetch_assoc($selected);
        $score = $row['Score'];
    
        $_SESSION['score'] = $score;
        header('location: ../index.php?displayGlobalScore');
    }
} else { 
    header('location: ../index.php?noUsername');
}