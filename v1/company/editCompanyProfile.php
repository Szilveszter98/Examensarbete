<?php
// includes

    include("../../objects/companies.php");

    $company_handler = new Company($databaseHandler);


    $companyID =(isset($_GET['id']) ? $_GET['id'] : '');
    
  
// Update user profile
 if(!empty($companyID)) {
    $company_handler->updateCompanyProfile( $_POST['companyName'], $_POST['description'], $_POST['telefonNummer'], $_POST['password'], $_POST['email'],$_POST['organisationsNummer'], $_POST['address'],$_POST['postnummer'],$companyID);
    header( 'Location: http://localhost/examensarbete/v1/company/companyProfile.php' );
    } else {
        echo "update error";

    }

   

     
     echo("<center>");

    ?>