<?php


// includes
include("../../objects/companies.php");

    $company_handler = new Company($databaseHandler);
    

    
  

// login
  
   
    echo "</center>";
    $row=$company_handler->fetchAllCompanies();
     $companiesID=$company_handler->fetchAllCompanyID();
     
    
   
  
    







    foreach($row as $company){

  
        
  
     echo"<center>";
     $logo=$company_handler->fetchAllCompaniesLogo($company['id']);
     if(!empty($logo['file_name'])){
        echo "<img src='../../uploads/" . $logo['file_name'] . "'style='width: 500px; height: 300px;'>";
      }
     echo "<span>" . " " . $company['companyName']. "</br></span><br/>";
     echo "<span>" . " " . $company['description']. "</br></span><br/>";
    
     echo '<form method="POST" action="companySite.php">';
     echo "<input type='hidden'  name='id' value='{$company['id']}'>";
     echo '<input  type="submit" value="till företagssida" /></b>';
     echo '</form>';
     echo"</br><hr>";
     
    }

     

    
?> 