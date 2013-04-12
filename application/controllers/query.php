<?php
	/**
	 * Query class
	 * 
	 * @extends Controller
	 */
	class Query extends CI_Controller {

		/**
		 * __construct function.
		 * 
		 * @access public
		 * @return void
		 */
		public function __construct() {
			parent::__construct();
			ini_set('user_agent', $this->config->item('wiki_ua'));
		}
		
		public function _remap() {
			$query=$this->uri->segment(2);
			$url = $this->config->item('wiki_api')."?format=json&action=query&prop=revisions&rvprop=content&rvparse&titles=".$query;
			$data = json_decode(file_get_contents($url));
			$pages = $data->query->pages;
			foreach($pages as $page) {
				$content = $page->revisions[0]->{"*"};
				$page->content = $content;
				$this->load->view("page", $page);
			}
		}
	}

/* End of file query.php */
/* Location: ./system/application/controllers/ */