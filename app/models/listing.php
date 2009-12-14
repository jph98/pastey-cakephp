<?php
class Listing extends AppModel {

	var $name = 'Listing';

	var $validate = array(
			'sourcecode' => VALID_NOT_EMPTY,
			'title' => VALID_NOT_EMPTY
	);

}
?>
