<?php
include("../../objects/companies.php");

$company_handler = new Company($databaseHandler);


$companyID =(isset($_POST['id']) ? $_POST['id'] : '');

$file_name = (isset($_POST['file_name']) ? $_POST['file_name'] : '');

$delete_path = "../../uploads/" . $file_name;

if(!unlink($delete_path)){
   
    
} else {
    
}
 $company_handler->deleteCompanyImages($companyID, $file_name);


?>