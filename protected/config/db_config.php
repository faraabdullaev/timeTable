<?php

return array(
	'components'=>array(
		'db'=>array(
			'connectionString' => 'pgsql:host=localhost;port=5432;dbname=timetable',
//			'connectionString' => 'mysql:host=localhost:5432;dbname=timeTable',
			'emulatePrepare' => true,
			'username' => 'postgres',
			'password' => '123456',
			'charset' => 'utf8',
			'tablePrefix' => 'tt_',
		),
	)
);