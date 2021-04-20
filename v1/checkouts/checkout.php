<?php
// includes
include("../../objects/companies.php");
include("../../objects/products.php");

$company_handler = new Company($databaseHandler);
$product_handler = new Product($databaseHandler);


$companyID = (isset($_POST['companyID']) ? $_POST['companyID'] : '');
$token = (isset($_POST['token']) ? $_POST['token'] : '');
$productID = (isset($_POST['productID']) ? $_POST['productID'] : '');
$row = $company_handler->fetchCompanyData($companyID);
$product = $product_handler->fetchSingleProduct($productID);
if (!empty($token)) { ?>
    <link rel="stylesheet" href="../../css/styles.css">
<?php

    echo '<div class="checkoutContainer">';
    echo '<h1>Vald produkt:</h1><br>';
    echo "<img src='../../uploads/" . $product['file_name'] . "'style='width: 500px; height: 300px;'>";
    echo "<span><h1>" . " " . $product['name'] . "</h1></br></span><br/>";
    echo "<span>" . " " . $product['price'] . "kr</br></span><br/>";
    echo "<span>" . " " . $product['validTime'] . "</br></span><br/>";

    echo '<h1> Fyll i informationen nedan</h1> ';
    echo '<form method="POST" action="sendDataToFaktura.php">';

    echo "<input type='hidden'  name='companyID' value='{$companyID}'>";
    echo "<input type='hidden'  name='productID' value='{$productID}'>";
    echo "<input type='hidden'  name='productPrice' value='{$product['price']}'>";
    echo "<input type='hidden'  name='productName' value='{$product['name']}'>";
    echo "<input type='hidden'  name='validTime' value='{$product['validTime']}'>";
    echo "<input type='hidden'  name='token' value='{$token}'>";
    echo '<h4>Företagsnamn</h4>';
    echo "<input type='text' class='inputField' name='companyName' value='{$row['companyName']}' required>";
    echo '<br/>';
    echo '<h4>Företags email</h4>';
    echo "<input type='text'class='inputField' name='companyEmail' value='{$row['email']}' required>";
    echo '<br/>';
    echo '<h4>Företags referens</h4>';
    echo '<input type="text"class="inputField" name="companyReferens"  required>';
    echo '<br/>';
    echo '<h4>Fakturerings address</h4>';
    echo "<input type='text' name='address' class='inputField' value='{$row['address']}' required>";
    echo '<br/>';
    echo '<hr>';
    echo '  <input class="submitButton"  type="submit" value="Avsluta köp" /></br>';
    echo ' </form>';
    echo '</div>';
    include("../../footer.php");
} else {
    echo "<h1>Du måste logga in för att kunna köpa tjänsten!</br>";
    echo "<a href='http://localhost/examensarbete/loginCompany.php'> Logga in </a></h1>";
}
