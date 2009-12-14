<?php

// Suppress warnings
error_reporting (E_ALL ^ E_WARNING);

class ListingsController extends AppController {

	var $helpers = Array('Html');

	var $uses = array('Listing', 'Language');

	/**
	 * Constructor
	 */
	function __construct() {

	    parent::__construct();

	}

	function setuplanguages() {

		 $this->set('languageslist',$this->Language->findAll());

		 $this->set('languageslist', $this->Language->generateList(null,
				                                           "priority, name ASC", null, "{n}.Language.id", 								                                                 "{n}.Language.name"));
	}



	/**
	 * Main index page
	 */
	function index() {

		Configure::write('debug', '3');

		$this->setuplanguages();

		$this->render();
		exit;

	}

	/**
	 * View listings
	 */
	function viewlistings($listing_id) {

		Configure::write('debug', '3');

		$this->set('categories',$this->Listing->findAll(null, null, "name ASC"));

		$this->render();
		exit;

	}


	/**
	 * View listing detail
	 */
	function viewlistingdetail($listing_id) {

		Configure::write('debug', '3');

		$this->set('listingdetail', $this->Listing->findById($listing_id));

		$this->render();
		exit;

	}

	/**
	 * Add listing
	 */
	function add() {

	    Configure::write('debug', '3');

		// Are we submitting?
   	    if (!empty($this->data)) {


		// Turn off cache queries
		$this->Listing->cacheQueries = false;

		// Save the values back to the database
		if ($listing = $this->Listing->save($this->data)) {

			$listing_id_inserted = $this->Listing->getLastInsertId();


			$this->Session->write('listingdetail', $listing);

			$this->redirect('/listings/viewlistingdetail/' . $listing_id_inserted);
			exit;
		}
	    }	

	    $this->setuplanguages();

	    $this->render('/');
	    exit;
	}

	/**
	 * Listings Administration
	 */
	function listingsadmin() {

		Configure::write('debug', '3');

		$this->set('listings', $this->Listing->findAll());

		$this->render();
		exit;

	}


}

?>
