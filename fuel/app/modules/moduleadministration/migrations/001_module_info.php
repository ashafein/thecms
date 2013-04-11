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
			'name' => 'Module Handing',
			'description' => 'Applies management to all modules in the system, can not be deleted',
			'namespace' => 'ModuleHanding',
			'enable' => 1,
			'css' => '',
			'js' => '',
			'version' => '1.0',
		));
		

		$module->save();
		
	}
	
	public function down() {
		
	}
}

?>
