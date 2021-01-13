<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    <!-- Inputs to login -->
<center>
<?php
echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel! Försök Igen!<hr>" : "");
?>

<h1>Please log in <h1> 
<h2 >Please enter your username and password</h2>
  
<form method="POST" action="v1/users/userProfile.php">
Username:<br>
<input type="text" name="username" required><br/>
Password:<br>
<input type="password" name="password" required><br />
<hr>
<input class="submit" type="submit" value="Log in" />
<p>Dont have an account?</p>
<b>
<a  href="signupUser.php">Registrera</a>
</br>
<a  href="signupCompnay.php">Registrera som företag</a>
</b>
</form>

</center>

</body>
</html>