<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>


<?php
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'plan-form',
		'enableAjaxValidation'=>false,
	));

		echo CHtml::dropDownList(
			'teacher_id',
			null,
			Teacher::getTeacherList()
		);

		echo CHtml::ajaxButton('Ok',
			'/site/index',
			array(
				'type' => 'POST',
				'update'=>'#planTable'
			)
		);

	$this->endWidget();
?>
<br/>
<div id="planTable"></div>