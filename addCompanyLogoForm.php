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
$companyID =(isset($_POST['id']) ? $_POST['id'] : '');
    
print_r($companyID);
?>
<center>
<h1> Ladda upp Logo </h1>    
<form method="POST" action="v1/company/addCompanyLogo.php" enctype='multipart/form-data'>

<input type='hidden'  name='id' value='<?php echo $companyID?>'>
             <b>Bifoga bild:</b><br />
            <input type='file' name='file[]' id='fileToUpload' multiple required><br />
            <br />
            <hr>
            <input type="submit" name="Add" value="Ladda upp"/> 


</form>
</center>
</body>
</html>