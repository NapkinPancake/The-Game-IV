<?php 
session_start(); 
$username = $_SESSION['username'];
include_once '../includes/users_DB.php';

if (isset($_POST['result']))  {
    $result = $_POST['result'];
    if (empty($username))  {
        header('location: ../index.php?unknownUser');
    } else {
        $sqlSelect = "SELECT * FROM users WHERE Username='$username';";
        $selected = mysqli_query($connectDB , $sqlSelect);
        $row = mysqli_fetch_assoc($selected);
        if (is_null($row['Results'])) {
            $resultsArr = array();
        } else {
            $resultsArr = json_decode($row['Results']);
        }
        
        array_push($resultsArr, $result);                     
        $resultsArrJSON = json_encode($resultsArr);  
        
        $sqlUpdate = " UPDATE users SET Results = ? WHERE Username = '$username' ;";
        $stmt = mysqli_stmt_init($connectDB);
        
        if (mysqli_stmt_prepare($stmt , $sqlUpdate)) {

            mysqli_stmt_bind_param($stmt , 's' ,  $resultsArrJSON);
            mysqli_execute($stmt);

            header('location: create_score.php ');
        } else {
            header('location: ../index.php?sql=problems');
        }
    }
} else  {
    header('location: ../index.php?comeThrougTheNormalPoint');
}


