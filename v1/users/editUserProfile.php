<?php
// includes

    include("../../objects/users.php");

    $user_handler = new User($databaseHandler);


    $userID =(isset($_POST['id']) ? $_POST['id'] : '');
    
    print_r($userID);
    
// Update user profile
 if(!empty($userID)) {
    $user_handler->updateUserProfile($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['email'],$userID);
    header( 'Location: http://localhost/examensarbete/index.php' );
    } else {
        echo "update error";

    }

   

     
     echo("<center>");

    ?>