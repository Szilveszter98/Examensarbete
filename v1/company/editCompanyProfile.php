<?php
// includes

include("../../objects/companies.php");

$company_handler = new Company($databaseHandler);
// Getting data with POST and watching if it has some specialchars
$token = (isset($_POST['token']) ? $_POST['token'] : '');
$companyID = (isset($_POST['id']) ? $_POST['id'] : '');
$companyName =(isset($_POST['companyName']) ? $_POST['companyName'] : '');
$description=(isset($_POST['description']) ? $_POST['description'] : '');
$telefonNummer=(isset($_POST['telefonNummer']) ? $_POST['telefonNummer'] : '');
$password=(isset($_POST['password']) ? $_POST['password'] : '');
$email=(isset($_POST['email']) ? $_POST['email'] : '');
$orgNummer=(isset($_POST['organisationsNummer']) ? $_POST['organisationsNummer'] : '');
$address=(isset($_POST['address']) ? $_POST['address'] : '');
$postnummer=(isset($_POST['postnummer']) ? $_POST['postnummer'] : '');
$type=(isset($_POST['type']) ? $_POST['type'] : '');
$companyName = htmlspecialchars($companyName); 
$description= htmlspecialchars($description); 
$telefonNummer= htmlspecialchars($telefonNummer); 
$password= htmlspecialchars($password); 
$email= htmlspecialchars($email); 
$orgNummer= htmlspecialchars($orgNummer); 
$address= htmlspecialchars($address); 
$postnummer= htmlspecialchars($postnummer); 
$type= htmlspecialchars($type); 

// Update company profile
if (!empty($companyID)) {
    $company_handler->updateCompanyProfile($companyName, $description, $telefonNummer, $password, $email,  $orgNummer, $type, $address, $postnummer, $companyID);
?>
    <link rel="stylesheet" href="../../css/styles.css">
    <div class="profileUpdated">
        <h1>Portfolio är nu uppdaterad!</h1>

        <form method="POST" action="companyProfile.php">
            <input type='hidden' name='token' value='<?= $token ?>'>
            <input class="submitButton" type="submit" value="Tillbaka till Portfolion" />
        </form>
    </div>
<?php
//else error
} else {
    echo "update error";
}
//footer
include("../../footer.php");
?>