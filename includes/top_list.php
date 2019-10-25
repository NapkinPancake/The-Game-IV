<?php 
session_start(); 
if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username']; 
};
include_once '../includes/users_DB.php';


 $sqlSelect = "SELECT * FROM users ORDER BY Score DESC LIMIT 10;";
 $selected = mysqli_query($connectDB, $sqlSelect);
 
 if (mysqli_num_rows($selected) > 0) {
  echo "
 
  <table class='table table-borderless table-sm'> ";
    while ($row = mysqli_fetch_assoc($selected)) {
        $score = $row['Score'];
        $username = $row['Username'];
        echo "
        <tr>
        <td>$username</td>
        <td class='font-weight-bold'>$score</td>
        </tr>";
    };
    echo "</table>"; 
    echo "";
};

   
 


