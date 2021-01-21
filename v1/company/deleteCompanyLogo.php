<?php
include("../../objects/companies.php");

$company_handler = new Company($databaseHandler);

$token=(isset($_POST['token']) ? $_POST['token'] : '');
$companyID =(isset($_POST['id']) ? $_POST['id'] : '');

$file_name = (isset($_POST['file_name']) ? $_POST['file_name'] : '');

$delete_path = "../../uploads/" . $file_name;

if(!unlink($delete_path)){
   
    
} else {
    
}
 $company_handler->deleteCompanyLogo($companyID, $file_name, $token);
echo"<center>";
echo "<h1>Logon är bortagen nu!</h1>";
echo "<h2>Vill du lägga till ny, kan du göra det på Portfolio sidan</h2>";

     echo '<form method="POST" action="companyProfile.php">';
     echo "<input type='hidden'  name='token' value='{$token}'>";
     echo '<input  type="submit" value="Tillbaka till Portfolion" /></b>';
     echo '</form>';

?>