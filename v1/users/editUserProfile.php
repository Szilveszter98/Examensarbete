<?php
// includes

include("../../objects/users.php");

$user_handler = new User($databaseHandler);


$userID = (isset($_POST['id']) ? $_POST['id'] : '');
$token = (isset($_POST['token']) ? $_POST['token'] : '');

$firstname=(isset($_POST['firstname']) ? $_POST['firstname'] : '');
$firstname= htmlspecialchars($firstname); 
$lastname=(isset($_POST['lastname']) ? $_POST['lastname'] : '');
$lastname= htmlspecialchars($lastname); 
$username=(isset($_POST['username']) ? $_POST['username'] : '');
$username= htmlspecialchars($username); 
$password=(isset($_POST['password']) ? $_POST['password'] : '');
$password= htmlspecialchars($password); 
$email=(isset($_POST['email']) ? $_POST['email'] : '');
$email= htmlspecialchars($email); 

// Update user profile
if (!empty($userID)) {
    $user_handler->updateUserProfile($firstname, $lastname, $username, $password, $email, $userID); ?>
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