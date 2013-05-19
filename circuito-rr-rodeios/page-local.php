<?php
/*
Template Name: Local
*/
?>
<?php get_header();?>
<!--ÍNICIO CONTENT-->
<div id="content">

<div id="pageFull">

<?php if (have_posts()): while (have_posts()) : the_post();?>
<h1 class="titulo_page"><?php the_title();?> <img src="<?php bloginfo('template_directory'); ?>/img/spriter.png" /></h1>

<?php the_content();?>     	 
    
<?php endwhile; else:?>
<?php endif;?>

<!--MAPA-->
<body onload="initialize()"> 
<div class="container_12">
<div class="grid_12 bg">
<h2>Traçar Rota</h2>
<div class="form">
	<input type="button" onclick="revRoute();" class="revRoute"/>
	<div class="left">
		<form onsubmit="calcRoute();return false;" >
			<label for="inputStart" class="inputStart" ></label> 
			<input type="text" class="text" value="Chapadão do Sul, MS" id="inputStart"  />
			<br />
			<label for="inputEnd" class="inputEnd"></label> <input type="text" class="text" value="-22.308306,-48.128893" id="inputEnd" />
			<input type="submit" value="Rota" />
		</form>  
	</div>
</div>
<div id="mapa" class="mapa"></div>
<div id="directionsPanel"></div> 

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var directionDisplay;
var directionsService = new google.maps.DirectionsService();
var route = false;
var map;
var marker;
var geocoder;
function initialize() {	
  	directionsDisplay = new google.maps.DirectionsRenderer();
  	geocoder = new google.maps.Geocoder();
	var myLatlng = new google.maps.LatLng(-18.7865266666667, -52.625065);
  	var myOptions = {
		zoom: 15,
		center: myLatlng,
		mapTypeControl: true,
		mapTypeId: google.maps.MapTypeId.HYBRID
  }
  map = new google.maps.Map(document.getElementById("mapa"), myOptions);
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById("directionsPanel"));
}
function calcRoute() {
	if (marker) marker.setMap(null);
	route = true;
   	var start = document.getElementById("inputStart").value;
   	var end = document.getElementById("inputEnd").value;
   	var request = {
       origin:start, 
       destination:end,
       travelMode: google.maps.DirectionsTravelMode.DRIVING
   	};
   	directionsService.route(request, function(response, status) {
     if (status == google.maps.DirectionsStatus.OK) {
       directionsDisplay.setDirections(response);
     }
   });
}
function revRoute(){
    var divStart = document.getElementById("inputStart");
    var divEnd = document.getElementById("inputEnd");
	var start = divStart.value;
	var end = divEnd.value;	
	divStart.value = end;
	divEnd.value = start
	if( route == true){
		calcRoute();	
	}
}
</script>
<br class="clear" />
</div>
</div>
</body>
<!--END MAPA-->
</div>

<div id="siderbar">
<?php get_sidebar();?>
</div>

</div>
<!--END CONTENT-->
<?php get_footer();?>