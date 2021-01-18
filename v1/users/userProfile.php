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
    //echo "<span>" . " " . $row['id']. "</br></span><br/>";


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
 
     echo "</center>";

     include("../../objects/posts.php");

    $post_handler = new Post($databaseHandler);
    
    $userID= $row['id'];
    $posts= $post_handler->getPostWithUserID($userID);
   
   foreach($posts as $post){
     echo"<center>";
     echo"<hr>";
     echo "<span>" . " " . $post['title']. "</br></span><br/>";
     echo "<span>" . " " . $post['description']. "</br></span><br/>";
     echo "<span>" . " " . $post['type']. "</br></span><br/>";
     echo "<span>" . " " . $post['ort']. "</br></span><br/>";
     echo "<span>" . " " . $post['date']. "</br></span><br/>";
     echo "<span>" . " " . $post['email']. "</br></span><br/>";
     echo "<span>" . " " . $post['telefonNummer']. "</br></span><br/>";
     echo "<span>" . " " . $post['startDate']. "</br></span><br/>";
     echo '</form>';
     echo '<form method="POST" action="../../editPostForm.php">';
     echo "<input type='hidden'  name='id' value='{$post['ID']}'>";
     echo '<input  type="submit" value="Radigera inlägg" /></b>';
     echo '</form>';
     echo '<form method="POST" action="../posts/deletePost.php">';
     echo "<input type='hidden'  name='id' value='{$post['ID']}'>";
     echo '<input  type="submit" value="Ta bort inlägg" /></b>';
     echo '</form>';
     echo"</br><hr>";
    
 }
    
 

    
?> 