<?php
/* @var $this TeacherController */
/* @var $model Teacher */

$this->breadcrumbs=array(
	Yii::t('main', 'Teachers')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('main', 'List'), 'url'=>array('index')),
	array('label'=>Yii::t('main', 'Create'), 'url'=>array('create')),
	array('label'=>Yii::t('main', 'Update'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('main', 'Delete'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('main', 'Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('main', 'Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main', 'View').' #'.$model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
