<?php
/* @var $this LessonController */
/* @var $model Lesson */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lesson-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'subject_id'); ?>
		<?php
		echo $form->dropDownList(
			$model,
			'subject_id',
			Subject::getSubjectList()
		); ?>
		<?php echo $form->error($model,'subject_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_id'); ?>
		<?php
		echo $form->dropDownList(
			$model,
			'group_id',
			Group::getGroupList()
			); ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_id'); ?>
		<?php
		echo $form->dropDownList(
			$model,
			'room_id',
			Room::getRoomList()
			); ?>
		<?php echo $form->error($model,'room_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teacher_id'); ?>
		<?php
		echo $form->dropDownList(
			$model,
			'teacher_id',
			Teacher::getTeacherList()
			); ?>
		<?php echo $form->error($model,'teacher_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php
		echo $form->dropDownList(
			$model,
			'time',
			Lesson::getTimeList()
			); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day'); ?>
		<?php
		echo $form->dropDownList(
			$model,
			'day',
			Lesson::getDayList()
		); ?>
		<?php echo $form->error($model,'day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList(
			$model,
			'type',
			Lesson::getTypeList()
		); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->