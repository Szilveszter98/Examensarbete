<?php
// includes

include("../../objects/users.php");

$user_handler = new User($databaseHandler);


$userID = (isset($_POST['id']) ? $_POST['id'] : '');
$token = (isset($_POST['token']) ? $_POST['token'] : '');


// Update user profile
if (!empty($userID)) {
    $user_handler->updateUserProfile($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['email'], $userID); ?>
       <link rel="stylesheet" href="../../css/styles.css">
    <div class="editProfileFinished">
     
        <h1 >Profilen är nu uppdaterad!</h1>

        <form method="POST" action="userProfile.php">
            <input type='hidden' name='token' value='<?= $token ?>'>
            <input class="submitButton" type="submit" value="Tillbaka till Profilen" /></b>
        </form>
    </div>
<?php } else {
    echo "update error";
}





include("../../footer.php");
?>