<?php


// includes
include("../../objects/companies.php");

    $company_handler = new Company($databaseHandler);
    
 
    
$token = json_decode($company_handler->loginCompany($_POST['email'], $_POST['password']))->token;
$companyID=$company_handler->getCompanyId($token);
 $row = $company_handler->getCompanyData($companyID);
    
  

// login
   echo "<center>";
   echo "<h1> Welcome " . $row['companyName'] . "!</h1><br>";
   echo "</center>";
    
   
  

     echo"<center>";
     echo "<span>" . " " . $row['companyName']. "</br></span><br/>";
     echo "<span>" . " " . $row['telefonNummer']. "</br></span><br/>";
     echo "<span>" . " " . $row['email']. "</br></span><br/>";
     echo"</center>"; 

     echo"<center>";
     echo "<a href='../../editCompanyProfileForm.php?id={$row['id']}'> radigera profilen </a></br>"; 
     echo "<a id='' href='logoutCompany.php?id={$row['id']}'>Sign out</center></h1></a>";
  
    echo"</center>"; 

    
?> 