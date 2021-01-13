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
     echo '<form method="POST" action="../../editCompanyProfileForm.php">';
     echo "<input type='hidden'  name='id' value='{$row['id']}'>";
     echo '<input  type="submit" value="Ändra detaljer" /></b>';
     echo '</form>';

     echo '<form method="POST" action="logoutCompany.php">';
     echo "<input type='hidden'  name='id' value='{$row['id']}'>";
     echo '<input  type="submit" value="Logga ut" /></b>';
     echo '</form>';

     echo '<form method="POST" action="deleteCompany.php">';
     echo "<input type='hidden'  name='id' value='{$row['id']}'>";
     echo '<input  type="submit" value="Delete Profile" /></b>';
     echo '</form>';
    echo"</center>"; 

    
?> 