<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobbnärverk</title>
    <link rel="stylesheet" href="../../css/styles.css">

</head>

<body class="editCompanyImgFinished">
    <!-- Inputs edit company images -->
    <?php
    $companyID = (isset($_POST['id']) ? $_POST['id'] : '');
    $token = (isset($_POST['token']) ? $_POST['token'] : '');

    ?>

    <h1> Ladda upp referens bilder</h1>
    <form method="POST" action="editCompanyImg.php" enctype='multipart/form-data' style="height:75vh;">
        <input type='hidden' name='token' value='<?php echo $token ?>'>
        <input type='hidden' name='id' value='<?php echo $companyID ?>'>
        <b>Bifoga bild:</b><br />
        <input type='file' name='file[]' id='fileToUpload' multiple required><br />
        <br />
        <hr>
        <input class="submitButton" type="submit" name="Add" value="Ladda upp" />


    </form>

    <?php include('../../footer.php') ?>
</body>

</html>