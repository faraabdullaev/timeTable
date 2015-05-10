<?php

return array(
	'components'=>array(
		'db'=>array(
			'connectionString' => 'pgsql:'
				. 'host=localhost;'
				. 'port=5432;'
				. 'dbname=timetable',

//			'emulatePrepare' => true,
			'username' => 'postgres',
			'password' => '123456',
			'charset' => 'utf8',
			'tablePrefix' => 'tt_',
		),
	)
);