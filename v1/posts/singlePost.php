<?php
// includes
include("../../objects/posts.php");

    $post_handler = new Post($databaseHandler);
    

    
  


  
    $postID =(isset($_POST['id']) ? $_POST['id'] : '');
    print_r($postID);
    echo "</center>";
    $post=$post_handler->fetchSinglePost($postID);
 







 

  
    
   
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
     
    

     
 
 //watching if user is admin
    
    // $isAdmin = $user_handler->isAdmin($token);
    
    // if($isAdmin === true) {
       
    //     echo "</br>";
    //     
        
    //     die;
    // }
 

    
?> 