<?php
/**
 * Created by PhpStorm.
 * User: farrukh
 * Date: 10.05.15
 * Time: 22:38
 */

class ApiController extends Controller{

	public $defaultAction = 'index';

	public function actionGetgrouplist(){
		$list = CHtml::listData(Group::model()->findAll(), 'id', 'name', '');
		$results = array();
		foreach($list as $id => $name)
			$results[] = [
				'id' => $id,
				'name' => $name
			];
		$json = json_encode($results);
		echo $json;
	}

	public function actionRegister(){
		$error = false;

		if(Yii::app()->request->isPostRequest){
			$name = Yii::app()->request->getPost('userName');
			$group_id = Yii::app()->request->getPost('groupId');
			$registration_key = Yii::app()->request->getPost('registrationId');

			$user = User::model()->findByAttributes([
				'name' => $name,
				'group_id' => $group_id
			]);
			if(!$user){
				$user = new User;
				$user->name = $name;
				$user->group_id = $group_id;
				$user->reg_id = $registration_key;
				try{
					$error = $user->save();
				}
				catch(CDbException $ex){
					$error = true;
				}
			} else {
				if($user->reg_id != $registration_key){
					$user->reg_id = $registration_key;
					$error = $user->save();
				}
			}
		}
		echo json_encode(!$error);
	}

	public function actionAll($groupId){
//		$results = [
//			'monday' => [
//				'first' => [
//					'lesson' => 'subject->name',
//					'teacher_name' => 'teacher->name',
//					'room' => 'room->name',
//					'type' => 'type',
//				],
//				'second' => [
//					'lesson' => 'subject->name',
//					'teacher_name' => 'teacher->name',
//					'room' => 'room->name',
//					'type' => 'type',
//				]
//			]
//		];
		$days = [];
		foreach(Lesson::getDayList() as $day_key => $day_name){
			$times = [];
			foreach(Lesson::getTimeList() as $time_key => $time_name){
				$lesson = Lesson::model()->findByAttributes([
					'group_id' => $groupId,
					'time' => $time_key,
					'day' => $day_key
				]);
				if($lesson)
					$times[ $time_name ] = [
						'lesson' => $lesson->subject->name,
						'teacherName' => $lesson->teacher->name,
						'room' => $lesson->room->name,
						'type' => Lesson::getTypeList()[$lesson->type],
					];
				else
					$times[ $time_name ] = [
						'lesson' => 'empty',
						'teacherName' => 'empty',
						'room' => 'empty',
						'type' => 'empty',
					];
			}
			$days[ $day_name ] = $times;
		}
		$result = json_encode($days);
		echo $result;
	}
}