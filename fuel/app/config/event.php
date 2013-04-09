<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
return array(
    'fuelphp' => array(
        'app_created' => function()
        {
			try {
				$modules = Cache::get("modules");
			} catch (\CacheNotFoundException $e) {
				$modules = Model_Module::find('all');
				Cache::set('modules', $modules, 3600 * 3);
			}
			foreach($modules as $module) {
				if(Fuel\Core\Module::exists($module->namespace)) {
					Fuel\Core\Module::load($module->namespace);
				}
			}
        }
	)
);
?>
