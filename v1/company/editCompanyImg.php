<?php
// includes

include("../../objects/companies.php");

$company_handler = new Company($databaseHandler);

// getting data with POST
$companyID = (isset($_POST['id']) ? $_POST['id'] : '');
$token = (isset($_POST['token']) ? $_POST['token'] : '');



//showing information if upload was successfull
if (!empty($companyID)) {
    $company_handler->uploadCompanyImages($_FILES['file']['name'], $_POST['id']); ?>
    <link rel="stylesheet" href="../../css/styles.css">
    <div class="updatedCompanyImages">
        <h1>Bilden uppdaterad nu!</h1>
        <form method="POST" action="companyProfile.php">
            <input type='hidden' name='token' value='<?= $token ?>'>
            <input class="submitButton" type="submit" value="Tillbaka till Portfolion" />
        </form>
    </div>
<?php
//otherwise error message
} else {
    echo "update error";
}
//footer
include("../../footer.php");


?>