<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avatar')); ?>:</b>
	<?php echo CHtml::encode($data->avatar); ?>
	<?php echo CHtml::image(Yii::app()->request->baseUrl.'/users-images/'.$data->avatar,$data->avatar,array('width'=>'140px','height'=>'140px','class'=>'img-thumbnail')); ?>
	<br />


</div>