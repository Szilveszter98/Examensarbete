<?php
// includes

    include("../../objects/posts.php");

    $post_handler = new Post($databaseHandler);


    $postID =(isset($_POST['postID']) ? $_POST['postID'] : '');
    $token=(isset($_POST['token']) ? $_POST['token'] : '');
    
    
  

 if(!empty($postID)) {
    $post_handler->uploadPostImages( $_FILES['file']['name'], $_POST['postID']);
    echo"<center>";
    echo "<h1>Bilden uppdaterad nu!</h1>";
     echo '<form method="POST" action="../users/userProfile.php">';
     echo "<input type='hidden'  name='token' value='{$token}'>";
     echo '<input  type="submit" value="Tillbaka till Portfolion" /></b>';
     echo '</form>';
     echo "</center>";
   // header( 'Location: http://localhost/examensarbete/index.php' );
    } else {
        echo "update error";

    }

   

     
     echo("<center>");

    ?>