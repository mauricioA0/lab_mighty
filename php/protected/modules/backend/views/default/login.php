<style> .errorMessage{ font-size: 10px; color: red; font-family: 'Verdana'; margin-top: -15px;}</style>

<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Acceso para usuarios</h1>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>

	<p class="note">Campos marcados con <span class="required">*</span> son requeridos.</p>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?><br><br>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?><br><br>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="clearfix rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="clearfix buttons">
		<?php echo CHtml::submitButton('Ingresar',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
