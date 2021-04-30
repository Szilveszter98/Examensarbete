
<?php
// includes
include("../../objects/companies.php");

$company_handler = new Company($databaseHandler);

$companyID = (isset($_POST['id']) ? $_POST['id'] : '');

// callnig on deleteCompany if we have company id

if (!empty($companyID)) {

    $company_handler->deleteCompany($companyID);
    header('Location: http://localhost/examensarbete/index.php');
} else {
    echo "Error with companyID";
}

?>