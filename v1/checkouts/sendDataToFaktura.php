<?php
// includes
include("../../objects/faktura.php");
include("../../objects/premiumCompanies.php");
// functions and database connections
$faktura_handler = new FakturaData($databaseHandler);
$premiumOneMonth_handler = new OneMonth($databaseHandler);
$premiumThreeMonth_handler = new ThreeMonth($databaseHandler);
$premiumSixMonth_handler = new SixMonth($databaseHandler);

// Getting the data with POST
$companyID = (isset($_POST['companyID']) ? $_POST['companyID'] : '');
$token = (isset($_POST['token']) ? $_POST['token'] : '');
$productID = (isset($_POST['productID']) ? $_POST['productID'] : '');
$companyReferens = (isset($_POST['companyReferens']) ? $_POST['companyReferens'] : '');
$productName = (isset($_POST['productName']) ? $_POST['productName'] : '');
$productPrice = (isset($_POST['productPrice']) ? $_POST['productPrice'] : '');
$companyAddress = (isset($_POST['address']) ? $_POST['address'] : '');
$companyName = (isset($_POST['companyName']) ? $_POST['companyName'] : '');
$productValidTime = (isset($_POST['validTime']) ? $_POST['validTime'] : '');
$companyEmail = (isset($_POST['companyEmail']) ? $_POST['companyEmail'] : '');
// Watching if datan has some specialchar
$companyReferens = htmlspecialchars($companyReferens);
$companyName = htmlspecialchars($companyName);
$companyAddress = htmlspecialchars($companyAddress);
$companyEmail = htmlspecialchars($companyEmail);
// whatching what product the client bought
if ($productID == 1) {
    $premiumOneMonth_handler->createToken($companyID, $productID, $companyEmail);
} elseif ($productID == 2) {
    $premiumThreeMonth_handler->createToken($companyID, $productID, $companyEmail);
} elseif ($productID == 3) {
    $premiumSixMonth_handler->createToken($companyID, $productID, $companyEmail);
}
//sending data to database
$faktura_handler->insertPremiumCompaniesToDatabase($companyID, $companyReferens, $productName, $productPrice, $companyAddress, $companyName, $productValidTime);

?>

<link rel="stylesheet" href="../../css/styles.css">
<?php
// html if everything was successfull
echo '<div class="paymentSuccess">';
echo "<h1>Tack för ditt köp!</h1>";


echo '<form method="POST" action="printFaktura.php">';
echo "<input type='hidden'  name='companyID' value='{$companyID}'>";
echo "<input type='hidden'  name='token' value='{$token}'>";
echo '<input class="submitButton" type="submit" value="Till Fakturan" /></b>';
echo '</form>';

echo '<form method="POST" action="../company/companyProfile.php"';
echo "<input type='hidden'  name='companyID' value='{$companyID}'>";
echo "<input type='hidden'  name='token' value='{$token}'>";
echo '<input class="submitButton" type="submit" value="Till portfolion" /></b>';
echo '</form>';
echo '</div>';

include("../../footer.php");
