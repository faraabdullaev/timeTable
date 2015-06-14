<?php

class SiteController extends Controller
{
	public $defaultAction = 'index';

	public function actionIndex(){
		if(Yii::app()->request->isAjaxRequest){
			$id = Yii::app()->request->getPost('teacher_id');
			$teacherLessons = Lesson::model()->findAllByAttributes(
				[
					'teacher_id' => $id
				],
				[
					'order' => 'time'
				]
			);
			if(count($teacherLessons)==0){
				$this->renderPartial('_emptyResult');
				Yii::app()->end();
			}
			$lessons = [];
			foreach($teacherLessons as $lesson){
				$lessons[$lesson->day][] = $lesson;
			}
			$this->renderPartial('_planTable', [
				'lessons' => $lessons
			]);
		} else
			$this->render('index');
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionLogin()
	{
		$model=new LoginForm;

		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
				$this->redirect(['index']);
		}
		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}