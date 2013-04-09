<?php

namespace Fuel\Migrations;

class Create_module
{
	public function up()
	{
		\DBUtil::create_table('modules', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'namespace' => array('constraint' => 255, 'type' => 'varchar'),
			'enable' => array('type' => 'bit', 'default' => false),
			'css' => array('type' => 'text', 'null' => true),
			'js' => array('type' => 'text', 'null' => true),
			'version' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('modules');
	}
}