<?php

class Page {

	private $id;
	private $name;
	protected $content;
	protected $template;
	protected $css;
	protected $alert;

	public function __construct($id, $name, $template) {
		$this->id = $id;
		$this->name = $name;
		$this->template = $template;
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function setContent($content) {
		$this->content = $content;
	}

	public function getContent() {
		return $this->content;
	}

	public function getCss() {
		return $this->css;
	}

	public function alert($level, $message) {
		$this->alert .= '<div class="alert alert-' . $level . '">' . $message . '</div>';
	}

	protected function displayHeader() {
		echo eval('?>' . file_get_contents('./html/' . $this->template . '/header.html'));
	}

	protected function runLogic() {
		
	}

	protected function displayContent() {
		echo $this->content;
	}

	protected function displayFooter() {
		echo eval('?>' . file_get_contents('./html/' . $this->template . '/footer.html'));
	}

	public function displayPage() {
		$this->runLogic();
		$this->displayHeader();
		$this->displayContent();
		$this->displayFooter();
	}

}

?>