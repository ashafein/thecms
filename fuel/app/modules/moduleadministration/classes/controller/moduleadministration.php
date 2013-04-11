<?php

namespace ModuleAdministration;

class Controller_Moduleadministration extends \Controller_Administration {
    public function before()
    {
        parent::before();
        \Lang::load('general', 'moduleadm');
    }

	function action_index() {

        $modules = \Model_Module::find('all');
        $this->template->content = \View::forge('moduleadministration', array('modules' => $modules), true);

	}
	

    function action_modules_save_state($strID = null, $strState = null) {
        $module = \Model_Module::find($strID);
        if($strState === 'true') {
            $module->enable = 1;
            } else {
                $module->enable = 0;
            }
        $module->save();
    }

}

?>
