<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobbnärverk</title>
</head>
<body>
<?php
$userID =(isset($_GET['id']) ? $_GET['id'] : '');
    
    
?>
   <!-- Inputs to registeration -->
<center>
<h1> Edit profile details</h1>    
<form method="POST" action="v1/users/editUserProfile.php?id=<?php echo $_GET['id'];?>">
firstname:<br />
<input type="text" name="firstname" required>
<br />
lastname:<br />
<input type="text" name="lastname" required>
<br />
Username:<br />
<input type="text" name="username" required>
<br />
Password: <br />
<input type="password" name="password"required>
<br />
E-mail: <br />
<input type="email" name="email" required>
<br />
<hr>
<input  type="submit" value="Confirm" /></b>
</form>
</center>
</body>
</html>