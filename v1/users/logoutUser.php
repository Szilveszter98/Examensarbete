<?php
// includes
include("../../objects/users.php");

$user_handler = new User($databaseHandler);


$userID = (isset($_POST['id']) ? $_POST['id'] : '');
// callnig on deleteuserif we have user id

if (!empty($userID)) {


    $user_handler->logoutUser($userID);
} else {
    echo "Error with userID";
}




?>