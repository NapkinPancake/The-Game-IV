<?php 
session_start(); 
$username = $_SESSION['username'];
include_once '../includes/users_DB.php';

if (empty($username)) {
    header('location: ../index.php?unknownUserGetWaiter');
} else {
    $sqlSelect = "SELECT * FROM users WHERE Username='$username';";
    $selected = mysqli_query($connectDB, $sqlSelect);
    
    $row = mysqli_fetch_assoc($selected);
    $resultsArrJSON = $row['Results'];
    $resultsArr = json_decode ($resultsArrJSON);
    
    $sum = array_sum($resultsArr);
    $games = count($resultsArr);
    $scoreNoForm = $sum/$games;
    $score = number_format($scoreNoForm , $decimals = 2);

    $_SESSION['score'] = $score;

    
    $sqlUpdate = " UPDATE users SET Score = ? WHERE Username = '$username' ;";
    $stmt = mysqli_stmt_init($connectDB);
     if (mysqli_stmt_prepare($stmt , $sqlUpdate)) {
           
        mysqli_stmt_bind_param($stmt , 's' ,  $score);
        mysqli_execute($stmt);

        header('location: ../index.php?scoringSuccess');
        } else {

        header('location: ../index.php?sql=problems');
        }
    }