<?php


// includes
include("../../objects/companies.php");
include("../../objects/comments.php");
    $company_handler = new Company($databaseHandler);
    $comment_handler = new Comment($databaseHandler);

    $token=(isset($_POST['token']) ? $_POST['token'] : '');
    
    $companyID =(isset($_POST['id']) ? $_POST['id'] : '');
  
    echo "</center>";
    $row=$company_handler->fetchSingleCompany($companyID);
    
    $images=$company_handler->fetchCompanyImages($companyID);
    $logo=$company_handler->fetchCompanyLogo($companyID);

    echo '<form method="POST" action="allcompanies.php">';
    echo "<input type='hidden'  name='token' value='{$token}'>";
    echo '<input  type="submit" value="Tillbaka alla företag" /></b>';
    echo '</form>';
    echo ' <a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a>';
    echo"<center>";
    if(!empty($logo)){
      echo "<img src='../../uploads/" . $logo['file_name'] . "'style='width: 500px; height: 300px;'>";
    }

     
     echo "<span><h1>" . " " . $row['companyName']. "</h1></br></span><br/>";
     echo "<span>" . " " . $row['description']. "</br></span><br/>";
     echo "<span><h1>" . " " . $row['type']. "</h1></br></span><br/>";
     echo "<span>" . " " . $row['organisationsNummer']. "</br></span><br/>";
     echo "<span>" . " " . $row['address']. "</br></span><br/>";
     echo "<span>" . " " . $row['postnummer']. "</br></span><br/>";
     echo "<span>" . " " . $row['telefonNummer']. "</br></span><br/>";
     echo "<span>" . " " . $row['email']. "</br></span><br/>";
     foreach($images as $image){
        echo "<img src='../../uploads/" . $image['file_name'] . "'style='width: 500px; height: 300px;'><br />";
        
      }
      //OMDÖME
      echo "<h3>Lägg till omdöme</h3>";
     echo '<form method="POST" action="createCompanyComment.php">';
     echo '<label for="comment">Namn:</label>';
     echo '<input type="text" id="name" name="name"><br><br>';
     echo '<label for="comment">Kommentar fält:</label>';
     echo '<input type="text" id="comment" name="comment"><br><br>';
     echo "<input type='hidden'  name='token' value='$token'>";
     echo "<input type='hidden'  name='companyID' value='$companyID'>";
     echo '<input  type="submit" value="Publicera" /></b>';  
     echo '</form>';
     echo '<h1> Omdöme:</h1><br><br>';
     $comments=$comment_handler->fetchAllComments($companyID);
      if(!empty($comments)){
        foreach($comments as $comment){
    
            echo"<center>";
            echo "<span>" . "" . $comment['name']. "</span><br/>";
            echo "<span>" . "" . $comment['comment']. "</span><br/>";
            echo "<span>" . " Posted:" . $comment['date_posted']. "</span><br/>";
            echo "<hr>";
             echo"</center>"; 
    
    }     
    
  }
     

    
?> 