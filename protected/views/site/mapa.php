<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name.' - Mapa';
$this->breadcrumbs=array(
	'Mapa',
);
?>

<div class="jumbotron">
	<h1>Aqui va el mapa</h1>
	<?php 
		$lat = "42.822410654302125";
    	$lng = "-1.6459033203125273";
    	$pos = "42.822410654302125,-1.6459033203125273";
	 ?>
	<div id='info'><?php echo $pos; ?></div>
	<div id='googleMap'></div>
	<div class="row">
		<button type="submit" id='enviar' class='btn btn-danger col-sm-3 col-sm-offset-1'>Guardar</button>
		<a href="<?php echo Yii::app()->request->baseUrl;?>?r=/site/rutas" class="btn btn-warning col-sm-3 col-sm-offset-1">Mostrar puntos</a>	
	</div>
	<div class="row">
      <div id="respuesta">
      </div>
	</div>
      
</div>

<script type="text/javascript">
'use strict'
$(document).ready(function(){
	var lat = "<?php echo $lat; ?>" ;
    var lng = "<?php echo $lng; ?>" ;
    var map;

	function initialize() {
	
    var myLatlng = new google.maps.LatLng(lat,lng);
    var mapOptions = {
        zoom: 7,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
       map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          draggable:true,
          animation: google.maps.Animation.DROP,
          web:"Localización geográfica!",
        });
        google.maps.event.addListener(marker, 'dragend', function(event) {
          var myLatLng = event.latLng;
          lat = myLatLng.lat();
          lng = myLatLng.lng();
          document.getElementById('info').innerHTML = [
          lat,
          lng
          ].join(', ');
        });
        marker.setMap(map);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
        $("#enviar").click(function() { 
        //$("#respuesta").html('<img src="cargando.gif" />');
        $.ajax({
         type: "POST",
         url: "?r=site/regmap",
         data: {'lat': lat,'long': lng},
         success: function(data)
         {
           $("#respuesta")
           	.attr({class:'alert alert-success col-sm-5'})
           	.html(data);
         },
         error: function(){
         	console.log("Ocurrio un error...!!!");
         }
       });
      }); 
});


</script>