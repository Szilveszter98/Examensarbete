<?php


// includes
include("../../objects/users.php");

    $user_handler = new User($databaseHandler);
    

    
  

// login
  
   
    echo "</center>";
    $token = json_decode($user_handler->loginUser($_POST['username'], $_POST['password']))->token;
 





$userID=$user_handler->getUserId($token);
 $row = $user_handler->getUserData($userID);



    echo "<center>";
    echo "<h1> Welcome " . $_POST['username'] . "!</h1><br>";
    echo "<center>";
    
   
     echo"<center>";
     echo "<span>" . " " . $row['firstname']. "</br></span><br/>";
     echo "<span>" . " " . $row['lastname']. "</br></span><br/>";
     echo "<span>" . " " . $row['email']. "</br></span><br/>";
    
     


     echo '<form method="POST" action="../../editUserProfileForm.php">';
     echo "<input type='hidden'  name='id' value='{$row['id']}'>";
     echo '<input  type="submit" value="Ändra detaljer" /></b>';
     echo '</form>';

     echo '<form method="POST" action="logoutUser.php">';
     echo "<input type='hidden'  name='id' value='{$row['id']}'>";
     echo '<input  type="submit" value="Logga ut" /></b>';
     echo '</form>';

     echo '<form method="POST" action="deleteUser.php">';
     echo "<input type='hidden'  name='id' value='{$row['id']}'>";
     echo '<input  type="submit" value="Delete Profile" /></b>';
     echo '</form>';


     echo '<form method="POST" action="../../createPostForm.php">';
     echo "<input type='hidden'  name='id' value='{$row['id']}'>";
     echo '<input  type="submit" value="Skapa inlägg" /></b>';
     echo '</form>';
 


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
 
    // fetch own post and add edit button
 

    
?> 