<?php


// includes
include("../../objects/products.php");

    $product_handler = new Product($databaseHandler);
    

    $token =(isset($_POST['token']) ? $_POST['token'] : '');
  

    $productID =(isset($_POST['productid']) ? $_POST['productid'] : '');
    $product=$product_handler->fetchSingleProduct($productID);
    echo '<form method="POST" action="allProducts.php">';
    echo "<input type='hidden'  name='token' value='{$token}'>";
    echo '<input  type="submit" value="Tillbaka till produkter" /></b>';
    echo '</form>';
    echo"<center>";
     echo "<img src='../../uploads/" . $product['file_name'] . "'style='width: 500px; height: 300px;'>";
     echo "<span><h1>" . " " . $product['name']. "</h1></br></span><br/>";
     echo "<span>" . " " . $product['description']. "</br></span><br/>";
     echo "<span>" . " " . $product['price']. "kr</br></span><br/>";

     echo '<form method="POST" action="http://localhost/examensarbete/v1/checkouts/checkout.php">';
        echo "<input type='hidden'  name='id' value='{$productID}'>";
        echo "<input type='hidden'  name='token' value='{$token}'>";
        echo '<input  type="submit" value="Köp" /></b>';
        echo '</form>';
     
     ?>