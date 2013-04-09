<?php

namespace Fuel\Migrations;

class Create_block_on_page
{
	public function up()
	{
		\DBUtil::create_table('block_on_page', array(
			'page_id' => array('constraint' => 11, 'type' => 'int'),
			'block_id' => array('constraint' => 11, 'type' => 'int'),

		), array('page_id', 'block_id'));
	}

	public function down()
	{
		\DBUtil::drop_table('block_on_page');
	}
}