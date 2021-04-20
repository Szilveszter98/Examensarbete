<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrera User</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <!-- Inputs to registeration -->
    <?php include("indexHeader.php"); ?>
    <div class="signupUserPage">
        <h1> Please register an account!</h1>
        <form method="POST" action="v1/users/registerUser.php">
            Firstname:<br />
            <input type="text" name="firstname" required>
            <br />
            Lastname:<br />
            <input type="text" name="lastname" required>
            <br />
            Username:<br />
            <input type="text" name="username" required>
            <br />
            Password: <br />
            <input type="password" name="password" required>
            <br />
            E-mail: <br />
            <input type="email" name="email" required>
            <br />
            <br>
            <hr>
            <br>
            <input class="submit" type="submit" value="Register" /></b>
        </form>
       
    </div>
     <?php include("footer.php"); ?>
</body>

</html>