<?php
// includes

    include("../../objects/users.php");

    $user_handler = new User($databaseHandler);
// register user 
     $user_handler->registerUser($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['email']);
     echo("<center>");
     echo("<h1>Tack för att du registrerade</h1>");
     echo("<button><a href='../../loginUser.php'>Log in</a></button>");
   
    // header("location:../../loginUser.php");
    ?>