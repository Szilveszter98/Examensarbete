<?php

include("../../objects/premiumCompanies.php");
//include("../../userHeader.php");
    $premium_handler = new OneMonth($databaseHandler);

$companyID =(isset($_POST['companyID']) ? $_POST['companyID'] : '');
$companyID=13;
$valid=$premium_handler->validatePremiumToken($companyID);
print_r("hello");
if(!empty($valid)){
    echo "Welcome you have access";
}else{
    echo "köp tjänst för att se alla arbete";
}
// includes
include("../../objects/posts.php");
//include("../../header.php");
    $post_handler = new Post($databaseHandler);
    

    $companyID =(isset($_POST['companyID']) ? $_POST['companyID'] : '');
  
    

  
   
    echo "</center>";
    $row=$post_handler->fetchAllPosts();
 







    foreach($row as $post){

  
    
  
     echo"<center>";
     echo "<span>" . " <h2>" . $post['title']. "</h2></br></span><br/>";
     echo "<span>" . "<h3>Beskrivning:</h3>" . $post['description']. "</br></span><br/>";
     echo "<span>" . "<h3>Typ av arbete:</h3> " . $post['type']. "</br></span><br/>";
     echo "<span>" . "<h3>Ort:</h3> " . $post['ort']. "</br></span><br/>";
     echo "<span>" . " Inlägget skapades:" . $post['date']. "</span><br/>";
     echo '<form method="POST" action="singlePost.php">';
     echo "<input type='hidden'  name='postID' value='{$post['id']}'>";
     echo "<input type='hidden'  name='companyID' value='{$companyID}'>";
     $postID=$post['id'];
     $images=$post_handler->fetchPostImages($postID);

foreach( $images as $image){




   echo "<img src='../../uploads/" . $image['file_name'] . "'style='width: 100px; height: 50 px;'>";
 
}   
     echo "</br>";
     echo '<input  type="submit" value="Läs mer" /></b>';
     echo '</form>';
     echo"</br><hr>";
     
    }

     
include("../../footer.php");
    
?> 