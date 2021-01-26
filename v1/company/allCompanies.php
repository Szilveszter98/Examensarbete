<?php


// includes
include("../../objects/companies.php");
//include("../../indexHeader.php");

    $company_handler = new Company($databaseHandler);
    

    
  

// login
  
   
    echo "</center>";
    $row=$company_handler->fetchAllCompanies();
     $companiesID=$company_handler->fetchAllCompanyID();
     
    
   
  
    

     $token =(isset($_POST['token']) ? $_POST['token'] : '');


    	
     echo '  <form method="POST" action="searchCompanies.php">';
     echo '  <label for="gsearch">Sök bland registrerade företag:</label>';
     echo ' <input type="search"  name="searchWord">';
     echo ' <input type="submit">';
     echo '  </form>';
     echo ' <a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a>';

    foreach($row as $company){

  
        
    echo"<div style='padding-top:200px;'>";
     echo"<center>";
     
     $logo=$company_handler->fetchAllCompaniesLogo($company['id']);
     if(!empty($logo['file_name'])){
        echo "<img src='../../uploads/" . $logo['file_name'] . "'style='width: 100px; height: 50 px;'>";
      }
     echo "<span>" . " " . $company['companyName']. "</br></span><br/>";
     echo "<span>" . " " . $company['description']. "</br></span><br/>";
     echo "<span>" . " " . $company['type']. "</br></span><br/>";
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