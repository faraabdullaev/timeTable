<?php
/**
 * Created by PhpStorm.
 * User: farrukh
 * Date: 18.05.15
 * Time: 20:15
 */

class Helper {

	const GOOGLE_API_KEY = 'AIzaSyCpUX-DgBF10get2YWdgRVQLKjLExgREaA';

	public static function PushNotification($students, $message){

		$url = 'https://android.googleapis.com/gcm/send';
		$fields = array(
			'registration_ids' => $students,
			'data' => array('msg'=>$message)
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
//		echo $result;
	}
}