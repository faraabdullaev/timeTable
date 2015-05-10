<?php
/* @var $this TeacherController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('main', 'Teachers'),
);

$this->menu=array(
	array('label'=>Yii::t('main', 'Create'), 'url'=>array('create')),
	array('label'=>Yii::t('main', 'Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main', 'Teachers');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
