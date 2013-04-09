<?php

namespace Test;

class Controller_Test extends \Controller_Administration {
	function action_index() {
		if( ! \Request::is_hmvc()) {
            $this->template->content = \View::forge('test');
        } else {
            return \Response::forge(\View::forge('test'));
        }
	}
	
	function action_view() {
		if( ! \Request::is_hmvc()) {
            $this->template->content = \View::forge('test');
        } else {
            return \Response::forge(\View::forge('test'));
        }
	}
	
	function action_zte() {
		if( ! \Request::is_hmvc()) {
            $this->template->content = \View::forge('test');
        } else {
            return \Response::forge(\View::forge('test'));
        }
	}
}

?>
