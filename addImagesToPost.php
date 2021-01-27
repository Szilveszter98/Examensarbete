<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobbnärverk</title>
</head>
<body>
   <!-- Inputs to registeration -->
   <?php
$postID =(isset($_POST['postID']) ? $_POST['postID'] : '');
$token=(isset($_POST['token']) ? $_POST['token'] : '');

?>
<center>
<h1> Ladda upp  bilder</h1>    
<form method="POST" action="v1/posts/addPostImages.php" enctype='multipart/form-data'>
<input type='hidden'  name='token' value='<?php echo $token?>'>
<input type='hidden'  name='postID' value='<?php echo $postID?>'>
             <b>Bifoga bild:</b><br />
            <input type='file' name='file[]' id='fileToUpload' multiple required><br />
            <br />
            <hr>
            <input type="submit" name="Add" value="Ladda upp"/> 


</form>
</center>
</body>
</html>