<?php
include("../../objects/comments.php");

$comment_handler = new Comment($databaseHandler);
    
    $token =(isset($_POST['token']) ? $_POST['token'] : '');

    $companyID =(isset($_POST['companyID']) ? $_POST['companyID'] : '');

// getting data with POST and watching if it has some specialchars
$comment =(isset($_POST['comment']) ? $_POST['comment'] : '');
$comment = htmlspecialchars($comment); 
$name =(isset($_POST['name']) ? $_POST['name'] : '');
$name = htmlspecialchars($name); 
// create comment
$comment=$comment_handler->createComment( $companyID,$comment,$name);
?>
<link rel="stylesheet" href="../../css/styles.css">
<?php
    echo"<div class='successfullComment'>";
    echo "<h1>Kommentaren är nu publicerad!</h1>";
    echo ' <a href="javascript:history.go(-1)" title="Return to the previous page"><button class="submitButton"> Tillbaka</button></a>';
    echo "</div>";
    include("../../footer.php"); ?>
