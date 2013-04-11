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
        if(($module = \Model_Module::find($strID)) && (($strID) != null)) {

            if(($strState === 'true') && ($strState != null)) {
                $module->enable = 1;
                } elseif(($strState === 'false') && ($strState != null)) {
                    $module->enable = 0;
                } else {
                return false;
            }

            if($module->save()) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

}

?>
