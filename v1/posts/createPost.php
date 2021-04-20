<?php
// includes

include("../../objects/posts.php");

$post_handler = new Post($databaseHandler);
$userID = (isset($_POST['id']) ? $_POST['id'] : '');
print_r($userID);
$token = (isset($_POST['token']) ? $_POST['token'] : '');


$title=(isset($_POST['title']) ? $_POST['title'] : '');
$description=(isset($_POST['description']) ? $_POST['description'] : '');
$telefonNummer=(isset($_POST['telefonNummer']) ? $_POST['telefonNummer'] : '');
$startDate=(isset($_POST['startDate']) ? $_POST['startDate'] : '');
$type=(isset($_POST['type']) ? $_POST['type'] : '');
$email=(isset($_POST['email']) ? $_POST['email'] : '');
$ort=(isset($_POST['ort']) ? $_POST['ort'] : '');



$description= htmlspecialchars($description); 
$telefonNummer= htmlspecialchars($telefonNummer); 
$title= htmlspecialchars($title); 
$email= htmlspecialchars($email); 
$startDate= htmlspecialchars($startDate); 
$ort= htmlspecialchars($ort); 
$type= htmlspecialchars($type);

// create post 
if (!empty($userID)) {  
    $post_handler->createPost($userID, $title, $description, $startDate, $type, $ort, $email, $telefonNummer);

    $row = $post_handler->fetchLastPost();

?>
    <link rel="stylesheet" href="../../css/styles.css">
    <div class="postSuccessContainer">
        <h1>Inlägget är nu publicerad!</h1>

        <span><?= $row['title'] ?></br></span><br />
        <span><?= $row['description'] ?></br></span><br />
        <span><?= $row['type'] ?></br></span><br />
        <span><?= $row['ort'] ?></br></span><br />
        <span><?= $row['email'] ?></br></span><br />
        <span><?= $row['telefonNummer'] ?></br></span><br />
        <span><?= $row['startDate'] ?></br></span><br />
        <span><?= $row['date'] ?></br></span><br />


        <form method="POST" action="../../addImagesToPost.php">
            <input type='hidden' name='token' value='<?= $token ?>'>
            <input type='hidden' name='postID' value='<?= $row['ID'] ?>'>
            <input type="submit" value="Lägg till bild" /></b>
        </form>

        <form method="POST" action="../users/userProfile.php">
            <input type='hidden' name='token' value='<?= $token ?>'>
            <input type="submit" value="Tillbaka till profilen" /></b>
        </form>
    </div>
<?php

} else {
    echo "Error with companyID";
}


?>