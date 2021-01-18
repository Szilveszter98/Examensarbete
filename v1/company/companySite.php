<?php


// includes
include("../../objects/companies.php");

    $company_handler = new Company($databaseHandler);
    
 
    
    $companyID =(isset($_POST['id']) ? $_POST['id'] : '');
  
    echo "</center>";
    $row=$company_handler->fetchSingleCompany($companyID);
 



    
  


   

     echo"<center>";
     echo "<span><h1>" . " " . $row['companyName']. "</h1></br></span><br/>";
     echo "<span>" . " " . $row['description']. "</br></span><br/>";
     echo "<span>" . " " . $row['organisationsNummer']. "</br></span><br/>";
     echo "<span>" . " " . $row['address']. "</br></span><br/>";
     echo "<span>" . " " . $row['postnummer']. "</br></span><br/>";
     echo "<span>" . " " . $row['telefonNummer']. "</br></span><br/>";
     echo "<span>" . " " . $row['email']. "</br></span><br/>";

     echo"</center>"; 

     

  

 
    echo"</center>"; 

    
?> 