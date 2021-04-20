<?php
$token = (isset($_POST['token']) ? $_POST['token'] : '');
print_r($token);?>
<nav class="nav">
    <div class="container">
        <div class="logo">
            <a href="http://localhost/examensarbete/">LOGOt<img src=""></a>
        </div>
        <div id="mainListDiv" class="main_list">
            </form>
            <ul class="navlinks">

                <li><a href="http://localhost/examensarbete/v1/products/allProducts.php">Tjänster</a></li>
                <li><a href="http://localhost/examensarbete/v1/company/allCompanies.php">Alla företag</a></li>
                <li><a href="http://localhost/examensarbete/userIndex.php">Privatperson</a></li>
                <li><a href="http://localhost/examensarbete/v1/company/allCompanies.php">Företag</a></li>

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


    $('.navTrigger').click(function() {
        $(this).toggleClass('active');
        console.log("Clicked menu");
        $("#mainListDiv").toggleClass("show_list");
        $("#mainListDiv").fadeIn();

    });
</script>