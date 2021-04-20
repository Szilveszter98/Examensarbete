<link rel="stylesheet" href="../../css/styles.css">

<?php


// includes
include("../../objects/products.php");

$product_handler = new Product($databaseHandler);

$companyID = (isset($_POST['companyID']) ? $_POST['companyID'] : '');
$token = (isset($_POST['token']) ? $_POST['token'] : '');
$productID = (isset($_POST['productID']) ? $_POST['productID'] : '');

$product = $product_handler->fetchSingleProduct($productID);
?>


<div class="singleProduct">
   <div class="backButtonContainer">
      <form method="POST" action="allProducts.php">
         <input type='hidden' name='token' value='<?=$token?>'>
         <input class="submitButton" type="submit" value="Tillbaka till produkter" />
      </form>
   </div>
   <img src='../../uploads/<?php echo $product['file_name'] ?>'>
   <span>
      <h1><?php echo $product['name'] ?></h1></br>
   </span><br />
   <span><?php echo $product['description'] ?></br></span><br />
   <span><?php echo $product['price'] ?>kr</br></span><br />

   <form method="POST" action="http://localhost/examensarbete/v1/checkouts/checkout.php">
      <input type='hidden' name='productID' value='<?=$productID?>'>
      <input type='hidden' name='companyID' value='<?=$companyID?>'>
      <input type='hidden' name='token' value='<?=$token?>'>
      <input class="submitButton" type="submit" value="Köp" />
   </form>
</div>

<?php include("../../footer.php"); ?>