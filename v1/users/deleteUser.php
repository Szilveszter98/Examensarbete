<?php
// includes and handler
include("../../objects/users.php");

$user_handler = new User($databaseHandler);


$userID =(isset($_POST['id']) ? $_POST['id'] : '');
// callnig on deleteuser if we have user id

 if(!empty($userID)) {
    
        $user_handler->deleteUser($userID);

    } else {
        echo "Error with userID";
    }
