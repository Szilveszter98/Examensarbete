<?php
//include("../../companyHeader.php");
$token =(isset($_POST['token']) ? $_POST['token'] : '');
if(!empty($token)){
    echo '<center>';
    echo '<h1> Fyll i informationen nedan</h1>    ';
    echo '<form method="POST" action="v1/company/registerCompany.php">';
    echo 'Företagsnamn:<br />';
    echo '<input type="text" name="companyName" required>';
    echo '<br />';
    echo 'Beskrivning:<br />';
    echo '<input type="text" name="description" required>';
    echo '<br />';
    echo 'Telefon nummer:<br />';
    echo '<input type="tel" name="telefonNummer" required>';
    echo '<br />';
    echo 'E-mail: <br />';
    echo '<input type="email" name="email" required>';
    echo '<br />';
    echo 'Organisations nummer:<br />';
    echo '<input type="number" name="organisationsNummer" required>';
    echo '<br />';
    echo 'Address:<br />';
    echo '<input type="text" name="address" required>';
    echo '<br />';
    echo 'Postnummer:<br />';
    echo '<input type="number" name="postnummer" required>';
    echo '<br />';
    echo 'Password: <br />';
    echo '<input type="password" name="password"required>';
    echo '<br/>';
    echo '<hr>';
    echo '  <input  type="submit" value="Register" /></br>';
    echo ' </form>';
    echo '</center>';
    
}else{
    echo "<h1>Du måste logga in för att kunna köpa tjänsten!</br>";
    echo "<a href='http://localhost/examensarbete/loginCompany.php'> Logga in </a></h1>";
}
