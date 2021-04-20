<?php
// includes

include("../../objects/companies.php");
?>
<link rel="stylesheet" href="../../css/styles.css">
<?php
$company_handler = new Company($databaseHandler);
$searchWord = (isset($_POST['searchWord']) ? $_POST['searchWord'] : '');

if (!empty($searchWord)) {
  $result = $company_handler->searchCompanies($searchWord);
} ?>
<link rel="stylesheet" href="../../css/styles.css">

<div>
  <form method="POST" action="../../index.php">

    <input type='hidden' name='postID' value='<?= $row['ID'] ?>'>
    <input class="submitButton" type="submit" value="Tillbaka till startsidan" /></b>
  </form>
</div>
<?php
echo '<div class="searchField">';
echo '<form method="POST" action="searchCompanies.php">';
echo '<label for="gsearch">Sök bland registrerade företag:</label>';
echo '<input class="inputField" type="search"  name="searchWord">';
echo '<br>';
echo '<input class="submitButton" type="submit">';
echo '</form>';
echo "<h2>Sökresultat</h2><hr>";
echo '</div>';
foreach ($result as $row) {

  echo '<div class="searchResult">';
  echo "<span><h1>" . " " . $row['companyName'] . "</h1></br></span><br/>";
  echo "<span>" . " " . $row['type'] . "</br></span><br/>";
  echo "<span>" . " " . $row['description'] . "</br></span><br/>";
  echo '<form method="POST" action="http://localhost/examensarbete/v1/company/companySite.php">';
  echo "<input type='hidden'  name='id' value='{$row['id']}'>";
  echo '<input class="submitButton" type="submit" value="Läs mer" /></b>';
  echo '</form>';
  echo '</div>';
  echo "<hr>";
}


include("../../footer.php");

?>