
<?php
// includes
include("../../objects/posts.php");

$post_handler = new Post($databaseHandler);
$token =(isset($_POST['token']) ? $_POST['token'] : '');

$postID =(isset($_POST['id']) ? $_POST['id'] : '');


// callnig on deletePost if we have post id

 if(!empty($postID)) {
    
        $post_handler->deletePost($postID);

        echo"<center>";
        echo "<h1>Inlägget är nu borta!!</h1>";
 
        echo '<form method="POST" action="../users/userProfile.php">';
        echo "<input type='hidden'  name='token' value='{$token}'>";
        echo '<input  type="submit" value="Tillbaka till profilen" /></b>';
        echo '</form>';
        echo "</center>";

    } else {
        echo "Error with companyID";
    }

   
   

?>