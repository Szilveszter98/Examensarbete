<?php


// includes
include("../../objects/users.php");

    $user_handler = new User($databaseHandler);
    

    
  

// login
   echo "<center>";
   echo "<h1> Welcome " . $_POST['username'] . "!</h1><br>";
   echo "<center>";
    
   
   
    echo "</center>";
    $token = json_decode($user_handler->loginUser($_POST['username'], $_POST['password']))->token;
 





$userID=$user_handler->getUserId($token);
 $row = $user_handler->getUserData($userID);

     echo"<center>";
     echo "<span>" . " " . $row['firstname']. "</br></span><br/>";
     echo "<span>" . " " . $row['lastname']. "</br></span><br/>";
     echo "<span>" . " " . $row['email']. "</br></span><br/>";
     
    echo "<a id='' href='logoutUser.php?id={$row['id']}'>Sign out</center></h1></a>";
    echo "<a href='../../createPost.php'> Add new product </a>";
    echo "<a href='../../editUserProfileForm.php'> radigera profilen </a>"
    echo"</center>";
 //watching if user is admin
    
    // $isAdmin = $user_handler->isAdmin($token);
    
    // if($isAdmin === true) {
       
    //     echo "</br>";
    //     
        
    //     die;
    // }
 

    
?> 