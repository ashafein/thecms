<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of 001_module_info
 *
 * @author juise_man
 */
namespace Fuel\Migrations;

class Module_Info {
	public function up() {
		$module = \Model_Module::forge(array(
			'name' => 'test',
			'description' => "test module",
			'namespace' => 'test',
			'enable' => 1,
			'css' => '',
			'js' => 'hui',
			'version' => '1.0',
		));
		
		$module->blocks[] = \Model_Block::forge(array(
			'name' => 'first block',
			'description' => 'first test block',
			'controller' => 'test',
			'action' => 'index',
			'params' => 'test',
			'region' => 'header',
		));
		
		$module->blocks[] = \Model_Block::forge(array(
			'name' => 'second block',
			'description' => 'first test block',
			'controller' => 'test',
			'action' => 'view',
			'params' => 'test',
			'region' => 'content',
		));
		
		$module->blocks[] = \Model_Block::forge(array(
			'name' => 'seard block',
			'description' => 'first test block',
			'controller' => 'test',
			'action' => 'view',
			'params' => 'test',
			'region' => 'content',
		));
		
		$module->blocks[] = \Model_Block::forge(array(
			'name' => 'forth block',
			'description' => 'first test block',
			'controller' => 'test',
			'action' => 'zte',
			'params' => 'test',
			'region' => 'footer',
		));
		
		$module->save();
		
	}
	
	public function down() {
		
	}
}

?>
