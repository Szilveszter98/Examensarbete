<?php


// includes
include("../../objects/products.php");

    $product_handler = new Product($databaseHandler);
    

    
  


   
  
    $row=$product_handler->fetchAllProducts();
 







    foreach($row as $product){

  
    
  
     echo"<center>";
     echo "<span><h1>" . " " . $product['name']. "</h1></br></span><br/>";
     echo "<span>" . " " . $product['description']. "</br></span><br/>";
     echo "<span>" . " " . $product['price']. "kr</br></span><br/>";
     echo"</br><hr>";
     
    }

     

    
?> 