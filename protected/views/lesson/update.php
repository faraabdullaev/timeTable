<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	Yii::t('main', 'Lessons')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('main', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main', 'List'), 'url'=>array('index')),
	array('label'=>Yii::t('main', 'Create'), 'url'=>array('create')),
	array('label'=>Yii::t('main', 'View'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('main', 'Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main', 'Update').'  '.$model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>