<?php
// includes

    include("../../objects/users.php");

    $user_handler = new User($databaseHandler);


    $userID =(isset($_POST['id']) ? $_POST['id'] : '');
    $token=(isset($_POST['token']) ? $_POST['token'] : '');

    
// Update user profile
 if(!empty($userID)) {
    $user_handler->updateUserProfile($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['email'],$userID);
    echo"<center>";
    echo "<h1>Profilen är nu uppdaterad!</h1>";
 
     echo '<form method="POST" action="userProfile.php">';
     echo "<input type='hidden'  name='token' value='{$token}'>";
     echo '<input  type="submit" value="Tillbaka till Profil" /></b>';
     echo '</form>';
     echo "</center>";
    } else {
        echo "update error";

    }

   

     
     echo("<center>");

    ?>