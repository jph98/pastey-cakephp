<?php
class HomeController extends AppController {

	var $helpers = Array('Html');

	/**
	 * Constructor
	 */
	function __construct() {

	    parent::__construct();

	}

	/**
	 * Display index for site
	 */
	function index() {

		Configure::write('debug', '0');

		$this->render();
		exit;

	}


}

?>
