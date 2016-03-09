<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzfZm59iFzSPrwsc781ByiEsKl4aeuZow"></script>
	<style type="text/css">
		body {
		padding-top: 80px;
		background: #cccccc;
		}
		#info {
			font-size: 18px;
			background: #ffffff;
			width: 450px;
			border-radius: 6px;
			text-align: center;
			color: #666666;
			border: solid 1px #666666;
			margin: auto;
			padding: 3px;

		}
		#respuesta {
			margin: auto 60px;
		}
		#googleMap {
			margin: 10px auto;
			border: 2px solid #666666; 
			border-radius: 6px;
			width:90%; 
			height:250px;
		}
		#map {
			margin: 10px auto;
			width:100%;
			height:280px;
			border: 2px solid #666666; 
			border-radius: 6px;
		}
	</style>
</head>
<body >
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('booster.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	<?php echo $content; ?>

	
 <!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/mapa.js"></script>-->

</body>
</html>