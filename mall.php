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
			<li>
                        <a href="services.html">
                            Services
                        </a>
                    </li>                    
			<li>
                        <a href="browse.php">
                            ATM
                        </a>
                    </li>
                    <li >
                        <a href="hotel.php">
                            Hotels
                        </a>
                    </li>
                    <li>
                        <a href=restaurant.php>
                            Restaurants
                        </a>
                    </li>
                    <li >
                        <a href=hospital.php>
                            Hospitals
                        </a>
                    </li>
		<li class="active">
                        <a href=mall.php>
                            Malls
                        </a>
                    </li>
		<li>
                        <a href=theatre.php>
                            Theatre
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

         <font size=25px>The Departmental stores's nearby are:</font>
	<div class=list>
	<ol>
		<div id=lis>
		</div>
	</ol>
	</div>
        </div>
        <!--=================== content body end ====================-->
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>



<style>
li{
font-size:20px;
}
</style>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script language=javascript>
var lat;
var lon;
navigator.geolocation.getCurrentPosition(function(position) {
   lat=position.coords.latitude; 
     lon=position.coords.longitude;
	 
//console.log(lat);
var pname=[];
var pid=[];
var add=[];
var d="";
var addr="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location="+lat+","+lon+"&radius=5000&type=shopping_mall&keyword=&key=AIzaSyAUxpONmjvDKbyWoEmPbE7UfOC-E0-uAjI";
$.ajax({
  url:addr,
  success: function(data){
  var co=0;
for(var i=0;i<data["results"].length;i++)
{
//console.log("main loop execution");
   pid.push(data["results"][i]["place_id"]);
   pname.push("<li>"+data["results"][i].name);
 }
 console.log("pid=",pid);
 console.log("pname=",pname);// main for
 
 address(pid,pname);
} //1 ajax success
});
function address(pid,pname){
for(var i=0;i<pname.length;i++){
   var pd="https://maps.googleapis.com/maps/api/place/details/json?placeid="+pid[i]+"&key=AIzaSyAUxpONmjvDKbyWoEmPbE7UfOC-E0-uAjI";
$.ajax({
   url:pd,
   success: function(pdata){
	var d="";
	for(var k=0;k<pdata["result"]["address_components"].length;k++){
   if((k%2)==0){
   d+="<br>";}
   
   d+="<span style='font-size:20px;'>"+pdata["result"]["address_components"][k]["long_name"]+",";
   }
   //console.log("d=",d);
   d+="</span><br><br>";
   add.push(d);
   console.log("add=",add);
   display(pid,pname,add);
   }
});
 }
 
 }
	});
function display(pid,pname,add){
	var s="";
	for(var i=0;i<pname.length;i++){
s+="<a href='loc.php?pid="+pid[i]+"'>"+pname[i]+"</a>";
var pd="https://maps.googleapis.com/maps/api/place/details/json?placeid="+pid[i]+"&key=AIzaSyAUxpONmjvDKbyWoEmPbE7UfOC-E0-uAjI";
s+=add[i];
}

$("#lis").html(s);
}</script>

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
