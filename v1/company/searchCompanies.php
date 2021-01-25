<?php
// includes

include("../../objects/companies.php");

    $company_handler = new Company($databaseHandler);


    $searchWord =(isset($_POST['searchWord']) ? $_POST['searchWord'] : '');



    if(!empty($searchWord)){
        $result=$company_handler->searchCompanies($searchWord);
        
    }
    
  echo '  <form method="POST" action="searchCompanies.php">';
    echo '  <label for="gsearch">Sök bland registrerade företag:</label>';
    echo ' <input type="search"  name="searchWord">';
    echo ' <input type="submit">';
    echo '  </form>';
    echo ' <a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a>';
         echo "<h2>Sökresultat!</h2>";
    foreach($result as $row){
           echo '<center>';
          
      
 
          //  echo '<img src="img/'.$row['Img'].'" alt="product image"/><br />';
          echo "<span>" . " " . $row['companyName']. "</br></span><br/>";
          echo "<span>" . " " . $row['description']. "</br></span><br/>";
          echo '<form method="POST" action="http://localhost/examensarbete/v1/company/companySite.php">';
            echo "<input type='hidden'  name='id' value='{$row['id']}'>";
            echo '<input  type="submit" value="Läs mer" /></b>';
            echo '</form>';
         
         echo '</center>';
         echo "<hr>";
    } 
    



?>