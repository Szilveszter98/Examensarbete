
<?php
// includes
include("../../objects/comments.php");

$comment_handler = new Comment($databaseHandler);

$companyID =(isset($_POST['companyID']) ? $_POST['companyID'] : '');
$token =(isset($_POST['token']) ? $_POST['token'] : '');

$commentID =(isset($_POST['commentID']) ? $_POST['commentID'] : '');


// callnig on deletePost if we have post id

 if(!empty($commentID)) {
    

        $comment_handler->deleteCompanyComment($companyID, $commentID);
        echo"<center>";
        echo "<h1>Omdömen är bortagen nu!</h1>";
    
        
             echo '<form method="POST" action="companyProfile.php">';
             echo "<input type='hidden'  name='token' value='{$token}'>";
             echo '<input  type="submit" value="Tillbaka till Portfolion" /></b>';
             echo '</form>';
    

    } else {
        echo "Error with companyID";
    }

   
   
    

?>