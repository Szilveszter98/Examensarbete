<?php
// includes

    include("../../objects/companies.php");

    $company_handler = new Company($databaseHandler);


    $companyID =(isset($_POST['id']) ? $_POST['id'] : '');
  
    
    
  
// Update user profile
 if(!empty($companyID)) {
    $company_handler->uploadCompanyImages( $_FILES['file']['name'], $_POST['id']);
    print_r($companyID);
   // header( 'Location: http://localhost/examensarbete/index.php' );
    } else {
        echo "update error";

    }

   

     
     echo("<center>");

    ?>