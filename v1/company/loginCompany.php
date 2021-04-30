<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Login</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    
    <?php include("../../indexHeader.php"); ?>
  <!-- Inputs to login -->
    <div class="companyLoginPage">
        <h1>Please log in <h1>
                <h2>Please enter your username and password</h2>
                
                <?php echo (isset($_GET['err']) && $_GET['err'] == true ? "<h1>Något gick fel! Försök Igen!</h1><hr>" : ""); ?>

                <form method="POST" action="companyProfile.php">
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
                <!--to registrations buttons-->
                <div class="signupLinks">
                    <button><a href="../users/userIndex.php">Registrera</a></button>
                    <button><a href="signupCompany.php">Registrera som företag</a></button>
                </div>
               
    </div>
<?php include("../../footer.php"); ?>
</body>

</html>