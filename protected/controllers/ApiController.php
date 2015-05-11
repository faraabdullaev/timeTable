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
			'registration_ids' => array(1),
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

		// Close connection
		curl_close($ch);
		echo $result;
	}

	public function actionGetgrouplist(){
		$list = CHtml::listData(Group::model()->findAll(), 'id', 'name', '');
		$json = json_encode($list);
		echo $json;
	}

	public function actionSetCollumn(){
		$db = Yii::app()->db->createCommand();
		$db->addColumn('{{user}}', 'reg_id', 'TEXT NULL');
	}

}