<?php

class TestPage extends Page {

	public function __construct($id, $name, $template) {
		$this->content = 'It works!';
		parent::__construct($id, $name, $template);
	}

}

?>