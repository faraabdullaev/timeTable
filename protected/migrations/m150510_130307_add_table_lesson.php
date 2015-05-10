<?php

class m150510_130307_add_table_lesson extends CDbMigration
{
	public function up()
	{
		$this->createTable(
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

	public function down()
	{
		$this->dropTable('{{lesson}}');
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