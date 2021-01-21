<?php
// includes

    include("../../objects/companies.php");

    $company_handler = new Company($databaseHandler);

   $token=(isset($_POST['token']) ? $_POST['token'] : '');
    $companyID =(isset($_POST['id']) ? $_POST['id'] : '');
    
  
// Update user profile
 if(!empty($companyID)) {
    $company_handler->updateCompanyProfile( $_POST['companyName'], $_POST['description'], $_POST['telefonNummer'], $_POST['password'], $_POST['email'],$_POST['organisationsNummer'], $_POST['address'],$_POST['postnummer'],$companyID);
    echo"<center>";
    echo "<h1>Portfolio är nu uppdaterad!</h1>";
 
     echo '<form method="POST" action="companyProfile.php">';
     echo "<input type='hidden'  name='token' value='{$token}'>";
     echo '<input  type="submit" value="Tillbaka till Portfolion" /></b>';
     echo '</form>';
     echo "</center>";
    } else {
        echo "update error";

    }

   

     
     echo("<center>");

    ?>