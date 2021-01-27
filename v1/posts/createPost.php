<?php
// includes

    include("../../objects/posts.php");

    $post_handler = new Post($databaseHandler);
    $userID =(isset($_POST['id']) ? $_POST['id'] : '');
    $token =(isset($_POST['token']) ? $_POST['token'] : '');

// create post 
   if(!empty($userID)) {
  $post_handler->createPost($userID,$_POST['title'], $_POST['description'], $_POST['startDate'], $_POST['type'], $_POST['ort'], $_POST['email'],$_POST['telefonNummer']);

  $row=$post_handler->fetchLastPost();
  
    echo"<center>";
    echo "<h1>Inlägget är nu publicerad!</h1>";
  
   
   
     echo "<span>" . " " . $row['title']. "</br></span><br/>";
     echo "<span>" . " " . $row['description']. "</br></span><br/>";
     echo "<span>" . " " . $row['type']. "</br></span><br/>";
     echo "<span>" . " " . $row['ort']. "</br></span><br/>";
     echo "<span>" . " " . $row['email']. "</br></span><br/>";
     echo "<span>" . " " . $row['telefonNummer']. "</br></span><br/>";
     echo "<span>" . " " . $row['startDate']. "</br></span><br/>";
     echo "<span>" . " " . $row['date']. "</br></span><br/>";


     echo '<form method="POST" action="../../addImagesToPost.php">';
     echo "<input type='hidden'  name='token' value='{$token}'>";
     echo "<input type='hidden'  name='postID' value='{$row['ID']}'>";
     echo '<input  type="submit" value="Lägg till bild" /></b>';
     echo '</form>';

    echo '<form method="POST" action="../users/userProfile.php">';
    echo "<input type='hidden'  name='token' value='{$token}'>";
    echo '<input  type="submit" value="Tillbaka till profilen" /></b>';
    echo '</form>';
    
    echo "</center>";

} else {
    echo "Error with companyID";
}
     

?>