<?php
/**
 * Description of home
 *
 * @author juise_man
 */
class Controller_Home extends Controller_Application {
	
	public $template = 'templates/default/default';
	public static $theme = 'default';
			
	function action_index() {
		Fuel\Core\Response::redirect('home/view/main');
	}
	
	function action_view($page_alias = null) {
		Profiler::mark('start exex');
		if(isset($page_alias) and $page = Model_Page::query()->where('alias', '=', $page_alias)->get_one()) {
			$this->template->title = $page->name;
			Profiler::mark('start render');
			$contents = $this->render_page($page, $page->blocks);
			Profiler::mark('finish render');
			foreach ($contents as $region => $kontent) {
				$this->template->set($region, $kontent, false);
			}
		} else {
			Fuel\Core\Response::redirect('home/404');
		}
		
	}
	
	function action_404() {
		$this->template->content = "NOT Found";
	}
	
}

?>
