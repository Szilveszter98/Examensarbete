<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Login</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <!-- Inputs to login -->
    <?php include("indexHeader.php"); ?>
  
    <div class="companyLoginPage">
        <h1>Please log in <h1>
                <h2>Please enter your username and password</h2>
                
                <?php echo (isset($_GET['err']) && $_GET['err'] == true ? "<h1>Något gick fel! Försök Igen!</h1><hr>" : ""); ?>

                <form method="POST" action="v1/company/companyProfile.php">
                    Email:<br>
                    <input type="text" name="email" required><br />
                    Password:<br>
                    <input type="password" name="password" required><br />
                    <br>
                    <hr>
                    <br>
                    <input class="submit" type="submit" value="Log in" />
                    <br>
                    <p class="dontHaveAccount">Dont have an account?</p>

                </form>
                <div class="signupLinks">
                    <button><a href="signupUser.php">Registrera</a></button>
                    <button><a href="signupCompnay.php">Registrera som företag</a></button>
                </div>
               
    </div>
<?php include("footer.php"); ?>
</body>

</html>