<?php

namespace Fuel\Migrations;

class Create_blocks
{
	public function up()
	{
		\DBUtil::create_table('blocks', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'module_id' => array('constraint' => 11, 'type' => 'int'),
			'controller' => array('constraint' => 255, 'type' => 'varchar'),
			'action' => array('constraint' => 255, 'type' => 'varchar'),
			'params' => array('constraint' => 255, 'type' => 'varchar'),
			'region' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'included_page' => array('type' => 'text', 'null' => true),
			'excluded_page' => array('type' => 'text', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('blocks');
	}
}