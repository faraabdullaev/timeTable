<?php
/* @var $this LessonController */
/* @var $model Lesson */
$this->breadcrumbs=array(
	Yii::t('main', 'Lessons')=>array('index'),
	Yii::t('main', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main', 'List'), 'url'=>array('index')),
	array('label'=>Yii::t('main', 'Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main', 'Create');?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>