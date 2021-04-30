<?php


// includes and user handler

include("../../objects/users.php");


$user_handler = new User($databaseHandler);

$token = (isset($_POST['token']) ? $_POST['token'] : '');


// watching if user has token
if (!empty($token)) {
// if token then getting  userdata
    $userID = $user_handler->getUserId($token);
    $row = $user_handler->getUserData($userID);
} else {
// if no token then user have to log in again 
    $token = json_decode($user_handler->loginUser($_POST['username'], $_POST['password']))->token;
    $userID = $user_handler->getUserId($token);
    $row = $user_handler->getUserData($userID);
}



?>

<link rel="stylesheet" href="../../css/styles.css">
<div class="mainContainer">


    <?php
    //explaining what the userid is
     $USERID = $row['id'] ?>
     <!-- Buttons-->
    <div class="buttonContainer">
        <form method="POST" action="../posts/createPostForm.php">
            <input type='hidden' name='token' value='<?php echo $token ?>'>
            <input type='hidden' name='id' value='<?php echo $USERID ?>'>
            <input class="submitButton" type="submit" value="Skapa inlägg" />
        </form>
        
        <form method="POST" action="editUserProfileForm.php">
            <input type='hidden' name='id' value="<?php echo $USERID ?>">
            <input type='hidden' name='token' value='<?php echo $token ?>'>
            <input class="submitButton" type="submit" value="Ändra detaljer" />
        </form>
        
        <form method="POST" action="../company/allcompanies.php">
            <input type='hidden' name='token' value="<?php echo $token ?>">
            <input class="submitButton" type="submit" value="Se alla företag" /></b>
        </form>
        
        <form method="POST" action="logoutUser.php">
            <input type='hidden' name='id' value="<?php echo $USERID ?>">
            <input class="submitButton" type="submit" value="Logga ut" />
        </form>
        
        <form method="POST" action="deleteUser.php">
            <input type='hidden' name='id' value="<?php echo $USERID ?>">
            <input class="submitButton" type="submit" value="Delete Profile" />
        </form>
        
        
    </div>
    <!--Showing the userdata-->
    <div class='userData'>
            <span><?= $row['username'] ?></span><br>
            <span><?= $row['firstname'] . " " . $row['lastname'] ?></span><br>
            <span><?= $row['email'] ?></span>
        </div>
    <?php

//getting users posts
//includes and handlers
    include("../../objects/posts.php");
    $userID = $row['id'];


    $post_handler = new Post($databaseHandler);

    $userID = $row['id'];
    //getting post with help of user id
    $posts = $post_handler->getPostWithUserID($userID);
//fetching posts
    foreach ($posts as $post) {


        $postID = $post['ID'];
        $images = $post_handler->fetchPostImages($postID);





    ?>

        <div class="posts">
            <div>
                <h1>Mina arbete</h1>
                <br>
                <div class="postData">
                    <h2><?= $post['title'] ?></h2><br />
                    <span>Beskrivning: <?= $post['description'] ?></span><br />
                    <span>Arbetstyp: <?= $post['type'] ?></span><br />
                    <span>Ort: <?= $post['ort'] ?></span><br />
                    <span>Publiceringsdatum: <?= $post['date'] ?></span><br />
                    <span>Email adress: <?= $post['email'] ?></span><br />
                    <span>Tel.nr: <?= $post['telefonNummer'] ?></span><br />
                    <span>Önskade startdatum <?= $post['startDate'] ?></span><br />
                </div>
                <br>
            </div>
            <?php
            foreach ($images as $image) { ?>
                <img src='../../uploads/<?php echo $image['file_name'] ?>'><br />
                <br>
                <form method="POST" action="../posts/deletePostImg.php">
                    <input type='hidden' name='postID' value='<?= $postID ?>'>
                    <input type='hidden' name='token' value='<?= $token ?>'>
                    <input type='hidden' name='file_name' value='<?= $image['file_name'] ?>'>
                    <input class="submitButton" type="submit" value="Ta bort bilden" />
                </form>
                <br>

            <?php } ?>




            <form method="POST" action="../posts/editPostForm.php">
                <input type='hidden' name='id' value='<?= $postID ?>'>
                <input type='hidden' name='token' value='<?= $token ?>'>
                <input class="submitButton" type="submit" value="Radigera inlägg" /></b>
            </form>
            <br>
            <form method="POST" action="../posts/deletePost.php">
                <input type='hidden' name='id' value='<?= $postID ?>'>
                <input type='hidden' name='token' value='<?= $token ?>'>
                <input class="submitButton" type="submit" value="Ta bort inlägg" />
            </form>
            <br>
        </div>
        <hr>
</div>

<?php
    }//footer
    include("../../footer.php"); ?>