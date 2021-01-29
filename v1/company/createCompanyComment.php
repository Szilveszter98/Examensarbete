<?php
include("../../objects/comments.php");

$comment_handler = new Comment($databaseHandler);
    
    $token =(isset($_POST['token']) ? $_POST['token'] : '');

    $companyID =(isset($_POST['companyID']) ? $_POST['companyID'] : '');


$comment =(isset($_POST['comment']) ? $_POST['comment'] : '');
$comment = htmlspecialchars($comment); 
$name =(isset($_POST['name']) ? $_POST['name'] : '');
$name = htmlspecialchars($name); 

    
// create post 
   
   $comment=$comment_handler->createComment( $companyID,$comment,$name);

    echo"<center>";
    echo "<h1>Kommentaren är nu publicerad!</h1>";
    
    echo ' <a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a>';

    echo "</center>";






?>