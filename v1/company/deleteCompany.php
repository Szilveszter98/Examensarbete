
<?php
// includes
include("../../objects/companies.php");

$company_handler = new Company($databaseHandler);


$companyID =(isset($_POST['id']) ? $_POST['id'] : '');

// callnig on deletePost if we have post id

 if(!empty($companyID)) {
    

        $company_handler->deleteCompany($companyID);

    } else {
        echo "Error with companyID";
    }

   
   

?>