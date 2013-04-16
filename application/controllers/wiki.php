<?php
	/**
	 * Wiki class
	 * 
	 * @extends Controller
	 */
	class Wiki extends CI_Controller {

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
			$query = $this->input->get_post("term");
			
			if (empty($query)) {
				$query=$this->uri->segment(2);
			}
			
			$s = file_get_contents("http://en.m.wikipedia.com/wiki/".$query);
			$s = wiki_clean($s);
			print $s;
			return true;
			
			//print file_get_contents("http://en.m.wikipedia.org/wiki/$query");
			$search = $this->input->get_post("search");
			if (!empty($search)) {
				redirect("/wiki/$search");
			}
			
			$url = $this->config->item('wiki_api')."?format=json&action=query&prop=revisions&rvprop=content&rvparse&redirects&titles=".$query;
			$data = json_decode(file_get_contents($url));
			//print_r($data);
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