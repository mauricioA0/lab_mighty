<style> .errorMessage{ font-size: 10px; color: red; font-family: 'Verdana'; margin-top: -15px;}</style>

<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' Base de datos Actualizada';
$this->breadcrumbs=array(
	'Base de datos Actualizada',
);
?>

<?php if($cache){ ?>
<h1>Cache Actualizada</h1>
<?php } elseif($admin){ ?>
<iframe src="https://motorsclick.com/admin/public/admin" height="3000" frameBorder="0" width="100%" />
<?php }else  { ?>
<h1>Base de datos Actualizada</h1>
<?php } ?>
<div class="form">




	<div class="clearfix">
	
	</div>

	<div class="clearfix buttons">
	</div>

<?php ?>
</div><!-- form -->
