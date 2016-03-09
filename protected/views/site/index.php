<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name. ' - Mapa';
$this->breadcrumbs=array(
	'Mapa',
);
?>

<div class="jumbotron">
	<h1>Ejemplo, yii</h1>
	<p>Este es un ejemplo de google maps con el framework yii.</p>
	<p><a href="<?php echo'?r=site/mapa'; ?>" class="btn btn-primary btn-lg" role="button">Agregar localización</a></p>
</div>