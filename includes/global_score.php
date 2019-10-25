<?php 
session_start(); 
include_once '../includes/users_DB.php';


    if (empty($_SESSION['username'])) {
        echo "OOOPS";
    } else { 
        $username = $_SESSION['username'];

        $sqlSelect = "SELECT * FROM users WHERE Username='$username';";
        $selected = mysqli_query($connectDB, $sqlSelect);
    
        $row = mysqli_fetch_assoc($selected);
        $score = $row['Score']; 

        if (is_null($score)) {
            echo 'Global score: 0.00';
            
        } else {
            echo 'Global score: '.$score;
        }
    }