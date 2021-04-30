<?php
// includes

include("../../objects/companies.php");

$company_handler = new Company($databaseHandler);
// getting data with POST and watching if it has some specialchars
$companyName =(isset($_POST['companyName']) ? $_POST['companyName'] : '');
$companyName = htmlspecialchars($companyName); 
$description=(isset($_POST['description']) ? $_POST['description'] : '');
$telefonNummer=(isset($_POST['telefonNummer']) ? $_POST['telefonNummer'] : '');
$password=(isset($_POST['password']) ? $_POST['password'] : '');
$email=(isset($_POST['email']) ? $_POST['email'] : '');
$orgNummer=(isset($_POST['organisationsNummer']) ? $_POST['organisationsNummer'] : '');
$address=(isset($_POST['address']) ? $_POST['address'] : '');
$postnummer=(isset($_POST['postnummer']) ? $_POST['postnummer'] : '');
$type=(isset($_POST['type']) ? $_POST['type'] : '');
$description= htmlspecialchars($description); 
$telefonNummer= htmlspecialchars($telefonNummer); 
$password= htmlspecialchars($password); 
$email= htmlspecialchars($email); 
$orgNummer= htmlspecialchars($orgNummer); 
$address= htmlspecialchars($address); 
$postnummer= htmlspecialchars($postnummer); 
$type= htmlspecialchars($type); 
// register company
$company_handler->registerCompany($companyName, $description, $telefonNummer, $password, $email,  $orgNummer, $type, $address, $postnummer);
?>
<link rel="stylesheet" href="../../css/styles.css">
<?php
echo ("<div class='successfullCompanyRegistration'>");
echo ("<h1>Tack för att du registrerade</h1>");
echo ("<a href='loginCompany.php'><button class='submitButton'>Log in</button></a>");
echo ("</div>");
include('../../footer.php');