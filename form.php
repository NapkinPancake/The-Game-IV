<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="jquery-3.4.1.min.js"></script>
</head>
<body>
<h1>Hello,<?php  $name = $_POST['name'] ; if (isset($name)) { printf($name);} ?> </h1>
<form action="" method="POST">
<input type="text" name="name" >
<input type="submit" name="submit" id='nameButt'>
</form>
    <script>
   /* $('#nameButt').click( function() {
        $.ajax({
            url: "form.php",
            method: "POST",
            
        })
    })
 */   
     </script>
</body>
</html>