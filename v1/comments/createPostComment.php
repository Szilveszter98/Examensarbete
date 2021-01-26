<?php
include("../../objects/comments.php");

$comment_handler = new Comment($databaseHandler);
    $userID =(isset($_POST['userID']) ? $_POST['userID'] : '');
    $token =(isset($_POST['token']) ? $_POST['token'] : '');

    $companyID =(isset($_POST['companyID']) ? $_POST['companyID'] : '');
    $postID =(isset($_POST['postID']) ? $_POST['postID'] : '');
// create post 
   
   $comment=$comment_handler->createComment($userID, $companyID, $_POST['comment'], $postID);

    echo"<center>";
    echo "<h1>Inlägget är nu publicerad!</h1>";
    
    echo '<form method="POST" action="../users/userProfile.php">';
    echo "<input type='hidden'  name='token' value='{$token}'>";
    echo '<input  type="submit" value="Tillbaka till profilen" /></b>';
    echo '</form>';
    echo "</center>";






?>