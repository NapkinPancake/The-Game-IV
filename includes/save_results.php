<?php 
session_start(); 

include_once '../includes/users_DB.php';

    if (!empty($_SESSION['username']) && isset($_POST['result']))  {
        $username = $_SESSION['username'];

        $sqlSelect = "SELECT * FROM users WHERE Username='$username';";
        $selected = mysqli_query($connectDB , $sqlSelect);
        $row = mysqli_fetch_assoc($selected);
        if (is_null($row['Results'])) {
            $resultsArr = array();
        } else {
            $resultsArr = json_decode($row['Results']);
        }

        $result = $_POST['result'];
        array_push($resultsArr, $result);      
        
        $sum = array_sum($resultsArr);
        $games = count($resultsArr);
        $scoreNoDecimals = $sum/$games;
        $score = number_format($scoreNoDecimals , $decimals = 2);
        $_SESSION['score'] = $score;
        
        $resultsArrJSON = json_encode($resultsArr);  
        
        $sqlUpdate = " UPDATE users SET Results = ? WHERE Username = '$username' ;";
        $stmt = mysqli_stmt_init($connectDB);
        
        if (mysqli_stmt_prepare($stmt , $sqlUpdate)) {

            mysqli_stmt_bind_param($stmt , 's' ,  $resultsArrJSON);
            mysqli_execute($stmt);

        } 
        $sqlUpdate = " UPDATE users SET Score = ? WHERE Username = '$username' ;";
        $stmt = mysqli_stmt_init($connectDB);

         if (mysqli_stmt_prepare($stmt , $sqlUpdate)) {
           
           mysqli_stmt_bind_param($stmt , 's' ,  $score);
           mysqli_execute($stmt);
         }
    }




