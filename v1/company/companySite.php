<?php


// includes
include("../../objects/companies.php");

    $company_handler = new Company($databaseHandler);
    
 
    
    $companyID =(isset($_POST['id']) ? $_POST['id'] : '');
  
    echo "</center>";
    $row=$company_handler->fetchSingleCompany($companyID);
    
    $images=$company_handler->fetchCompanyImages($companyID);
    $logo=$company_handler->fetchCompanyLogo($companyID);



    echo "<a href='allCompanies.php'>Tillbaka till alla företag</a>";
  
    echo"<center>";
    if(!empty($logo)){
      echo "<img src='../../uploads/" . $logo['file_name'] . "'style='width: 500px; height: 300px;'>";
    }

     
     echo "<span><h1>" . " " . $row['companyName']. "</h1></br></span><br/>";
     echo "<span>" . " " . $row['description']. "</br></span><br/>";
     echo "<span>" . " " . $row['organisationsNummer']. "</br></span><br/>";
     echo "<span>" . " " . $row['address']. "</br></span><br/>";
     echo "<span>" . " " . $row['postnummer']. "</br></span><br/>";
     echo "<span>" . " " . $row['telefonNummer']. "</br></span><br/>";
     echo "<span>" . " " . $row['email']. "</br></span><br/>";
     foreach($images as $image){
        echo "<img src='../../uploads/" . $image['file_name'] . "'style='width: 500px; height: 300px;'><br />";
        
      }
     echo"</center>"; 

     

  

 
    echo"</center>"; 

    
?> 