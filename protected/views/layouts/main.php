<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="es">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
</head>

<body>

<div class="container" id="page">

	<div id="mainmenu">
		<?php $this->widget('booster.widgets.TbNavbar',array(
			'items'=> array(
				array(
					'class' => 'booster.widgets.TbMenu',
					'htmlOptions' => array('class'=>'navbar-right'),
					'type'=>'navbar',
				'items'=>array(
					array('label'=>'Inicio', 'url'=>array('/site/index')),
					array('label'=>'Mapa', 'url'=>array('site/mapa')),
					array('label'=>'Panel usuario', 'url'=>array('usuario/index'))
					)
				)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('booster.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->



</body>
</html>
