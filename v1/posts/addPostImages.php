<?php
// includes

include("../../objects/posts.php");

$post_handler = new Post($databaseHandler);
//getting data with POST
$postID = (isset($_POST['postID']) ? $_POST['postID'] : '');
$token = (isset($_POST['token']) ? $_POST['token'] : '');
//image added to post and to database successfully
if (!empty($postID)) {
    $post_handler->uploadPostImages($_FILES['file']['name'], $_POST['postID']);
    ?>
    <link rel="stylesheet" href="../../css/styles.css">
    <?php
    echo "<div class='postImageAdded' >";
    echo "<h1>Bilden uppdaterad nu!</h1>";
    echo '<form method="POST" action="../users/userProfile.php">';
    echo "<input type='hidden'  name='token' value='{$token}'>";
    echo '<input class="submitButton" type="submit" value="Tillbaka till Portfolion" /></b>';
    echo '</form>';
    echo "</div>";
    include("../../footer.php");
    
} else {
    echo "update error";
}


