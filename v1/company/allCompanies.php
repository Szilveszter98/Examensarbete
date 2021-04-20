<?php


// includes
include("../../objects/companies.php");


$company_handler = new Company($databaseHandler);
$row = $company_handler->fetchAllCompanies();
$companiesID = $company_handler->fetchAllCompanyID();
$token = (isset($_POST['token']) ? $_POST['token'] : '');

?>
<link rel="stylesheet" href="../../css/styles.css">
<div class="searchContainer">
    <form method="POST" action="../users/userProfile.php">
        <input type='hidden' name='id' value='<?= $company['id'] ?>'>
        <input type='hidden' name='token' value='<?= $token ?>'>
        <input class="backButton" type="submit" value="Till profilsida" /></b>
    </form>
    <form method="POST" action="../../index.php">
        <input type='hidden' name='id' value='<?= $company['id'] ?>'>
        <input type='hidden' name='token' value='<?= $token ?>'>
        <input class="backButton" type="submit" value="Startsida" /></b>
    </form>
    <form method="POST" action="searchCompanies.php">
        <label for="gsearch">Sök bland registrerade företag:</label>
        <input type="search" name="searchWord" class="searchField">
        <input type="submit" class="searchButton">
    </form>
</div>
<hr>
<?php foreach ($row as $company) {?>
    <div class="companyInformation">
        <span>
            <h2><?= $company['companyName'] ?></h2></br>
        </span><br />
        <?php $logo = $company_handler->fetchAllCompaniesLogo($company['id']);
        if (!empty($logo['file_name'])) { ?>
            <img src='../../uploads/<?php echo $logo['file_name'] ?>'><br>
        <?php } ?>
        <span><?= $company['description'] ?></br></span><br />
        <span><?= $company['type'] ?></br></span><br />
        <form method="POST" action="companySite.php">
            <input type='hidden' name='id' value='<?= $company['id'] ?>'>
            <input type='hidden' name='token' value='<?= $token ?>'>
            <input class="submitButton" type="submit" value="Till företagssida" /></b>
        </form>
        </br>
        <hr>
    </div>
<?php
}

include("../../footer.php");
