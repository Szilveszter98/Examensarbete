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
    // getting data with POST and fetching out company data
    $companyID = (isset($_POST['id']) ? $_POST['id'] : '');
    $token = (isset($_POST['token']) ? $_POST['token'] : '');
    $row = $company_handler->fetchCompanyData($companyID);
    
    //
    ?>
    <link rel="stylesheet" href="../../css/styles.css">
    <!-- Edit company profile form-->
    <div class="editCompanyProfileForm">
        <h1> Redigera konton</h1>
        <form method="POST" action="editCompanyProfile.php">
            <input type='hidden' name='token' value='<?php echo $token ?>'>
            <input type='hidden' name='id' value='<?php echo $companyID ?>'>
            <h4>Företagsnamn</h4>
            <input type="text" class="inputField" name="companyName" value="<?php echo $row['companyName'] ?>" required>
            <br />
            <h4>Beskrivning</h4>
            <textarea type="text" rows="5" cols="50" class="inputField" name="description" required><?php echo $row['description'] ?></textarea>
            <br />
            <h4>Telefon nummer</h4>
            <input type="tel" class="inputField" name="telefonNummer" value="<?php echo $row['telefonNummer'] ?>" required>
            <br />
            <h4>E-post adress</h4>
            <input type="email" class="inputField" name="email" value="<?php echo $row['email'] ?>" required>
            <br />
            <h4>Organisationsnummer</h4>
            <input type="number" class="inputField" name="organisationsNummer" value="<?php echo $row['organisationsNummer'] ?>" required>
            <br />
            <label for="type">
                <h4>Vilken typ av företag?</h4>
            </label>

            <select class="inputField" name="type" id="type">
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
            <h4>Adress</h4>
            <input type="text" class="inputField" name="address" value="<?php echo $row['address'] ?>" required>
            <br />
            <h4>Postnummer</h4>
            <input type="number" class="inputField" name="postnummer" value="<?php echo $row['postnummer'] ?>" required>
            <br />
            <h4>Lösenord</h4>
            <input type="password" class="inputField" name="password" required>
            <br>
            <br>
            <hr>
            <br>
            <input class="submitButton" type="submit" value="Bekräfta" /></b>
        </form>
    </div>
    <!-- Footer-->
    <?php include("../../footer.php"); ?>
</body>

</html>