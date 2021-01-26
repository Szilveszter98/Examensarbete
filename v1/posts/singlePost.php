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
    print_r($userID);
  


  
    $postID =(isset($_POST['postID']) ? $_POST['postID'] : '');
    
    echo "</center>";
    $post=$post_handler->fetchSinglePost($postID);
    $comments=$comment_handler->fetchAllComments($postID);

    








 

  
    
   
     echo"<center>";
     echo "<span>" . " " . $post['title']. "</br></span><br/>";
     echo "<span>" . " " . $post['description']. "</br></span><br/>";
     echo "<span>" . " " . $post['type']. "</br></span><br/>";
     echo "<span>" . " " . $post['ort']. "</br></span><br/>";
     echo "<span>" . " " . $post['date']. "</br></span><br/>";
     echo "<span>" . " " . $post['email']. "</br></span><br/>";
     echo "<span>" . " " . $post['telefonNummer']. "</br></span><br/>";
     echo "<span>" . " " . $post['startDate']. "</br></span><br/>";
     echo '</form>';
     echo"</br><hr>";
     echo "<a href='allPost.php'>Tillbaka till alla inlägg</a>";
     echo ' <a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a>';

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