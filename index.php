<?php
ob_start();
//start session
session_start();
//config
require 'config.php';
//require modules
require 'modules/class.Page.php';
//require pages
require 'pages/class.TestPage.php';
//check debug
if (DEBUG) {
	error_reporting(E_ALL ^ E_NOTICE);
} else {
	error_reporting(0);
}
//start display logic
if (FORCE_URL && $_SERVER[HTTP_HOST] !== HOME_URL) {
	header("Location: " . HOME_URL . $_SERVER[REQUEST_URI]);
	ob_end_flush();
	exit();
}
$page;
$request = (isset($_GET['p']) ? $_GET['p'] : $_POST['p']);
if (!isset($_GET['p']) && !isset($_POST['p'])) {
	$request = INDEX_PAGE;
}
switch ($request) {
	case 'home':
		$page = new TestPage('home', 'Test', 'default');
		break;
	default:
		http_response_code(404);
		ob_end_flush();
		exit();
}
$page->displayPage();
ob_end_flush();
?>
