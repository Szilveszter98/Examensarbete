<?php


// includes
include("../../objects/posts.php");
//include("../../header.php");
    $post_handler = new Post($databaseHandler);
    

    $companyID =(isset($_POST['companyID']) ? $_POST['companyID'] : '');
  
    

  
   
    echo "</center>";
    $row=$post_handler->fetchAllPosts();
 







    foreach($row as $post){

  
    
  
     echo"<center>";
     echo "<span>" . " " . $post['title']. "</br></span><br/>";
     echo "<span>" . " " . $post['description']. "</br></span><br/>";
     echo "<span>" . " " . $post['type']. "</br></span><br/>";
     echo "<span>" . " " . $post['ort']. "</br></span><br/>";
     echo "<span>" . " " . $post['date']. "</br></span><br/>";
     echo '<form method="POST" action="singlePost.php">';
     echo "<input type='hidden'  name='postID' value='{$post['id']}'>";
     echo "<input type='hidden'  name='companyID' value='{$companyID}'>";

     echo '<input  type="submit" value="Läs mer" /></b>';
     echo '</form>';
     echo"</br><hr>";
     
    }

     
include("../../footer.php");
    
?> 