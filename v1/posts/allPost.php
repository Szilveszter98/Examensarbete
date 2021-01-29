<?php

include("../../objects/premiumCompanies.php");
//include("../../userHeader.php");
$premiumOneMonth_handler = new OneMonth($databaseHandler);
$premiumThreeMonth_handler = new ThreeMonth($databaseHandler);
$premiumSixMonth_handler = new SixMonth($databaseHandler);

$companyID =(isset($_POST['companyID']) ? $_POST['companyID'] : '');
print_r($companyID);
$row= $premiumOneMonth_handler->fetchSingleCompany($companyID);


if(!empty($row)){
if($row['productID']== 1){
$valid=$premiumOneMonth_handler->validatePremiumToken($companyID);
echo "hello1";

}elseif($row['productID']== 2){

    $valid=$premiumThreeMonth_handler->validatePremiumToken($companyID);
    echo "hello2";

}elseif($row['productID']== 3){
    $valid=$premiumSixMonth_handler->validatePremiumToken($companyID);
    echo "hello3";

}
}else{
   echo "Du behöver köpa tjänst för att se alla jobb som vi har";
   die;
}
if(empty($valid)){
   echo "köp tjänst för att se alla arbete";
   die;
}
     echo "Welcome you have access";
// includes
include("../../objects/posts.php");
//include("../../header.php");
    $post_handler = new Post($databaseHandler);
    

    $companyID =(isset($_POST['companyID']) ? $_POST['companyID'] : '');
  
    

  
   
    echo "</center>";
    $row=$post_handler->fetchAllPosts();
 







    foreach($row as $post){

  
    
  
     echo"<center>";
     echo "<span>" . " <h2>" . $post['title']. "</h2></br></span><br/>";
     echo "<span>" . "<h3>Beskrivning:</h3>" . $post['description']. "</br></span><br/>";
     echo "<span>" . "<h3>Typ av arbete:</h3> " . $post['type']. "</br></span><br/>";
     echo "<span>" . "<h3>Ort:</h3> " . $post['ort']. "</br></span><br/>";
     echo "<span>" . " Inlägget skapades:" . $post['date']. "</span><br/>";
     echo '<form method="POST" action="singlePost.php">';
     echo "<input type='hidden'  name='postID' value='{$post['id']}'>";
     echo "<input type='hidden'  name='companyID' value='{$companyID}'>";
     $postID=$post['id'];
     $images=$post_handler->fetchPostImages($postID);

foreach( $images as $image){




   echo "<img src='../../uploads/" . $image['file_name'] . "'style='width: 100px; height: 50 px;'>";
 
}   
     echo "</br>";
     echo '<input  type="submit" value="Läs mer" /></b>';
     echo '</form>';
     echo"</br><hr>";
     
    }

     
include("../../footer.php");
    
?> 