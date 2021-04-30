<?php
// includes

include("../../objects/companies.php");

$company_handler = new Company($databaseHandler);


$companyID = (isset($_POST['id']) ? $_POST['id'] : '');
$token = (isset($_POST['token']) ? $_POST['token'] : '');

//successfull logo update
if (!empty($companyID)) {
    $company_handler->uploadCompanyLogo($_FILES['file']['name'], $_POST['id']);
?>
    <link rel="stylesheet" href="../../css/styles.css">
    <div class="logoUpdateFinished">
        <h1>Loggan är uppdaterad nu!</h1>
        <form method="POST" action="companyProfile.php">
            <input type='hidden' name='token' value='<?= $token ?>'>
            <input class="submitButton" type="submit" value="Tillbaka till Portfolion" />
        </form>
    </div>

<?php
} else {
    echo "update error";
}

?>