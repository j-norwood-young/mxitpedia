<?php
	/**
	 * Home class
	 * 
	 * @extends Controller
	 */
	class Home extends CI_Controller {

		/**
		 * __construct function.
		 * 
		 * @access public
		 * @return void
		 */
		public function __construct() {
			parent::__construct();
		}
		
		public function index() {
			redirect("/query/Main Page");
		}
	}

/* End of file home.php */
/* Location: ./system/application/controllers/ */