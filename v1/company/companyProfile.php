<?php
// includes
include("../../objects/companies.php");
include("../../objects/comments.php");

$company_handler = new Company($databaseHandler);
$comment_handler = new Comment($databaseHandler);
$token = (isset($_POST['token']) ? $_POST['token'] : '');
if (!empty($token)) {
  $companyID = $company_handler->getCompanyId($token);
  $row = $company_handler->getCompanyData($companyID);
  $images = $company_handler->getCompanyImages($companyID);
  $logo = $company_handler->getCompanyLogo($companyID);
} else {
  $token = json_decode($company_handler->loginCompany($_POST['email'], $_POST['password']))->token;
  $companyID = $company_handler->getCompanyId($token);

  $row = $company_handler->getCompanyData($companyID);
  $images = $company_handler->getCompanyImages($companyID);
  $logo = $company_handler->getCompanyLogo($companyID);
}
?>
<link rel="stylesheet" href="../../css/styles.css">

<?php $companyID = $companyID['company_id']; ?>

<div class="companyContainer">
  <div class="companyButtonContainer">
    <form method="POST" action="../posts/allPost.php">
      <input type='hidden' name='companyID' value='<?= $companyID ?>'>
      <input type='hidden' name='token' value='<?= $token ?>'>
      <input class="submitButton" type="submit" value="Alla jobb" />
    </form>
    
    <form method="POST" action="editCompanyProfileForm.php">
      <input type='hidden' name='id' value='<?= $companyID ?>'>
      <input type='hidden' name='token' value='<?= $token ?>'>
      <input class="submitButton" type="submit" value="Ändra detaljer" />
    </form>
    
    <form method="POST" action="../../editCompanyImgForm.php">
      <input type='hidden' name='id' value='<?= $companyID ?>'>
      <input type='hidden' name='token' value='<?= $token ?>'>
      <input class="submitButton" type="submit" value="Lägg till bilder" />
    </form>
    
    <form method="POST" action="logoutCompany.php">
      <input type='hidden' name='id' value='<?= $companyID ?>'>
      <input type='hidden' name='token' value='<?= $token ?>'>
      <input class="submitButton" type="submit" value="Logga ut" />
    </form>
    
    <form method="POST" action="deleteCompany.php">
      <input type='hidden' name='id' value='<?= $companyID ?>'>
      <input type='hidden' name='token' value='<?= $token ?>'>
      <input class="submitButton" type="submit" value="Ta bort konto" />
    </form>
    
    <form method="POST" action="../../addCompanyLogoForm.php">
      <input type='hidden' name='id' value='<?= $companyID ?>'>
      <input type='hidden' name='token' value='<?= $token ?>'>
      <input class="submitButton" type="submit" value="Byta Logo" />
    </form>
    
    <form method="POST" action="../products/allProducts.php">
      <input type='hidden' name='companyID' value='<?= $companyID ?>'>
      <input type='hidden' name='token' value='<?= $token ?>'>
      <input class="submitButton" type="submit" value="Tjänster" />
    </form>
  </div>
  <div class="companyData">
    <?php if (!empty($logo)) { ?>

      <img src='../../uploads/<?php echo $logo['file_name'] ?>' style='width: 300px; height: 150px;'>
      <form method="POST" action="deleteCompanyLogo.php">
        <input type='hidden' name='id' value='<?= $row['id'] ?>'>
        <input type='hidden' name='token' value='<?= $token ?>'>
        <input type='hidden' name='file_name' value='<?= $logo['file_name'] ?>'>
        <input class="submitButton" type="submit" value="Ta bort logon" />
      </form>


    <?php
    }


    foreach ($images as $image) { ?>
      <img src='../../uploads/<?php echo $image['file_name'] ?>' style='width: 500px; height: 300px;'><br />
      <form method="POST" action="deleteCompanyImg.php">
        <input type='hidden' name='id' value='<?= $row['id'] ?>'>
        <input type='hidden' name='token' value='<?= $token ?>'>
        <input type='hidden' name='file_name' value='<?= $image['file_name'] ?>'>
        <input class="submitButton" type="submit" value="Ta bort bilden" />
      </form>

    <?php } ?>


    <span>
      <h4><?= $row['companyName'] ?></h4>
    </span><br />
    <span>
      <h4><?= $row['description'] ?></h4>
    </span><br />
    <span>
      <h4>Org.nr:<?= $row['organisationsNummer'] ?></h4>
    </span><br />
    <span>
      Typ:<?= $row['type'] ?>
    </span><br />
    <span>
      Adress<address><?= $row['address'] ?></address>
    </span><br />
    <span>
      <h4>Postnummer:<?= $row['postnummer'] ?></h4>
    </span><br />
    <span>
      <h4>Tel.nummer:<?= $row['telefonNummer'] ?></h4>
    </span><br />
    <span>
      <h4>Email: <?= $row['email'] ?></h4>
    </span><br />
  </div>

  <?php
  $companyID = $row['id'];
  //OMDÖME



  $comments = $comment_handler->fetchAllComments($companyID);

  if (!empty($comments)) {
    foreach ($comments as $comment) { ?>

      <h3>Omdöme</h3>
      <br>
      <span><?= $comment['name'] ?></span>
      <br />
      <span><?= $comment['comment'] ?></span>
      <br />
      <span>Posted:<?= $comment['date_posted'] ?></span>
      <br />

      <form method="POST" action="deleteCompanyComment.php">
        <input type='hidden' name='companyID' value='<?= $companyID ?>'>
        <input type='hidden' name='commentID' value='<?= $comment['ID'] ?>'>
        <input type='hidden' name='token' value='<?= $token ?>'>
        <input class="submitButton" type="submit" value="Ta bort omdöme" />
        <hr>
    <?php
    }
  }
    ?>

</div>
<?php include("../../footer.php"); ?>