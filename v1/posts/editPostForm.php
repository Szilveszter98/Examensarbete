<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>

    <?php
    include("../../objects/posts.php");

    $post_handler = new Post($databaseHandler);
    $postID = (isset($_POST['id']) ? $_POST['id'] : '');
    $token = (isset($_POST['token']) ? $_POST['token'] : '');
    $row = $post_handler->fetchSinglePost($postID);

    ?>
    <!-- Form to create new products -->

    <div class="editPostForm">
        <h1> Edit your post </h1>
        <form method="POST" action="./editPost.php">
            <input type='hidden' name='id' value='<?php echo $postID ?>'>
            <input type='hidden' name='token' value='<?php echo $token ?>'>
            <input type='hidden' name='token' value='<?php echo $token ?>'>
            Title:</br><input type="text" class="inputField" name="title" placeholder="" value="<?= $row['title'] ?>" /><br />
            Beskrivning:</br><textarea name="description" class="inputField" placeholder="Beskrivning" rows="1" cols="18"><?= $row['description'] ?></textarea><br />
            <label for="start">Start date:</label></br>

            <input type="date" id="startDate" name="startDate" value="<?= $row['startDate'] ?>">
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
            <input type='file' name='file[]' id='fileToUpload' multiple><br />
            <br /> -->
            Ort:<br />
            <input class="inputField" type="text" name="ort" value="<?= $row['ort'] ?>" required>
            <br />
            E-mail: <br />
            <input class="inputField" type="email" name="email" value="<?= $row['email'] ?>" required>
            <br />
            Telefon nummer:<br />
            <input class="inputField" type="tel" name="telefonNummer" value="<?= $row['telefonNummer'] ?>" required>
            <br />
            <hr>
            <input class="submitButton" type="submit" name="Add" value="Publicera" />
        </form>
    </div>

    <?php
    include("../../footer.php"); ?>


</body>

</html>