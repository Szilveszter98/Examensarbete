<?php
// includes

    include("../../objects/users.php");

    $user_handler = new User($databaseHandler);
// register user 
     $user_handler->registerUser($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['email']);
     ?>
     <link rel="stylesheet" href="../../css/styles.css">
     <div class="registerFinished"></div>
   <h1>Tack för att du registrerade</h1>
    <button><a href='../../loginUser.php'>Log in</a></button>
   