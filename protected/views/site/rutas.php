<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name. ' - Rutas';
$this->breadcrumbs=array(
	'Mapa'=>'?r=site/mapa',
	'Rutas',
);
?>

<div class="jumbotron">
	<h1 class="text-center">Localizaciones mostradas</h1>
	<div id='googleMap'></div>
</div>
<?php 
  	#sacamos los datos del modelo del controlador SiteController
	$data = array();
	foreach ($model as $dato) {
		$data[] = array('id'=>$dato->id,'lat'=>$dato->lat,'long'=>$dato->long);
	}
	//codificamos a json
	$json_string = json_encode($data);
?>
<script type="text/javascript">
	
function load() {
    var map = new google.maps.Map(document.getElementById("googleMap"), {
      center: new google.maps.LatLng(42.822410654302125,-1.6459033203125273),
      zoom: 7,
      mapTypeId: 'roadmap'
    });
   //pasamos el obj json a string
	var data = '"<?php echo $json_string; ?>"';

	//deshacemos las comillas dobles que nos aparecen al convertirlo en json con php
	data = JSON.parse(data.substring(1,data.length-1));
	console.log(data);
	for(punto in data){
		//puntos a mostrar en el mapa
		var point = new google.maps.LatLng(
              parseFloat(data[punto].lat),
              parseFloat(data[punto].long)
           	);
    	var marker = new google.maps.Marker({
          map: map,
          position: point
        });
	}   
 }
 //evento load a ejectar la funcion load
google.maps.event.addDomListener(window, 'load', load);
</script>