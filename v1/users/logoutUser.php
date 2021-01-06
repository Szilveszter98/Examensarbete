
<?php
// includes
include("../../objects/users.php");

$user_handler = new User($databaseHandler);


$userID =(isset($_GET['id']) ? $_GET['id'] : '');
// callnig on deletePost if we have post id

 if(!empty($userID)) {
    

        $user_handler->logoutUser($userID);

    } else {
        echo "Error with postID";
    }

   
   

?>