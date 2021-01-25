<?php
// includes

    include("../../objects/posts.php");

    $post_handler = new Post($databaseHandler);
    $userID =(isset($_POST['id']) ? $_POST['id'] : '');
    $token =(isset($_POST['token']) ? $_POST['token'] : '');

// create post 
   if(!empty($userID)) {
   $post=  $post_handler->createPost($userID,$_POST['title'], $_POST['description'], $_POST['startDate'], $_POST['type'], $_POST['ort'], $_POST['email'],$_POST['telefonNummer']);

    echo"<center>";
    echo "<h1>Inlägget är nu publicerad!</h1>";
    
    echo '<form method="POST" action="../users/userProfile.php">';
    echo "<input type='hidden'  name='token' value='{$token}'>";
    echo '<input  type="submit" value="Tillbaka till profilen" /></b>';
    echo '</form>';
    echo "</center>";

} else {
    echo "Error with companyID";
}
     

?>