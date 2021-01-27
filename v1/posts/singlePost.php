<?php
// includes
include("../../objects/posts.php");
include("../../objects/comments.php");
include("../../objects/companies.php");
include("../../objects/users.php");


    $post_handler = new Post($databaseHandler);
    $company_handler = new Company($databaseHandler);
    $user_handler = new User($databaseHandler);
    $comment_handler = new Comment($databaseHandler);


    $token =(isset($_POST['token']) ? $_POST['token'] : '');
    $companyID =(isset($_POST['companyID']) ? $_POST['companyID'] : '');
    $userID =(isset($_POST['userID']) ? $_POST['userID'] : '');
    $postID =(isset($_POST['postID']) ? $_POST['postID'] : '');
    
    echo "</center>";
    $post=$post_handler->fetchSinglePost($postID);
    $comments=$comment_handler->fetchAllComments($postID);

    








 

  
    
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
     echo '</form>';
     echo"</br><hr>";
    // echo "<a href='allPost.php'>Tillbaka till alla inlägg</a>";
  
     echo '<center>';
     echo '<form method="POST" action="../comments/createPostComment.php">';
     echo '<label for="fname">Kommentar fält:</label>';
     echo '<input type="text" id="comment" name="comment"><br><br>';
     echo "<input type='hidden'  name='token' value='$token'>";
     echo "<input type='hidden'  name='companyID' value='$companyID'>";
     echo "<input type='hidden'  name='userID' value='$userID'>";
     echo "<input type='hidden'  name='postID' value='$postID'>";
     echo '<input  type="submit" value="Skapa inlägg" /></b>';  
     echo '</form>';
     echo '<h1> Kommentarer:</h1><br><br>';
     if(!empty($comments)){
    foreach($comments as $comment){

        echo"<center>";

        if(!empty($comment['companyID'])){

            $companyID=$comment['companyID'];
            $companies = $company_handler->getCompanyData($companyID);
            echo "<span>" . " " . $companies['companyName']. "</br></span><br/>";
            
        }elseif(!empty($comment['userID'])){

            $userID=$comment['userID'];
            $users = $user_handler->fetchUserData($userID);
            echo "<span>" . " " . $users['firstname']. "</span>";
            echo "<span>" . " " . $users['lastname']. "</br></span><br/>";
            
        }
        echo "<span>" . " " . $comment['comment']. "</br></span><br/>";
        echo "<span>" . " " . $comment['date']. "</br></span><br/>";
        echo "<hr>";
    }

}     
 
 //watching if user is admin
    
    // $isAdmin = $user_handler->isAdmin($token);
    
    // if($isAdmin === true) {
       
    //     echo "</br>";
    //     
        
    //     die;
    // }
 

    
?> 