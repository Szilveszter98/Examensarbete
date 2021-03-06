<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrera Företag</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    <!-- Inputs to company registeration -->
    <?php include("../../indexHeader.php"); ?>
    <div class="signupCompanyPage">
        <h1> Please register an account!</h1>
        <form method="POST" action="registerCompany.php">
            Företagsnamn:<br />
            <input type="text" name="companyName" required>
            <br />
            Beskrivning:<br />
            <input type="text" name="description" required>
            <br />
            Telefon nummer:<br />
            <input type="tel" name="telefonNummer" required>
            <br />
            E-mail: <br />
            <input type="email" name="email" required>
            <br />
            Organisations nummer:<br />
            <input type="number" name="organisationsNummer" required>
            <br />
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
            </br>
            Address:<br />
            <input type="text" name="address" required>
            <br />
            Postnummer:<br />
            <input type="number" name="postnummer" required>
            <br />
            Password: <br />
            <input type="password" name="password" required>
            <br />

            <br>
            <hr>
            <br>
            <input class="submit" type="submit" value="Register" /></b>
        </form>
        <br>

    </div>
    <?php include("../../footer.php"); ?>
</body>

</html>