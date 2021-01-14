<?php
// includes

    include("../../objects/posts.php");

    $post_handler = new Post($databaseHandler);
    $userID =(isset($_POST['id']) ? $_POST['id'] : '');
// create post 
     $post_handler->createPost($userID,$_POST['title'], $_POST['description'], $_POST['startDate'], $_POST['type'], $_POST['ort'], $_POST['email'],$_POST['telefonNummer']);

    ?>