<?php
// includes

    include("../../objects/users.php");

    $user_handler = new User($databaseHandler);


    $userID =(isset($_GET['id']) ? $_GET['id'] : '');
    
    
// Update user profile
 if(!empty($userID)) {
    $user_handler->updateUserProfile($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['email'],$userID);
    header( 'Location: http://localhost/examensarbete/index.php' );
    } else {
        echo "update error";

    }

   

     
     echo("<center>");

    ?>