<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>'Listar <?php echo $this->modelClass; ?>s','url'=>array('index'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear <?php echo $this->modelClass; ?>','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Editar <?php echo $this->modelClass; ?>','url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Borrar <?php echo $this->modelClass; ?>','url'=>'#','linkOptions'=>array('class'=>'btn btn-primary', 'submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Seguro que quiere eliminar este elemento?')),
	array('label'=>'Administrador <?php echo $this->modelClass; ?>s','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Ver <?php echo $this->modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
