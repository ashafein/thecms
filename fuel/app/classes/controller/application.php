<?php

class Controller_Application extends Controller_Template {
	public $template = '';
	public static $theme = '';
	protected $auth;
	public static $current_page = "";
		
	public function before() {
		parent::before();
		$this->template->title = Config::get('settings.site_name');
		$this->auth = Auth::instance();
	}
	
	protected function render_page($page = null, $blocks = null) {
		$regions = array();
		if(isset($page) and isset($blocks)) {
			foreach ($blocks as $block) {
				if($block->module->enable === '1' and Fuel\Core\Module::loaded($block->module->namespace)) {
					if(isset($regions[$block->region])) {
						$regions[$block->region] .= (Request::forge("{$block->module->namespace}/{$block->controller}/{$block->action}/{$block->params}", false)->execute());
					} else {
						$regions[$block->region] = (Request::forge("{$block->module->namespace}/{$block->controller}/{$block->action}/{$block->params}", false)->execute());
					}
				}
			}	
		}
		return $regions;
	}

	protected function set_page_title($page_title = null) {
		$site_name = Config::get('settings.site_name');
		$this->template->title = $page_title ? "{$page_title} - {$site_name}" : $site_name;
	}

	protected function register_css($stylesheets, $attrs = array()) {
		Asset::css($stylesheets, $attrs, 'stylesheets');
	}

	protected function register_js($javascripts, $attrs = array()) {
		Asset::js($javascripts, $attrs, 'javascripts');
	}

	protected function SetNotice($notiseType, $notiseText) {
		Session::set_flash('notice_type', $notiseType);
		Session::set_flash('notice', $notiseText);
	}
}