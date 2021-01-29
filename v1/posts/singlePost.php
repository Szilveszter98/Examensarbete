<?php
// includes
include("../../objects/posts.php");

include("../../objects/companies.php");
include("../../objects/users.php");


    $post_handler = new Post($databaseHandler);
    $company_handler = new Company($databaseHandler);
    $user_handler = new User($databaseHandler);
   


    $token =(isset($_POST['token']) ? $_POST['token'] : '');
    $companyID =(isset($_POST['companyID']) ? $_POST['companyID'] : '');
    $userID =(isset($_POST['userID']) ? $_POST['userID'] : '');
    $postID =(isset($_POST['postID']) ? $_POST['postID'] : '');
    
    echo "</center>";
    $post=$post_handler->fetchSinglePost($postID);
   
    








 

  
    
      echo ' <a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a>';
     echo"<center>";
     echo "<span>" . " <h1>" . $post['title']. "</h1></span><br/>";
     echo "<span>" . "<h3>Beskrivning:</h3>" . $post['description']. "</span><br/>";
     echo "<span>" . " <h3>Typ av arbete:</h3>" . $post['type']. "</span><br/>";
     echo "<span>" . " <h3>Ort:</h3>" . $post['ort']. "</span><br/>";
     echo "<span>" . "<h3>Önskad tid:</h3> " . $post['startDate']. "</span><br/>";
     echo "<span>" . " <h3>Email:</h3>" . $post['email']. "</span><br/>";
     echo "<span>" . " <h3>Tel.nummer</h3>" . $post['telefonNummer']. "</span><br/>";
     echo '</center>';
      echo "<span>" . " Inlägget skapades:" . $post['date']. "</span><br/>";
      $images=$post_handler->fetchPostImages($postID);

foreach( $images as $image){



   echo "<img src='../../uploads/" . $image['file_name'] . "'style='width: 200px; height: 100 px;'>";
 
}
     
     echo"</br><hr>";
  
  

    
?> 