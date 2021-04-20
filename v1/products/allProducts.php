<?php


// includes
include("../../objects/products.php");


$product_handler = new Product($databaseHandler);

$companyID = (isset($_POST['companyID']) ? $_POST['companyID'] : '');
$token = (isset($_POST['token']) ? $_POST['token'] : '');
$row = $product_handler->fetchAllProducts();
?> 
<link rel="stylesheet" href="../../css/styles.css">
<div class="productsPage">
<a  href="javascript:history.go(-1)" title="Return to the previous page"><button class="backButton"> Tillbaka</button></a>
<div class="productsContainer">
    
<?php
foreach ($row as $product) {


?>
   


    <div class="singleProductContainer">
    
        <img src='../../uploads/<?php echo $product['file_name'] ?>' >
        <span>
            <h1><?= $product['name'] ?></h1></br>
        </span><br />
        <span><?= $product['description'] ?></br></span><br />
        <span><?= $product['price'] ?>kr</br></span><br />


        <form method="POST" action="singleProduct.php">
            <input type='hidden' name='companyID' value='<?=$companyID?>'>
            <input type='hidden' name='productID' value='<?=$product['id'] ?>'>
            <input type='hidden' name='token' value='<?=$token?>'>
            <input class="productSubmitButton" type="submit" value="Läs mer" />
        </form>

        <form method="POST" action="http://localhost/examensarbete/v1/checkouts/checkout.php">
            <input type='hidden' name='companyID' value='<?=$companyID?>'>
            <input type='hidden' name='productID' value='<?=$product['id']?>'>
            <input type='hidden' name='token' value='<?=$token?>'>
            <input class="productSubmitButton" type="submit" value="Köp" />
        </form>
        </br>
        
    </div>
    
  

<?php   }?>
</div>
</div>  
<?php include("../../footer.php");?>