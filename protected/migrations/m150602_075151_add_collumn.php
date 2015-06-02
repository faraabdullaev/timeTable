<?php

class m150602_075151_add_collumn extends CDbMigration
{
	public function up()
	{
		$this->addColumn(
			'{{lesson}}',
			'isFlasher',
			'integer'
		);
	}

	public function down(){
		$this->dropColumn(
			'{{lesson}}',
			'isFlasher'
		);
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}