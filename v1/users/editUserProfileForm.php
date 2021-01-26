<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobbnärverk</title>
</head>
<body>
<?php
include("../../objects/users.php");
//include("../../userHeader.php");
    $user_handler = new User($databaseHandler);
$userID =(isset($_POST['id']) ? $_POST['id'] : '');
$token=(isset($_POST['token']) ? $_POST['token'] : '');
$row = $user_handler->fetchUserData($userID);

?>
   <!-- Inputs to registeration -->
<center>
<h1> Edit profile details</h1>    
<form method="POST" action="editUserProfile.php">

<input type='hidden'  name='id' value='<?php echo $userID?>'>
<input type='hidden'  name='token' value='<?php echo $token?>'>
firstname:<br />
<input type="text" name="firstname" value='<?php echo $row['firstname']?>' required>
<br />
lastname:<br />
<input type="text" name="lastname" value='<?php echo $row['lastname']?>' required>
<br />
Username:<br />
<input type="text" name="username" value='<?php echo $row['username']?>' required>
<br />
Password: <br />
<input type="password" name="password"required>
<br />
E-mail: <br />
<input type="email" name="email" value='<?php echo $row['email']?>' required>
<br />
<hr>
<input  type="submit" value="Confirm" /></b>
</form>
</center>
</body>
</html>