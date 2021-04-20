<?php

$token=(isset($_POST['token']) ? $_POST['token'] : '');
print_r($token);
?>
<link rel="stylesheet" href="./css/styles.css">
<nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="http://localhost/examensarbete/">Your Logo</a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    
                    
                   

                    <li><a> <form method="POST" action="http://localhost/examensarbete/v1/products/allproducts.php"><input type='hidden'  name='token' value='<?php echo $token?>'><input class="navButton" type="submit" value="Tjänster"> </form></a></li>  

                  
                </ul>
            </div>
            <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>
    
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
     $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });


    $('.navTrigger').click(function () {
    $(this).toggleClass('active');
    console.log("Clicked menu");
    $("#mainListDiv").toggleClass("show_list");
    $("#mainListDiv").fadeIn();

});

       
   
    </script>
    


