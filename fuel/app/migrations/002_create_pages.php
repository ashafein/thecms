<?php

namespace Fuel\Migrations;

class Create_pages
{
	public function up()
	{
		\DBUtil::create_table('pages', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'alias' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
		\DBUtil::create_index('pages', array('alias'), 'alias', 'UNIQUE');
		\Model_Page::forge(array('name' => 'Главная', 'alias' => 'main'))->save();
	}

	public function down()
	{
		\DBUtil::drop_table('pages');
	}
}