<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('main', 'Users')=>array('index'),
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
		'group_id'=>array(
			'label' => $model->getAttributeLabel('group_id'),
			'value' => $model->group->name
		),
	),
)); ?>
