<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>
<center>
<!-- Form to create new products -->
<h1> Creating a new Post </h1>
<form method="POST" action="v1/posts/addPost.php">
            
            Title:<input type="text" name="title" placeholder="Product Title" /><br />
            Beskrivning:<textarea name="description" placeholder="description" rows="1" cols="18"></textarea><br />
            <label for="start">Start date:</label>

            <input type="date" id="start" name="trip-start">

            type of work...
            <hr>
            <input type="submit" name="Add"/>
        </form>
</center>

<?php



?>
</body>
</html> 

 