
<?php
// includes
include("../../objects/companies.php");

$company_handler = new Company($databaseHandler);


$CompanyID =(isset($_GET['id']) ? $_GET['id'] : '');
// callnig on deletePost if we have post id

 if(!empty($companyID)) {
    

        $company_handler->logoutCompany($companyID);

    } else {
        echo "Error with companyID";
    }

   
   

?>