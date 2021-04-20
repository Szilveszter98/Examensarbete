<?php
include("../../objects/companies.php");

$company_handler = new Company($databaseHandler);

$token = (isset($_POST['token']) ? $_POST['token'] : '');
$companyID = (isset($_POST['id']) ? $_POST['id'] : '');
$file_name = (isset($_POST['file_name']) ? $_POST['file_name'] : '');
$delete_path = "../../uploads/" . $file_name;

$company_handler->deleteCompanyLogo($companyID, $file_name, $token); ?>
<link rel="stylesheet" href="../../css/styles.css">
<div class="deleteLogoFinished">
  <h1>Logon är bortagen nu!</h1>
  <h2>Vill du lägga till ny, kan du göra det på Portfolio sidan</h2>

  <form method="POST" action="companyProfile.php">
    <input type='hidden' name='token' value='<?= $token ?>'>
    <input class="submitButton" type="submit" value="Tillbaka till Portfolion" />
  </form>
</div>
<?php include("../../footer.php"); ?>