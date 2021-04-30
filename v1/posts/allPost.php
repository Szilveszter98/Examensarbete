<?php
//includes
include("../../objects/premiumCompanies.php");
//premium handlers
$premiumOneMonth_handler = new OneMonth($databaseHandler);
$premiumThreeMonth_handler = new ThreeMonth($databaseHandler);
$premiumSixMonth_handler = new SixMonth($databaseHandler);
//getting data with POST
$companyID = (isset($_POST['companyID']) ? $_POST['companyID'] : '');
$token = (isset($_POST['token']) ? $_POST['token'] : '');
//fetching single company
$row = $premiumOneMonth_handler->fetchSingleCompany($companyID);

?>
<link rel="stylesheet" href="../../css/styles.css">
<?php
//watching if company have premium and what kind of premium
if (!empty($row)) {
    if ($row['productID'] == 1) {

        $valid = $premiumOneMonth_handler->validatePremiumToken($companyID);
    } elseif ($row['productID'] == 2) {

        $valid = $premiumThreeMonth_handler->validatePremiumToken($companyID);
    } elseif ($row['productID'] == 3) {
        $valid = $premiumSixMonth_handler->validatePremiumToken($companyID);
    }
} else {
    //if company dont have premium
    echo "<div class='needToBuy'><h1>Du behöver köpa en av våra tjänster <br>för att kunna se alla arbete som är tillgängliga</h1>";
    echo '<form method="POST" action="../products/allProducts.php">';
    echo "<input type='hidden'  name='companyID' value='{$companyID}'>";
    echo "<input type='hidden'  name='token' value='{$token}'>";
    echo '<input class="submitButton" type="submit" value="Till Tjänster" /></b>';
    echo '</form>';

    echo '<form method="POST" action="../company/companyProfile.php">';
    echo "<input type='hidden'  name='companyID' value='{$companyID}'>";
    echo "<input type='hidden'  name='token' value='{$token}'>";
    echo '<input class="submitButton" type="submit" value="Tillbaka till Portfolion" /></b>';
    echo '</form>';
    echo '</div>';
    include('../../footer.php');
    die;
    die;
}


// includes
include("../../objects/posts.php");
//posthandler 
$post_handler = new Post($databaseHandler);
//getting info with POST
$companyID = (isset($_POST['companyID']) ? $_POST['companyID'] : '');

$row = $post_handler->fetchAllPosts();
//showing all the registerd post 
foreach ($row as $post) { ?>

    <link rel="stylesheet" href="../../css/styles.css">
<?php
    echo '<form method="POST" action="../company/companyProfile.php">';
    echo "<input type='hidden'  name='companyID' value='{$companyID}'>";
    echo "<input type='hidden'  name='token' value='{$token}'>";
    echo '<input class="submitButton" type="submit" value="Tillbaka till Portfolion" /></b>';
    echo '</form>';
    echo '<div class="allpost">';
    echo "<span>" . " <h2>" . $post['title'] . "</h2></br></span>";
    echo "<span>" . "<h3>Beskrivning:</h3>" . $post['description'] . "</br></span><br/>";
    echo "<span>" . "<h3>Typ av arbete:</h3> " . $post['type'] . "</br></span><br/>";
    echo "<span>" . "<h3>Ort:</h3> " . $post['ort'] . "</br></span><br/>";

    echo '<form method="POST" action="singlePost.php">';
    echo "<input type='hidden'  name='postID' value='{$post['id']}'>";
    echo "<input type='hidden'  name='companyID' value='{$companyID}'>";

    $postID = $post['id'];
    $images = $post_handler->fetchPostImages($postID);

    foreach ($images as $image) {
        echo "<img src='../../uploads/" . $image['file_name'] . "'>";
    }
    echo '<br>';
    echo "<span>" . " Inlägget skapades:" . $post['date'] . "</span><br/>";
    echo "</br>";
    echo '<input class="submitButton"  type="submit" value="Läs mer" /></b>';
    echo '</form>';
    echo "</div>";
    echo "</br><hr>";
}


include("../../footer.php");

?>