<?php
/* @var $this SubjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('main', 'Subjects'),
);

$this->menu=array(
	array('label'=>Yii::t('main', 'Create'), 'url'=>array('create')),
	array('label'=>Yii::t('main', 'Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main', 'Subjects');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
