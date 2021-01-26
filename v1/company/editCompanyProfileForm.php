<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit companydetails</title>
</head>
<body>
   <!-- Inputs to registeration -->

   <?php
   
   include("../../objects/companies.php");

$company_handler = new Company($databaseHandler);
$companyID =(isset($_POST['id']) ? $_POST['id'] : '');
$token=(isset($_POST['token']) ? $_POST['token'] : '');
$row = $company_handler->fetchCompanyData($companyID)
//
?>
<center>
<h1> Please register an account!</h1>    
<form method="POST" action="editCompanyProfile.php">
<input type='hidden'  name='token' value='<?php echo $token?>'>
<input type='hidden'  name='id' value='<?php echo $companyID?>'>
Företagsnamn:<br />
<input type="text" name="companyName" value="<?php echo $row['companyName']?>" required>
<br />
Beskrivning:<br />
<input type="text" name="description" value="<?php echo $row['description']?>" required>
<br />
Telefon nummer:<br />
<input type="tel" name="telefonNummer" value="<?php echo $row['telefonNummer']?>" required>
<br />
E-mail: <br />
<input type="email" name="email" value="<?php echo $row['email']?>" required>
<br />
Organisations nummer:<br />
<input type="number" name="organisationsNummer" value="<?php echo $row['organisationsNummer']?>"  required>
<br />
<label for="type">Vilken typ av företag?</label>
            </br>
            <select name="type" id="type"  >
            <option value="">Välj en alternativ</option>
                <option value="Rörmokare">Rörmokare</option>
                <option value="Målare">Målare</option>
                <option value="Elektriker">Elektriker</option>
                <option value="Snickare">Snickare</option>
                <option value="Svetsare">Svetsare</option>
                <option value="Ventilation">Ventilation</option>
                <option value="Golvläggare">Golvläggare</option>
                

            </select>
</br>
Address:<br />
<input type="text" name="address" value="<?php echo $row['address']?>"  required>
<br />
Postnummer:<br />
<input type="number" name="postnummer" value="<?php echo $row['postnummer']?>"  required>
<br />
Password: <br />
<input type="password" name="password" required>
<br />
<hr>
<input  type="submit" value="Register" /></b>
</form>
</center>
</body>
</html>