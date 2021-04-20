<?php
$token =(isset($_POST['token']) ? $_POST['token'] : '');


?>

<nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="http://localhost/examensarbete/">LOGO<img src=""></a>
            </div>
            <div id="mainListDiv" class="main_list">
                    
                    
                        
                      
                      
                <ul class="navlinks">

                    <li><a> <form method="POST" action="http://localhost/examensarbete/v1/users/userProfile.php"><input type='hidden'  name='token' value='<?php echo $token?>'><input class="navButton" type="submit" value="Profil"> </form></a></li> 
                    <li><a> <form method="POST" action="http://localhost/examensarbete/v1/company/allCompanies.php"><input type='hidden'  name='token' value='<?php echo $token?>'><input class="navButton" type="submit" value="Alla Företag"> </form></a></li> 
                 
                </ul>
            </div>
            <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>
  
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