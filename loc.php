<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="description" content="Cocoon -Portfolio">
    <meta name="keywords" content="Cocoon , Portfolio">
    <meta name="author" content="Pharaohlab">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ========== Title ========== -->
<title> Tourist guide</title>
    <!-- ========== Favicon Ico ========== -->
    <!--<link rel="icon" href="fav.ico">-->
    <!-- ========== STYLESHEETS ========== -->
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts Icon CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/et-line.css" rel="stylesheet">
    <link href="assets/css/ionicons.min.css" rel="stylesheet">
    <!-- Carousel CSS -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Magnific-popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<div class="body-container container-fluid">

    <!--=================== menu Button show in small screens ====================-->
    <a class="menu-btn" href="javascript:void(0)">
        <i class="ion ion-grid"></i>
    </a>
    <!--=================== menu Button end====================-->

    <div class="row justify-content-center">
        <!--=================== side menu ====================-->
        <div class="col-lg-2 col-md-3 col-12 menu_block">

            <!--logo -->
            <div class="logo_box">
                <a href="#">
                    <img src="assets/img/logo.png" alt="cocoon">
                </a>
		Tourist Guide System 
            </div>
            <!--logo end-->

            <!--main menu -->
            <div class="side_menu_section">
                <ul class="menu_nav">
                    <li  class="active">
                        <a href="find.php">
                            Find
                        </a>
                    </li>
                    <li>
                        <a href="browse.php">
                            Browse
                        </a>
                    </li>
                    <li>
                        <a href="services.html">
                            Servies
                        </a>
                    </li>
                  
                </ul>
            </div>
	
            <!--main menu end -->



            <!--social and copyright -->
            <div class="side_menu_bottom">
                <div class="side_menu_bottom_inner">
                    <ul class="social_menu">
                        <li>
                            <a href="#"> <i class="ion ion-social-pinterest"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-facebook"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-twitter"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-dribbble"></i> </a>
                        </li>
                    </ul>
                    <div class="copy_right">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </p>
                    </div>
                </div>
            </div>
            <!--social and copyright end -->

        </div>
        <!--=================== side menu end====================-->

        <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">

<div class=main>
<div class=cont>
<center><h2><font size=14><u id=name></u></font></h2></center>
<center><div id=addr></div></center><Br>
<font size=5><i class="fa fa-phone" aria-hidden="true"></i><span id=phone></span></font><br><br>
<font size=5>Average rating: <span id=rating></span><i style="text:yellow;" class="fa fa-star" aria-hidden="true"></i></font>
<br><font size=5>Opening days:<div id=open></div><br></font>
<font size=11><b>Reviews:</b></font>
<div id=res></div>
</div>
</div>

        </div>
        <!--=================== content body end ====================-->
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

<script language=javascript>
var s="";
var n="";
//"<?php echo $_GET['pid']; ?>";
var pid="<?php echo $_GET['pid']; ?>";
//"ChIJjfx_62lmUjoRNvYztmT71UY";
$.ajax({
url:"https://maps.googleapis.com/maps/api/place/details/json?placeid="+pid+"&key=AIzaSyAUxpONmjvDKbyWoEmPbE7UfOC-E0-uAjI",
success:function(data){
console.log(data["result"]["name"]);
$("#name").html(data["result"]["name"]);
$("#addr").html(data["result"]["formatted_address"]);
$("#phone").html(data["result"]["formatted_phone_number"]);
$("#rating").html(data["result"]["rating"]);
for(var i=0;i<data["result"]["opening_hours"]["weekday_text"].length;i++){
n+=data["result"]["opening_hours"]["weekday_text"][i]+"<br>";
$("#open").html(n);
}
for(var i=0;i<data["result"]["reviews"].length;i++){
s+="<font size=4 color=grey>By:"+data["result"]["reviews"][i].author_name+"<Br></font>";
s+="<font size=4 color=grey>Rating:"+data["result"]["reviews"][i].rating+"<i class='fa fa-star' aria-hidden='true'></i><Br></font>";	
s+="<font size=4>"+data["result"]["reviews"][i].text+"</font><Br><br>";
}
$("#res").html(s);
}
});
</script>

<style>
li{
font-size:20px;
}
</style>

<!-- jquery -->
<script src="assets/js/jquery.min.js"></script>
<!-- bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<!--slick carousel -->
<script src="assets/js/slick.min.js"></script>
<!--Portfolio Filter-->
<script src="assets/js/imgloaded.js"></script>
<script src="assets/js/isotope.js"></script>
<!-- Magnific-popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!--Counter-->
<script src="assets/js/jquery.counterup.min.js"></script>
<!-- WOW JS -->
<script src="assets/js/wow.min.js"></script>
<!-- Custom js -->
<script src="assets/js/main.js"></script>
</body>
</html>
