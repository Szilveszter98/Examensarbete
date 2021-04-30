<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="./css/styles.css">
</head>
<!--including header-->
<?php include("indexHeader.php"); ?>

<body>


  <div class="indexContainer">
    <h1> Välkommen </h1>
    <form method="POST" action="./v1/company/searchCompanies.php">
      <label for="gsearch">Sök bland registrerade företag</label><br>
      <input class="searchField" type="search" name="searchWord">
      <input class="searchButton" type="submit" value="Sök">
    </form>


    <!-- Main page and log in button and register button -->
    <div class="loginButtons">
      <div class="text">
        <span>Registrera dig och lägg till arbete och få belöning</span>
      </div>
      <button><a href="./v1/users/userIndex.php">Privatperson</a></button>
      <br>
      <br>
      <div class="text">
        <span>Registrera företag och få mer jobb!</span>
      </div>
      <button><a href="./v1/company/companyIndex.php"> Företag </a></button>
      
    </div>

  </div>



  <?php include("footer.php");?>
</body>

</html>