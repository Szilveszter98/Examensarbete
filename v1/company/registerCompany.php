<?php
// includes

    include("../../objects/companies.php");

    $company_handler = new Company($databaseHandler);
// register user 
     $company_handler->registerCompany($_POST['companyName'], $_POST['description'], $_POST['telefonNummer'], $_POST['password'], $_POST['email'],$_POST['organisationsNummer'], $_POST['address'],$_POST['postnummer']);

     echo("<center>");
     echo("<h1>Tack för att du registrerade</h1>");
     echo("<button><a href='../../loginCompany.php'>Log in</a></button>");
   
    // header("location:../../loginUser.php");
    ?>