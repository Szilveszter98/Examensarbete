
<?php
// includes
include("../../objects/users.php");

$user_handler = new User($databaseHandler);


$userID =(isset($_POST['id']) ? $_POST['id'] : '');
// callnig on deletePost if we have post id

 if(!empty($userID)) {
    

        $user_handler->deleteUser($userID);

    } else {
        echo "Error with postID";
    }

   
   

?>