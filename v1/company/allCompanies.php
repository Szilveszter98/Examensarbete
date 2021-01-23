<?php


// includes
include("../../objects/companies.php");
include("../../indexHeader.php");

    $company_handler = new Company($databaseHandler);
    

    
  

// login
  
   
    echo "</center>";
    $row=$company_handler->fetchAllCompanies();
     $companiesID=$company_handler->fetchAllCompanyID();
     
    
   
  
    

     $token =(isset($_POST['token']) ? $_POST['token'] : '');


    	


    foreach($row as $company){

  
        
    echo"<div style='padding-top:200px;'>";
     echo"<center>";
     $logo=$company_handler->fetchAllCompaniesLogo($company['id']);
     if(!empty($logo['file_name'])){
        echo "<img src='../../uploads/" . $logo['file_name'] . "'style='width: 100px; height: 50 px;'>";
      }
     echo "<span>" . " " . $company['companyName']. "</br></span><br/>";
     echo "<span>" . " " . $company['description']. "</br></span><br/>";
    
     echo '<form method="POST" action="companySite.php">';
     echo "<input type='hidden'  name='id' value='{$company['id']}'>";
     
     echo "<input type='hidden'  name='token' value='{$token}'>";
     echo '<input  type="submit" value="till företagssida" /></b>';
     echo '</form>';
     echo"</br><hr>";
     echo"</div>";
     
    }

     

    include("../../footer.php");
?> 