<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobbnärverk</title>
</head>
<body>
   <!-- Inputs to registeration -->
<center>
<h1> Please register an account!</h1>    
<form method="POST" action="v1/users/addUser.php">
Företagsnamn:<br />
<input type="text" name="companyName" required>
<br />
Beskrivning:<br />
<input type="text" name="description" required>
<br />
Telefon nummer:<br />
<input type="number" name="telefonNummer" required>
<br />
E-mail: <br />
<input type="email" name="email" required>
<br />
Organisations nummer:<br />
<input type="number" name="organisationsNummer" required>
<br />
Address:<br />
<input type="text" name="address" required>
<br />
Postnummer:<br />
<input type="number" name="postnummer" required>
<br />
Password: <br />
<input type="password" name="password"required>
<br />
<hr>
<input  type="submit" value="Register" /></b>
</form>
</center>
</body>
</html>