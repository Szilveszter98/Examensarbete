<?php

include("../../objects/faktura.php");
$faktura_handler = new FakturaData($databaseHandler);

$companyID =(isset($_POST['companyID']) ? $_POST['companyID'] : '');
$token =(isset($_POST['token']) ? $_POST['token'] : '');
$productID =(isset($_POST['productID']) ? $_POST['productID'] : '');
$companyReferens =(isset($_POST['companyReferens']) ? $_POST['companyReferens'] : '');
$productName =(isset($_POST['productName']) ? $_POST['productName'] : '');
$productPrice =(isset($_POST['productPrice']) ? $_POST['productPrice'] : '');
$companyAddress =(isset($_POST['address']) ? $_POST['address'] : '');
$companyName =(isset($_POST['companyName']) ? $_POST['companyName'] : '');
$productValidTime =(isset($_POST['validTime']) ? $_POST['validTime'] : '');

$companyReferens = htmlspecialchars($companyReferens); 
$companyName = htmlspecialchars($companyName); 
$companyAddress = htmlspecialchars($companyAddress); 


 $faktura_handler->insertPremiumCompaniesToDatabase($companyID,$companyReferens, $productName, $productPrice, $companyAddress, $companyName, $productValidTime);
 

 echo "<center>";
 echo "Tack för ditt köp!";
 
 
 echo '<form method="POST" action="printFaktura.php">';
 echo "<input type='hidden'  name='companyID' value='{$companyID}'>";
 echo "<input type='hidden'  name='token' value='{$token}'>";
 echo '<input  type="submit" value="Till Fakturan" /></b>';
 echo '</form>';
