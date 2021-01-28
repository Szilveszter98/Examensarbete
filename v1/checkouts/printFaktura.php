<?php
    include("../../objects/faktura.php");
    $faktura_handler = new FakturaData($databaseHandler);
    $companyID =(isset($_POST['companyID']) ? $_POST['companyID'] : '');
    $token =(isset($_POST['token']) ? $_POST['token'] : '');
    $fakturaData=$faktura_handler->fetchFaktura($companyID);
    
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Shrikhand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
    <script src="faktura.js"><script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background: white;
        }
    </style>
</head>

<body>
<header>
        <div class="toolbar hidden-print" data-html2canvas-ignore="true">
            <div class="text-right">
                <button class="btn-pdf" id="pdfbttn" onclick="getpdf()"><i class="fa fa-file-pdf"></i> Ladda ner som PDF</button>
            </div>
        </div>
    </header>
    <hr>
    <!-- Faktura -->

    <div id="printableArea">
        <div class="faktura overflow-auto" id="printIT">
            <table class="table table-borderless">
                <tr class="head">
                    <td>
                        <h1 style="font-size: 4rem;">Faktura</h1>
                    </td>
                    <td class="faktura-logo" data-html2canvas-ignore="true">
                        <img src="../../uploads/logo.png" id="logo" alt="firma logo" style="width: 200px; height:100px;">
                    </td>
                </tr>
            </table>
            <!-- kunder info -->
            <div class="container kundInfo-container">
                <div class="kundInfo">
                    <div>
                        <h6>Faktura till</h6>
                        <h3 class="kunderNamn"><?php echo $fakturaData['companyName']?> </h3>
                        <h6>kunders referens:</h6>
                        <p class="kunder-referens"><?php echo $fakturaData['companyReferens']?> </p>
                        <h6>kunders address:</h6>
                        <address class="kunderAddress"><?php echo $fakturaData['companyAddress']?></address>
                    </div>
                    <div>
                        <h6>Kundnummer:</h6>
                        <p class="kundnummer">12134455</p>
                        <h6>Fakturadatum:</h6>
                        <p class="fakturaDatum"><?php echo $fakturaData['fakturaDate']?></p>
                        <h6>Förfallodatum:</h6>
                        <p class="forfalloDatum"><?php echo $fakturaData['lastPayDate']?></p>
                    </div>
                    <div>
                        <h6>Plusgironr.</h6>
                        <p><?php echo $fakturaData['bankgiro']?></p>
                        <h6>Bankgironr.</h6>
                        <p><?php echo $fakturaData['plusgiro']?></p>
                    </div>
                    <div class="alignR">
                        <h6>Totalt summan</h6>
                        <p class="summan summan-top"><?php echo $fakturaData['amount']?></p>
                        <br><br><br>
                        <h6>Fakturanummer</h6>
                        <p class="fakturaNummer"><?php echo $fakturaData['fakturaNumber']?></p>
                    </div>
                </div>
            </div>
            <!-- End of kunder info -->
            <!-- product och pris lista -->
            <div class="container">
                <table class="table table-border-top">
                    <thead>
                        <tr>
                            <th scope="col">Beskrivning</th>
                            <th scope="col">Tid</th>
                            <th scope="col">Moms</th>
                            
                            
                            <th scope="col">Belopp</th>
                        </tr>
                    </thead>
                    <tbody class="prolist">
                        <tr>
                            <td><?php echo $fakturaData['ProductName']?></td>
                            
                           
                            <td><?php echo $fakturaData['productValidTime']?></td>
                            <td>25%</td>
                            
                            <td><?php echo $fakturaData['amount']?>  kr</td>
                        </tr>
                    </tbody>
                    <!-- summan av faktura -->
                   
                </table>
            </div>
            <!-- faktura footer, firma info -->
            <div class="container firma">
                <table class="table table-sm table-borderless table-border-top">
                    <thead>
                        <tr>
                            <th>Work Net Work</th>
                            <th>Kontaktuppgifter</th>
                            <th>Betalningsuppfigter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Strålsjövägen 11</td>
                            <td>Szilveszter Mag</td>
                            <td>Plusgironr: <?php echo $fakturaData['plusgiro']?></td>
                        </tr>
                        <tr>
                            <td>Stockholm, Sweden</td>
                            <td>Epost:szilveszter.mag98</td>
                            <td>Bankgironr: <?php echo $fakturaData['bankgiro']?></td>
                        </tr>
                        <tr>
                            <td>org.nr 69696969696</td>
                            <td>Tel +46722505330</td>
                            <td>IBAN: SE98754613358</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div></div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
</body>

</html>