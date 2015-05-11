<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	Yii::t('main', 'Users')=>array('index'),
	Yii::t('main', 'Manage'),
);

$this->menu=array(
	array('label'=> Yii::t('main', 'List'), 'url'=>array('index')),
	array('label'=>Yii::t('main', 'Create'), 'url'=>array('create')),
);

?>

<h1><?php echo Yii::t('main', 'Manage')?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'group_id'=>array(
			'name' => 'group_id',
			'value' => '$data->group->name',
			'filter' => CHtml::dropDownList(
				'User[group_id]',
				$model->search()->model->attributes['group_id'],
				array(''=>'') + Group::getGroupList()
			)
		),
		'reg_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
