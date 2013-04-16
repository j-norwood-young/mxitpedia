<?php
	/**
	 * w class
	 * 
	 * @extends Controller
	 */
	class W extends CI_Controller {

		/**
		 * __construct function.
		 * 
		 * @access public
		 * @return void
		 */
		public function __construct() {
			parent::__construct();
		}
		
		public function _remap() {			
			$s = file_get_contents("http://m.wikipedia.com".$_SERVER["REQUEST_URI"]);
			$s = wiki_clean($s);
			print $s;
		}
	}

/* End of file .php */
/* Location: ./system/application/controllers/ */