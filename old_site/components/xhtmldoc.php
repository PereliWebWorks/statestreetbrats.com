<?php
/*	MythicCMS v0.1, created by Corey Caswick
 *	Copyright © 2009 Mythic Web Design <http://www.mythicwebdesign.com/>
 */

class XHTMLDocument {
	// DB info
	var $PageID;
	var $ParentPageID;
	var $URI;
	var $DateModified;
	var $DateCreated;
	var $Title;
	var $Content;
	var $Theme;
	var $InMenu;
	var $MenuPosition;
	// Document sections, roughly in order of occurance
	var $HTTPHeaders = array();
	var $DocType;
	var $DocHead;
	var $Headers = array();
	var $Keywords;
	var $Description;
	var $Author;
	var $Titles = array();
	var $MenuItems;
	var $DocFoot;

	public function __construct() {
		// Load Constants
		$this->Titles[0] = _SITE_TITLE;
		$this->Keywords = _SITE_KEYWORDS;
		$this->Description = _SITE_DESC;
		$this->Author = _SITE_AUTHOR;
		$this->Theme = _SITE_THEME;
		// Default headers
		$this->addHeader(_SITE_HEADERS);
	}

	// Get basic data

	public function getKeywords() {
		return $this->Keywords;
	}

	public function getDescription() {
		return $this->Description;
	}

	public function getAuthor() {
		return $this->Author;
	}

	public function getHeaders() {
		$result = '';
		foreach ($this->Headers as $header) {
			$result .= $header ."\n";
		}
		return $result;
	}

	public function sendHTTPHeaders() {
		foreach ($this->HTTPHeaders as $httpheader) {
			header($httpheader);
		}
	}

	public function getTitles() {
		$first = 1;
		$result = '';
		foreach ($this->Titles as $title) {
			if ($first) $first = 0;
			else $result .= _SITE_TITLE_SEP;
			$result .= $title;
		}
		return $result;
	}

	// Set parameters

	public function addHeader($header) {
		$this->Headers[] = $header;
	}

	public function addHTTPHeader($httpheader) {
		$this->HTTPHeaders[] = $httpheader;
	}

	public function addTitle($title) {
		$this->Titles[] = $title;
	}

	public function setContent($content) {
		$this->Content = $content;
	}

	public function appendContent($content) {
		$this->Content .= $content;
	}
	
	public function setMenuItems($items) {
		$this->MenuItems = $items;
	}

	// Page making

	public function loadFromDB($uri) {
		// Prep variables
		global $db;
		if (empty($uri)) $uri = 'home';
		$db->select('pages', '*', "WHERE URI='$uri'");
		$page = $db->getRow();
		if ($page['URI'] == $uri) {
			foreach ($page as $key => $value) {
				$this->{$key} = $value;
			}
			$this->addTitle($page['Title']);
			$this->MenuItems = $this->loadMenuItems();
			if ( empty($this->Theme) ) $this->Theme = _SITE_THEME;
		}
		else {
			$this->makeErrorPage();
		}
	}

	public function loadMenuItems() {
		global $db;
		if ( $result = $db->select('pages', 'URI, Title', 'WHERE InMenu = \'1\' ORDER BY MenuPosition ASC') ) {
			while ( $link = $db->getRow($result) ) {
				// Set variables for easy templating
				$var_array['URI'] = $link['URI'];
				$var_array['TITLE'] = $link['Title'];
				$menu_items .= get_include_contents(_THEMEDIR . $this->Theme .'menu_item.php', $var_array);
			}
			$this->setMenuItems($menu_items);
		}
	}

	public function makeErrorPage() {
		$this->addHTTPHeader('HTTP/1.1 404 Not Found');
		$this->addTitle('Error 404: Page Not Found');
		$this->setContent('
<h2>Error 404: Page Not Found</h2>

<p>You attempted to reach:
<br /><em>http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '</em></p>

<p>Sorry, no such page exists on <a href="'. _ROOTDIR .'">' . $this->getSiteTitle() . '</a>. Please try again, or contact the owner at <a href="mailto:' . _SITE_EMAIL . '">' . _SITE_EMAIL . '</a> for assistance.</p>
		');
	}

	function getDocHead() {
		return '<?php echo \'<?xml version="1.0" encoding="UTF-8"?>\'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>'. $this->getTitles() .'</title>
	<meta name="keywords" content="'. $this->getKeywords() .'" />
	<meta name="description" content="'. $this->getDescription() .'" />
	<meta name="author" content="'. $this->getAuthor() .'" />
	<link rel="stylesheet" href="'. _ROOTDIR . _THEMEDIR . $this->Theme .'main.css" type="text/css" />
	<!--[if IE]><link rel="stylesheet" type="text/css" media="screen" href="'. _ROOTDIR . _THEMEDIR . $this->Theme .'ie.css" /><![endif]-->
	'. $this->getHeaders() .'
</head>
<body>';
	}

	public function getSiteTitle() {
		return $this->Titles[0];
	}

	public function getThemeHead() {
		$var_array['MENU_ITEMS'] = $this->getMenuItems();
		return get_include_contents(_THEMEDIR . $this->Theme .'head.php', $var_array);
	}

	public function getMenuItems() {
		return $this->MenuItems;
	}

	public function getContent() {
		return $this->Content;
	}

	public function getThemeFoot() {
		return get_include_contents(_THEMEDIR . $this->Theme .'foot.php');
	}

	public function getDocFoot() {
		return '</body></html>';
	}

	public function getFullPage() {
		$result = $this->getDocHead();
		$result .= $this->getThemeHead();
		$result .= $this->getContent();
		$result .= $this->getThemeFoot();
		$result .= $this->getDocFoot();
		return $result;
	}

	public function display() {
		$this->sendHTTPHeaders();
		eval('?>'. $this->getFullPage());
	}
}

class Page extends XHTMLDocument {
// Quick load from DB
	public function __construct($uri) {
		parent::__construct();
		$this->loadFromDB($uri);
		$this->loadMenuItems();
	}
}

?>