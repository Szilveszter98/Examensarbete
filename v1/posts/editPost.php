<?php
// includes

    include("../../objects/posts.php");

    $post_handler = new Company($databaseHandler);


    $postID =(isset($_POST['id']) ? $_POST['id'] : '');
    
  
// Update user profile
 if(!empty($postID)) {
    $post_handler->updatePost($_POST['title'], $_POST['description'], $_POST['startDate'], $_POST['type'], $_POST['ort'], $_POST['email'],$_POST['telefonNummer'],$postID);
    header( 'Location: http://localhost/examensarbete/index.php' );
    } else {
        echo "update error";

    }

   

     
     echo("<center>");

    ?>