<?php
/* @var $this SubjectController */
/* @var $model Subject */

$this->breadcrumbs=array(
	Yii::t('main', 'Subjects')=>array('index'),
	Yii::t('main', 'Manage'),
);

$this->menu=array(
	array('label'=> Yii::t('main', 'List'), 'url'=>array('index')),
	array('label'=>Yii::t('main', 'Create'), 'url'=>array('create')),
);

?>

<h1><?php echo Yii::t('main', 'Manage')?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'subject-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
