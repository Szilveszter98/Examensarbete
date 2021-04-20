<?php


// includes
include("../../objects/companies.php");
include("../../objects/comments.php");
$company_handler = new Company($databaseHandler);
$comment_handler = new Comment($databaseHandler);

$token = (isset($_POST['token']) ? $_POST['token'] : '');

$companyID = (isset($_POST['id']) ? $_POST['id'] : '');


$row = $company_handler->fetchSingleCompany($companyID);

$images = $company_handler->fetchCompanyImages($companyID);
$logo = $company_handler->fetchCompanyLogo($companyID);
?>
<link rel="stylesheet" href="../../css/styles.css">
<div class="backButtonContainer">
  <form method="POST" action="allcompanies.php">
    <input type='hidden' name='token' value='<?= $token ?>'>
    <input class="backButton" type="submit" value="Till alla företag" />
  </form>

</div>
<div class="companyInformationContainer">

  <?php if (!empty($logo)) { ?>
    <img src='../../uploads/<?php echo $logo['file_name'] ?>'>
  <?php } ?>

  <span>
    <h1><?= $row['companyName'] ?></h1>
  </span></br>
  <h3><span><?= $row['description'] ?></span></br></h3>
  <br>
  <h4><span><?= $row['type'] ?></span></br>
    <br>
    <span>Org.nr: <?= $row['organisationsNummer'] ?></span></br>
    <span>Adress: <?= $row['address'] ?></span></br>
    <span>Postnummer: <?= $row['postnummer'] ?></span></br>
    <span>Tel.nr: <?= $row['telefonNummer'] ?></span></br>
    <span>Email: <?= $row['email'] ?></span>
  </h4></br>
</div>
<hr>
<div class="companyImagesContainer">
  <?php foreach ($images as $image) { ?>
    <img src='../../uploads/<?php echo $image['file_name'] ?>'><br />

  <?php } ?>
</div>
<hr>
<div class="commentsContainer">
  <h3>Lägg till omdöme!</h3>
  <form method="POST" action="createCompanyComment.php">
    <label for="comment">Namn</label><br>
    <input class="inputField" type="text" id="name" name="name"><br>
    <br>
    <label for="comment">Kommentar fält</label><br>
    <textarea class="commentField" type="text" rows="5" cols="50" id="comment" name="comment"></textarea><br>
    <input type='hidden' name='token' value=<?= $token ?>'>
    <input type='hidden' name='companyID' value='<?= $companyID ?>'>
    <input class="sendButton" type="submit" value="Publicera" />
  </form>
  <h1> Omdöme</h1><br>
  <?php
  $comments = $comment_handler->fetchAllComments($companyID);
  if (!empty($comments)) {
    foreach ($comments as $comment) { ?>


      <h4><span><?= $comment['name'] ?></span><br />
        <span><?= $comment['comment'] ?></span><br />
        <span>Posted:<?= $comment['date_posted'] ?></span>
      </h4><br />
      <hr>

  <?php
    }
  } ?>
</div>
<?php


include("../../footer.php");
