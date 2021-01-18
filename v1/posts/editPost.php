<?php
// includes

    include("../../objects/posts.php");

    $post_handler = new Post($databaseHandler);


    $postID =(isset($_POST['id']) ? $_POST['id'] : '');
       
    
    
  
// Update user profile
 if(!empty($postID)) {
   
    $post_handler->updatePost($_POST['title'], $_POST['description'], $_POST['startDate'], $_POST['type'], $_POST['ort'], $_POST['email'], $_POST['telefonNummer'], $_POST['id']);
    
    header('location: http://localhost/examensarbete/v1/posts/allPost.php');

    } else {
        echo "update error";

    }

   

     
     echo("<center>");

    ?>