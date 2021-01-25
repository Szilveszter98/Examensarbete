<?php


// includes
include("../../objects/products.php");
//include("../../companyHeader.php");

    $product_handler = new Product($databaseHandler);
    

    $token =(isset($_POST['token']) ? $_POST['token'] : '');
  

print_r($token);
   
  
    $row=$product_handler->fetchAllProducts();
 







    foreach($row as $product){

  
  
  
     echo"<center>";
     echo "<img src='../../uploads/" . $product['file_name'] . "'style='width: 500px; height: 300px;'>";
     echo "<span><h1>" . " " . $product['name']. "</h1></br></span><br/>";
     echo "<span>" . " " . $product['description']. "</br></span><br/>";
     echo "<span>" . " " . $product['price']. "kr</br></span><br/>";
     

     echo '<form method="POST" action="singleProduct.php">';
     echo "<input type='hidden'  name='productid' value='{$product['id']}'>";
     echo "<input type='hidden'  name='token' value='{$token}'>";
     echo '<input  type="submit" value="Läs mer" /></b>';
     echo '</form>';
     
     echo '<form method="POST" action="http://localhost/examensarbete/v1/checkouts/checkout.php">';
     echo "<input type='hidden'  name='id' value='{$product['id']}'>";
     echo "<input type='hidden'  name='token' value='{$token}'>";
     echo '<input  type="submit" value="Köp" /></b>';
     echo '</form>';

     echo"</br><hr>";
     
    }

     

    
