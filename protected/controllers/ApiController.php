<?php
/**
 * Created by PhpStorm.
 * User: farrukh
 * Date: 10.05.15
 * Time: 22:38
 */

class ApiController extends Controller{

	const GOOGLE_API_KEY = 'AIzaSyAuf7Z3iKy-yQDpcJsPkwIZKcWIGv4cMjs';

	public $defaultAction = 'index';

	public function actionIndex(){

		$url = 'https://android.googleapis.com/gcm/send';
		$fields = array(
			'registration_ids' => 1,
			'data' => 'asdsa',
		);

		$headers = array(
			'Authorization: key=' . self::GOOGLE_API_KEY,
			'Content-Type: application/json'
		);
		// Open connection
		$ch = curl_init();

		// Set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Disabling SSL Certificate support temporarly
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


}