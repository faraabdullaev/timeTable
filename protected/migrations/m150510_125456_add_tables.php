<?php

class m150510_125456_add_tables extends CDbMigration
{
	public function up()
	{
		$this->createTable(
			'{{user}}',
			array(
				'id' => 'pk',
				'name' => 'varchar(255) NOT NULL',
				'group_id' => 'integer'
			)
		);
		$this->createTable(
			'{{teacher}}',
			array(
				'id' => 'pk',
				'name' => 'varchar(255) NOT NULL'
			)
		);
		$this->createTable(
			'{{subject}}',
			array(
				'id' => 'pk',
				'name' => 'varchar(255) NOT NULL'
			)
		);
		$this->createTable(
			'{{room}}',
			array(
				'id' => 'pk',
				'name' => 'varchar(255) NOT NULL'
			)
		);
	}

	public function down()
	{
		$this->dropTable('{{user}}');
		$this->dropTable('{{teacher}}');
		$this->dropTable('{{subject}}');
		$this->dropTable('{{room}}');
	}

}