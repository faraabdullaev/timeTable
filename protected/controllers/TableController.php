<?php

class TableController extends Controller{

	public function actionAdmin(){
		$db = Yii::app()->db->createCommand();
		$db->createTable(
			'{{group}}',
			array(
				'id' => 'pk',
				'name' => 'varchar(255) NOT NULL'
			)
		);

		$db->createTable(
			'{{user}}',
			array(
				'id' => 'pk',
				'name' => 'varchar(255) NOT NULL',
				'group_id' => 'integer'
			)
		);
		$db->createTable(
			'{{teacher}}',
			array(
				'id' => 'pk',
				'name' => 'varchar(255) NOT NULL'
			)
		);
		$db->createTable(
			'{{subject}}',
			array(
				'id' => 'pk',
				'name' => 'varchar(255) NOT NULL'
			)
		);
		$db->createTable(
			'{{room}}',
			array(
				'id' => 'pk',
				'name' => 'varchar(255) NOT NULL'
			)
		);
		$db->createTable(
			'{{lesson}}',
			array(
				'id' => 'pk',
				'subject_id' => 'integer',
				'group_id' => 'integer',
				'room_id' => 'integer',
				'teacher_id' => 'integer',
				'time' => 'integer',
				'day' => 'integer',
				'type' => 'integer',
			)
		);
	}

}