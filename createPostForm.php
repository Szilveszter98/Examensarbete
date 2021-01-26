<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>
<center>
<?php
$userID =(isset($_POST['id']) ? $_POST['id'] : '');
$token =(isset($_POST['token']) ? $_POST['token'] : '');
?>
<!-- Form to create new products -->
<h1> Creating a new Post </h1>
<form method="POST" action="v1/posts/createPost.php" enctype='multipart/form-data'>
<input type='hidden'  name='id' value='<?php echo $userID?>'>
<input type='hidden'  name='token' value='<?php echo $token?>'>
            Title:</br><input type="text" name="title" placeholder="Product Title" /><br />
            Beskrivning:</br><textarea name="description" placeholder="description" rows="1" cols="18"></textarea><br />
            <label for="start">Start date:</label></br>

            <input type="date" id="startDate" name="startDate">
            <br>

            <label for="type">Vilken typ av hjälp behöver du?</label>
            </br>
            <select name="type" id="type">
                <option value="Rörmokare">Rörmokare</option>
                <option value="Målare">Målare</option>
                <option value="Elektriker">Elektriker</option>
                <option value="Snickare">Snickare</option>
                <option value="Svetsare">Svetsare</option>
                <option value="Ventilation">Ventilation</option>
                <option value="Golvläggare">Golvläggare</option>
                

            </select>
            <br>
            <!-- <b>Bifoga bild:</b><br />
            <input type='file' name='file[]' id='fileToUpload' multiple required><br />
            <br /> -->
            Address:<br />
            <input type="text" name="ort" required>
            <br />
            E-mail: <br />
            <input type="email" name="email" required>
            <br />
            Telefon nummer:<br />
            <input type="tel" name="telefonNummer" required>
            <br />
            <hr>
            <input type="submit" name="Add" value="Nästa"/>
        </form>
</center>

<?php



?>
</body>
</html> 

 