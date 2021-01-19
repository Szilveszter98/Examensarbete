<?php


// includes
include("../../objects/companies.php");

    $company_handler = new Company($databaseHandler);
    
 
    
$token = json_decode($company_handler->loginCompany($_POST['email'], $_POST['password']))->token;
$companyID=$company_handler->getCompanyId($token);
 $row = $company_handler->getCompanyData($companyID);
 $images=$company_handler->getCompanyImages($companyID);
    
  

// login
   echo "<center>";
   echo "<h1>" . $row['companyName'] . "</h1><br>";
   echo "</center>";
    
   
  foreach($images as $image){
    echo "<img src='../../uploads/" . $image['file_name'] . "'style='width: 500px; height: 300px;'><br />";
    echo '<form method="POST" action="deleteCompanyImg.php">';
     echo "<input type='hidden'  name='id' value='{$row['id']}'>";
     echo "<input type='hidden'  name='file_name' value='{$image['file_name']}'>";
     echo '<input  type="submit" value="Ta bort bilden" /></b>';
     echo '</form>';
  }

     echo"<center>";
     //echo "<span>" . "<h3>Företags Namn:</h3> </br>" . $row['companyName']. "</br></span><br/>";
     echo "<span>" . "<h3>Beskrivning: </h3></br>" . $row['description']. "</br></span><br/>";
     echo "<span>" . "<h3>Org.nr:</h3></br>" . $row['organisationsNummer']. "</br></span><br/>";
      echo "<span>" . "<h3>Adress:</h3></br>" . $row['address']. "</br></span><br/>";
     echo "<span>" . "<h3>Postnummer:</h3></br>" . $row['postnummer']. "</br></span><br/>";
     echo "<span>" . "<h3>Tel.nummer:</h3></br> " . $row['telefonNummer']. "</br></span><br/>";
     echo "<span>" . "<h3>Email: </h3></br> " . $row['email']. "</br></span><br/>";
     echo"</center>"; 

     echo"<center>";
     echo '<form method="POST" action="../posts/allPost.php">';
     echo "<input type='hidden'  name='id' value='{$row['id']}'>";
     echo '<input  type="submit" value="Alla arbete" /></b>';
     echo '</form>';
     echo '<form method="POST" action="../../editCompanyProfileForm.php">';
     echo "<input type='hidden'  name='id' value='{$row['id']}'>";
     echo '<input  type="submit" value="Ändra detaljer" /></b>';
     echo '</form>';
     echo '<form method="POST" action="../../editCompanyImgForm.php">';
     echo "<input type='hidden'  name='id' value='{$row['id']}'>";
     echo '<input  type="submit" value="Lägg till bilder" /></b>';
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