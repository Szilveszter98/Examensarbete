<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobbnärverk</title>
</head>

<body>
    <?php //includes and handlers and data with POST
    include("../../objects/users.php");
    $user_handler = new User($databaseHandler);
    $userID = (isset($_POST['id']) ? $_POST['id'] : '');
    $token = (isset($_POST['token']) ? $_POST['token'] : '');
    $row = $user_handler->fetchUserData($userID);

    ?>
    <!-- Inputs to edit user profile -->
    <link rel="stylesheet" href="../../css/styles.css">
    <div class=editProfileForm>
        <h1> Edit profile details</h1>
        <form method="POST" action="editUserProfile.php">

            <input type='hidden' name='id' value='<?php echo $userID ?>'>
            <input type='hidden' name='token' value='<?php echo $token ?>'>
            <h4>Firstname:</h4>
            <input type="text" class="inputField" name="firstname" value='<?php echo $row['firstname'] ?>' required>
            <br />
            <h4>lastname:</h4>
            <input type="text" class="inputField" name="lastname" value='<?php echo $row['lastname'] ?>' required>
            <br />
            <h4>Username:</h4>
            <input type="text" class="inputField" name="username" value='<?php echo $row['username'] ?>' required>
            <br />
            <h4>Password: </h4>
            <input type="password" class="inputField" name="password" required>
            <br />
            <h4>E-mail:</h4>
            <input type="email" class="inputField" name="email" value='<?php echo $row['email'] ?>' required>
            <br />
            <br />
            <hr>
            <input class="submitButton" type="submit" value="Confirm" /></b>
        </form>
    </div>
    <?php include("../../footer.php"); ?>
</body>

</html>