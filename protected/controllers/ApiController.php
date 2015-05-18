<?php
/**
 * Created by PhpStorm.
 * User: farrukh
 * Date: 10.05.15
 * Time: 22:38
 */

class ApiController extends Controller{

	const GOOGLE_API_KEY = 'AIzaSyCpUX-DgBF10get2YWdgRVQLKjLExgREaA';

	public $defaultAction = 'index';

	public function actionIndex(){

		$url = 'https://android.googleapis.com/gcm/send';
		$fields = array(
			'registration_ids' => array(
				'APA91bF5SNqD85fWI0hBl9G9sIOWQDoPm53dWt-Cr2B1WdnQ-tdmwyrmAW2H9UtX6Zzcjzixmj0LRhtdt_buHEDlKuuoiz4qb6LBPZWlZFDq_Wjh9gjybQZ-zXKxNzsKkTEpIAltKkkiFaMw48GWPEwTVuKSCiaD2Q'
			),
			'data' => array('msg'=>'eshak')
		);

		$headers = array(
			'Authorization: key=' . self::GOOGLE_API_KEY,
			'Content-Type: application/json'
		);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}

		curl_close($ch);
		echo $result;
	}

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

	public function actionAll($id){
//		if(Yii::app()->request->isPostRequest){
			$lessons = Lesson::model()->findAllByAttributes([
				'id' => $id
			]);

//		}
	}
}