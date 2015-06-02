<?php
/* @var $this LessonController */
/* @var $model Lesson */
$this->breadcrumbs=array(
	Yii::t('main', 'Lessons')=>array('index'),
	Yii::t('main', 'Manage'),
);

$this->menu=array(
	array('label'=> Yii::t('main', 'List'), 'url'=>array('index')),
	array('label'=>Yii::t('main', 'Create'), 'url'=>array('create')),
);

?>

<h1><?php echo Yii::t('main', 'Manage')?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'lesson-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'subject_id'=>array(
			'name' => 'subject_id',
			'value' => '$data->subject->name'
		),
		'group_id'=>array(
			'name' => 'group_id',
			'value' => '$data->group->name'
		),
		'room_id'=>array(
			'name' => 'room_id',
			'value' => '$data->room->name'
		),
		'teacher_id'=>array(
			'name' => 'teacher_id',
			'value' => '$data->teacher->name'
		),
		'time'=>array(
			'name' => 'time',
			'value' => 'Lesson::getTimeList()[$data->time]',
			'filter' => CHtml::dropDownList(
				'Lesson[time]',
				$model->search()->model->attributes['time'],
				array(''=>'') + Lesson::getTimeList()
			)
		),
		'day'=>array(
			'name' => 'day',
			'value' => 'Lesson::getDayList()[$data->day]',
			'filter' => CHtml::dropDownList(
				'Lesson[day]',
				$model->search()->model->attributes['day'],
				array(''=>'') + Lesson::getDayList()
			)
		),
		'type'=>array(
			'name' => 'type',
			'value' => 'Lesson::getTypeList()[$data->type]',
			'filter' => CHtml::dropDownList(
				'Lesson[type]',
				$model->search()->model->attributes['type'],
				array(''=>'') + Lesson::getTypeList()
			)
		),
		'isFlasher'=>array(
			'name' => 'isFlasher',
			'value' => 'Lesson::getIsFlasherList()[$data->isFlasher]',
			'filter' => CHtml::dropDownList(
				'Lesson[isFlasher]',
				$model->search()->model->attributes['isFlasher'],
				array(''=>'') + Lesson::getIsFlasherList()
			)
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
