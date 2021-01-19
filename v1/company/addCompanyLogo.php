<?php
// includes

    include("../../objects/companies.php");

    $company_handler = new Company($databaseHandler);


    $companyID =(isset($_POST['id']) ? $_POST['id'] : '');
  
    
    
  

 if(!empty($companyID)) {
    $company_handler->uploadCompanyLogo( $_FILES['file']['name'], $_POST['id']);
    
   // header( 'Location: http://localhost/examensarbete/index.php' );
    } else {
        echo "update error";

    }

   

     
     echo("<center>");

    ?>