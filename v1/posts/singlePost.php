<?php
// includes
include("../../objects/posts.php");

include("../../objects/companies.php");
include("../../objects/users.php");


$post_handler = new Post($databaseHandler);
$company_handler = new Company($databaseHandler);
$user_handler = new User($databaseHandler);



$token = (isset($_POST['token']) ? $_POST['token'] : '');
$companyID = (isset($_POST['companyID']) ? $_POST['companyID'] : '');
$userID = (isset($_POST['userID']) ? $_POST['userID'] : '');
$postID = (isset($_POST['postID']) ? $_POST['postID'] : '');


$post = $post_handler->fetchSinglePost($postID);
?>
<link rel="stylesheet" href="../../css/styles.css">
<?php
echo '<div class="backButtonContainer">';
echo '<form method="POST" action="../posts/allPost.php">';
echo "<input type='hidden'  name='companyID' value='{$companyID}'>";
echo "<input type='hidden'  name='token' value='{$token}'>";
echo '<input class="submitButton" type="submit" value="Tillbaka" /></b>';
echo '</form>';
echo '</div>';
echo '<div class="singlePostContainer">';
echo "<span>" . " <h1>" . $post['title'] . "</h1></span><br/>";
echo "<span>" . "<h3>Beskrivning:</h3>" . $post['description'] . "</span><br/>";
echo "<span>" . " <h3>Typ av arbete:</h3>" . $post['type'] . "</span><br/>";
echo "<span>" . " <h3>Ort:</h3>" . $post['ort'] . "</span><br/>";
echo "<span>" . "<h3>Önskad tid:</h3> " . $post['startDate'] . "</span><br/>";
echo "<span>" . " <h3>Email:</h3>" . $post['email'] . "</span><br/>";
echo "<span>" . " <h3>Tel.nummer</h3>" . $post['telefonNummer'] . "</span><br/>";
echo "<span>" . " Inlägget skapades:" . $post['date'] . "</span><br/>";
$images = $post_handler->fetchPostImages($postID);
echo "<br>";
echo "<div class='singlePostIMGContainer'>";
foreach ($images as $image) {



   echo "<img src='../../uploads/" . $image['file_name'] . "'>";
}
echo '</div>';
echo '</div>';
include("../../footer.php");




?>