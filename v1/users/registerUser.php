<?php
// includes

include("../../objects/users.php");

$user_handler = new User($databaseHandler);

$firstname=(isset($_POST['firstname']) ? $_POST['firstname'] : '');
$firstname= htmlspecialchars($firstname); 
$lastname=(isset($_POST['lastname']) ? $_POST['lastname'] : '');
$lastname= htmlspecialchars($lastname); 
$username=(isset($_POST['username']) ? $_POST['username'] : '');
$username= htmlspecialchars($username); 
$password=(isset($_POST['password']) ? $_POST['password'] : '');
$password= htmlspecialchars($password); 
$email=(isset($_POST['email']) ? $_POST['email'] : '');
$email= htmlspecialchars($email); 

// register user 
$user_handler->registerUser($firstname, $lastname, $username, $password, $email);
?>
<link rel="stylesheet" href="../../css/styles.css">
<div class="registerFinished"></div>
<h1>Tack för att du registrerade</h1>
<button><a href='../../loginUser.php'>Log in</a></button>