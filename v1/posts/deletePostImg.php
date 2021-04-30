<?php
//includes
include("../../objects/posts.php");
//posthandler
$post_handler = new post($databaseHandler);
//getting data with POST
$token = (isset($_POST['token']) ? $_POST['token'] : '');
$postID = (isset($_POST['postID']) ? $_POST['postID'] : '');
$file_name = (isset($_POST['file_name']) ? $_POST['file_name'] : '');
$delete_path = "../../uploads/" . $file_name;
//Deleting post image
if (!unlink($delete_path)) {
    echo "error";


} else {
    $post_handler->deletePostImages($postID, $file_name);
?>
<link rel="stylesheet" href="../../css/styles.css">
<?php
echo "<div class='deletPostImgFinished'>";
echo "<h1>Bilden är bortagen nu!</h1>";
echo "<h2>Vill du lägga till ny bild, kan du göra det på Portfolio sidan</h2>";

echo '<form method="POST" action="../users/userProfile.php">';
echo "<input type='hidden'  name='token' value='{$token}'>";
echo '<input class="submitButton" type="submit" value="Tillbaka till Portfolion" /></b>';
echo '</form>';
echo '</div>';

include("../../footer.php");
}