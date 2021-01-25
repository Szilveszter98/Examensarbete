<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<?php include("indexHeader.php");
?>
<center>
<div style="padding-top:250px; background-color:gray; ">
<form method="POST" action="v1/company/searchCompanies.php">
  <label for="gsearch">Sök bland registrerade företag:</label>
  <input type="search"  name="searchWord">
  <input type="submit">
</form>
<!-- Main page and log in button and register button -->
<h1> Welcome </h1> </br>
<button><a href="userIndex.php"> Privatperson </a></button>
</br>
<button><a href="companyIndex.php"> Företag </a></button>
<center>
</div>
<hr>


<?php
 include("footer.php");
?>
</body>
</html>