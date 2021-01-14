
<?php
// includes
include("../../objects/posts.php");

$post_handler = new Post($databaseHandler);


$postID =(isset($_POST['id']) ? $_POST['id'] : '');

// callnig on deletePost if we have post id

 if(!empty($postID)) {
    

        $post_handler->deleteCompany($postID);

    } else {
        echo "Error with companyID";
    }

   
   

?>