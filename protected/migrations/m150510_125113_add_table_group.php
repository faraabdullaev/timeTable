<?php

class m150510_125113_add_table_group extends CDbMigration
{
	public function up()
	{
		$this->createTable(
			'{{group}}',
			array(
				'id' => 'pk',
				'name' => 'varchar(255) NOT NULL'
			)
		);
	}

	public function down()
	{
		$this->dropTable('{{group}}');
	}

}