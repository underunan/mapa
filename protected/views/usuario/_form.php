<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'usuario-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>'form-horizontal'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<div class="row">
		<?php echo $form->labelEx($model,'avatar'); ?>
			<?php
  $this->widget('CMultiFileUpload', array(
        'model'=>$model,
        'htmlOptions' => array('maxSize' => 1024*1024*1,
        'tooLarge'=>'Error, la imagen no debe exceder mas de 1MB',),
        'attribute'=>'avatar',
        'accept'=>'jpg|gif|png',
        'denied'=>'File is not allowed',
        'max'=>3, // max 10 files
 
  ));
		?>

		<?php #echo $form->fileField($model,'avatar');?>
		
		<?php echo $form->error($model,'avatar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	

<?php $this->endWidget(); ?>

</div><!-- form -->