
<?php
// includes
include("../../objects/companies.php");

$company_handler = new Company($databaseHandler);
$companyID = (isset($_POST['id']) ? $_POST['id'] : '');

// callnig on LogoutCompany if we have company id

if (!empty($companyID)) {

    $company_handler->logoutCompany($companyID);
} else {
    echo "Error with companyID";
}

?>