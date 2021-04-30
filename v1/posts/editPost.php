<?php
// includes

include("../../objects/posts.php");
//post handler and data what we getting with POST
$post_handler = new Post($databaseHandler);
$postID = (isset($_POST['id']) ? $_POST['id'] : '');
$token = (isset($_POST['token']) ? $_POST['token'] : '');

$title=(isset($_POST['title']) ? $_POST['title'] : '');
$description=(isset($_POST['description']) ? $_POST['description'] : '');
$telefonNummer=(isset($_POST['telefonNummer']) ? $_POST['telefonNummer'] : '');
$startDate=(isset($_POST['startDate']) ? $_POST['startDate'] : '');
$type=(isset($_POST['type']) ? $_POST['type'] : '');
$email=(isset($_POST['email']) ? $_POST['email'] : '');
$ort=(isset($_POST['ort']) ? $_POST['ort'] : '');


//watching specialchars
$description= htmlspecialchars($description); 
$telefonNummer= htmlspecialchars($telefonNummer); 
$title= htmlspecialchars($title); 
$email= htmlspecialchars($email); 
$startDate= htmlspecialchars($startDate); 
$ort= htmlspecialchars($ort); 
$type= htmlspecialchars($type);
// Update post
if (!empty($postID)) {

    $post_handler->updatePost($title, $description, $startDate, $type, $ort, $email, $telefonNummer, $postID);
?>
    <link rel="stylesheet" href="../../css/styles.css">
<?php
    echo '<div class="finishedPostUpdate">';
    echo '<h1>Uppdateringen är klar</h1>';
    echo '<form method="POST" action="../users/userProfile.php">';
    echo "<input type='hidden'  name='token' value='{$token}'>";
    echo '<input class="submitButton" type="submit" value="Tillbaka till Portfolion" /></b>';
    echo '</form>';
    echo '</div>';
    include("../../footer.php");
} else {
    echo "update error";
}

echo ("<center>");

?>