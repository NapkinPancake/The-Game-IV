<?php include_once 'usersDB.php';

$username = $_POST['username'];
$password = $_POST['pass'];
$mystery = $_POST['mystery'];

$sql =  "INSERT INTO users (Username , Password , Mystery ) VALUES ('$username' , '$password' , '$mystery');";

mysqli_query($connectDB, $sql);

echo "Hello ".$username;

header('location: ../php_modules/UserForm.html');