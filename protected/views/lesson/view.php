<?php
/* @var $this LessonController */
/* @var $model Lesson */

$this->breadcrumbs=array(
	Yii::t('main', 'Lessons')=>array('index'),
	$model->id,
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
		'subject_id'=>array(
			'label' => $model->getAttributeLabel('subject_id'),
			'value' => $model->subject->name
		),
		'group_id'=>array(
			'label' => $model->getAttributeLabel('group_id'),
			'value' => $model->group->name
		),
		'room_id'=>array(
			'label' => $model->getAttributeLabel('room_id'),
			'value' => $model->room->name
		),
		'teacher_id'=>array(
			'label' => $model->getAttributeLabel('teacher_id'),
			'value' => $model->teacher->name
		),
		'time'=>array(
			'label' => $model->getAttributeLabel('time'),
			'value' => Lesson::getTimeList()[$model->time]
		),
		'day'=>array(
			'label' => $model->getAttributeLabel('day'),
			'value' => Lesson::getDayList()[$model->day]
		),
		'type'=>array(
			'label' => $model->getAttributeLabel('type'),
			'value' => Lesson::getTypeList()[$model->type]
		),
		'isFlasher'=>array(
			'label' => $model->getAttributeLabel('isFlasher'),
			'value' => Lesson::getIsFlasherList()[$model->isFlasher]
		),
	),
)); ?>
