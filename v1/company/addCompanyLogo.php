<?php
// includes

    include("../../objects/companies.php");

    $company_handler = new Company($databaseHandler);


    $companyID =(isset($_POST['id']) ? $_POST['id'] : '');
    $token =(isset($_POST['token']) ? $_POST['token'] : '');
    
    
  

 if(!empty($companyID)) {
    $company_handler->uploadCompanyLogo( $_FILES['file']['name'], $_POST['id']);
    echo"<center>";
    echo "<h1>Logon uppdaterad nu!</h1>";
     echo '<form method="POST" action="companyProfile.php">';
     echo "<input type='hidden'  name='token' value='{$token}'>";
     echo '<input  type="submit" value="Tillbaka till Portfolion" /></b>';
     echo '</form>';
     echo "</center>";
    
   // header( 'Location: http://localhost/examensarbete/index.php' );
    } else {
        echo "update error";

    }

   

     

    ?>