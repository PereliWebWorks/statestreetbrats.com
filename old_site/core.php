<?php
/*	MythicCMS v0.1, reated by Corey Caswick
 *	Copyright © 2009 Mythic Web Design <http://www.mythicwebdesign.com/>
 */

// DEBUGGING
if ($_GET['debug']) $debug = 1;
else $debug = 0;

if ($debug) error_reporting(E_STRICT | E_ALL ^ E_NOTICE);
else error_reporting(E_ERROR | E_CORE_ERROR);	// Live
ini_set('display_errors', 'stdout');

// Set constants in settings.php unless it absolutely has to be here
define('_COMPONENTDIR', 'components/');
define('_MODULEDIR', 'modules/');
define('_MODULEEXT', '.mod.php');
define('_ADMINEXT', '.admin.php');

// Include components
require_once _COMPONENTDIR . 'settings.php';
foreach (glob(_COMPONENTDIR . '*.php') as $component) {
    require_once $component;
}

// Ready database
$db = new Database;

// Include CMS modules
foreach (glob(_MODULEDIR . '*' . _MODULEEXT) as $module) {
    include $module;
}

// Core Functions

function print_page($id='index') { // DEPRECATED
	global $db;
	// Set variables
	if (empty($id)) $id = 'index';
	// Perform functions
	$db->select('pages', '*, UNIX_TIMESTAMP(DateModified) AS DateModified', "WHERE PageID='$id'");
	if ( $db->getResult() ) {
		$page = $db->getRow();
		if ($page['PageID'] == $id) {
			print_head($page, $theme);
			eval('?>' . $page['Content']);
			print_foot($page['DateModified']);
		}
		else {
			print_head('Error 404: Page Not Found');
			echo '<h2>Error 404: Page Not Found</h2>'
				. '<p>You attempted to reach:'
				, '<br /><em>http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '</em></p>'
				. '<p>Sorry, no such page exists on <a href="/">' . _SITE_TITLE . '</a>. Please try again, or contact the owner at <a href="mailto:' . _SITE_EMAIL . '">' . _SITE_EMAIL . '</a> for assistance.</p>'
			;
			print_foot();
		}
	}
	else echo 'Unable to display page! ' . $db->errno . ': ' . $db->error;
}

function print_head($page, $theme='default') {	// DEPRECATED
// $page must be either an array filled from the page's table OR a string containing the page title
	if (is_string($page)) $page_title = $page;
	else $page_title = $page['Title'];
	$theme = $theme . '/';
	// Standard XHTML 1.0 header block
	echo '<?xml version="1.0" encoding="UTF-8"?>';
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php
	echo _SITE_TITLE . ' - ' . $page_title;
	?>
	</title>
	<meta name="keywords" content="<?=_SITE_KEYWORDS?>" />
	<meta name="description" content="<?=_SITE_DESC?>" />
	<meta name="author" content=" Mythic Web Design - http://www.mythicwebdesign.com/ " />
	<script src="<?=_ROOTDIR . _SCRIPTDIR?>jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="<?=_ROOTDIR . _SCRIPTDIR?>ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="<?=_ROOTDIR ?>scripts/main.js" type="text/javascript"></script>
	<script type="text/javascript">
	window.onload = function()	{
		CKEDITOR.replace( 'Page[Content]' );
	};
	</script>
	<style type="text/css">
html, body {
	padding:0;
	border:0;
	margin:0;
	height: 100%;
	width: 100%;
	color: #000;
	background: #fff;
}

#mythic-login {
	position: absolute;
	top: 25%;
	left: 50%;
	padding-left: 15px;
	padding-right: 15px;
	margin-left: -125px;
	width: 220px;
	height: 170px;
	background-color: #a3bfd9;
	border-width: 1px;
	border-style: solid;
	border-color: #566573;
	border-radius: 15px;
	-moz-border-radius: 15px;
	-webkit-border-radius: 15px;
}

#mythic-login th {
	text-align: left;
}
#mythic-login td {
	text-align: right;
}
	</style>
</head>
<body>
	<?php
	// Site/theme headers

}

function print_menu() {
	global $db;
	if ( $result = $db->select('pages', 'URI, Title', 'WHERE InMenu = \'1\' ORDER BY MenuPosition ASC') ) {
		while ( $link = $db->getRow($result) ) {
			echo '
<a href="'. htmlentities($link['URI']) . '" >'. htmlentities($link['Title']) .'</a>
			';
		}
	}
}

function print_foot($date=0) {	// DEPRECATED
	if ($date) $year = date('Y', $date);
	else $year = '2010';
	echo '
</body>
</html>
	';
}

function print_login($err=0) {	// NEEDS REPLACEMENT
	print_head('Login');
	?>
<div id="mythic-login">
<h2 style="text-align: center">Login</h2>

<?php if ($err) echo '<p class="error">Login information incorrect. Please try again.</p>'; ?>
	
<form action="<?php echo $PHP_SELF ?>" method="post">
<table style="border: 0; width: 100%;">
	<tr>
		<th>User:</th>
		<td><input type="text" name="user" /></td>
	</tr>
	<tr>
		<th>Pass:</th>
		<td><input type="password" name="pass" /></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="login" value="Login" /></td>
	</tr>
</table>
</form>
</div>
	<?php
	print_foot();
	exit;
}

function print_logout() {	// NEEDS REPLACEMENT
	print_head('You have logged out.');
	echo '<h2>You have logged out.</h2>';
	?>
<p>Go to <a href="/">Home</a>.
<br />Return to <a href="/admin">Content Management</a>.
</p>
	<?php
	print_foot();
	exit;
}

function print_opt($options, $selection) {
	foreach ($options as $name => $value) {
		echo '<option value="' . $value . '"';
		if ($value == $selection) echo ' selected="selected"';
		echo '>' . $name . '</option>';
	}
}

function print_check($name, $value, $selection) {
	echo '<input type="checkbox" name="' . $name . '" id="' . $name . '" value="' . $value . '"';
	if ($value == $selection) echo ' checked="checked"';
	echo ' />';
}

function print_cat_select($form, $selection=0, $size=0) {
	global $db;
	$db->select('categories', '*');
	if ( $db->getResult() ) {
		echo '<select name="'. $form .'[CategoryID]"';
		if ($size) echo ' size="' . $size . '"';
		echo '>';
		if (!$selection) $first = TRUE;
		while ( $cat = $db->getRow() ) {
			echo '		<option value="' . htmlspecialchars($cat['CategoryID']) . '"';
			if ($cat['CategoryID'] == $selection) echo ' selected="selected"';
			elseif ($first) {
				echo ' selected="selected"';
				$first = FALSE;
			}
			echo '>';
			echo htmlspecialchars($cat['Title']) . '</option>';
		}
		echo '</select>';
		return TRUE;
	}
	else return FALSE;
}

function getCatName($CategoryID) {
	global $db;
	if ( $result = $db->select('categories', '`Title`', 'WHERE `CategoryID` = \''. $CategoryID .'\'') ) {
		if ($record = $db->getRow($result) ) {
			return $record['Title'];
		}
		else return FALSE;
	}
	else return FALSE;
}

function check_auth() {
	session_start();
	if ( $_SESSION['active'] ) {	// Already logged in, nothing special needs to be done
		if ( array_key_exists('logout', $_GET) ) {	// Unless trying to log out
			session_destroy();
			print_logout();
		}
	}
	elseif ( array_key_exists('login', $_POST) ) {
		if ( ($_POST['user'] == _ADMIN_USER) && ($_POST['pass'] == _ADMIN_PASS) ) {
			$debug['login_success'] = TRUE;
			$_SESSION['active'] = 1;
		}
		else {
			$debug['login_success'] = FALSE;
			print_login(1);
		}
	}
	else {
		print_login();
	}
}

function print_status($status, $msg=0) {
	global $db;
	if ($status) {
		$class = 'success';
		$result = 'Update Successful!';
	}
	else {
		$class = 'error';
		$result = 'Update Failed! Error ' . $db->errno . ': ' . $db->error . '. Please try again. If this problem persists, please contact your administrator.';
	}
	echo '
<table class="'.$class.'">
	<tr>
		<td><img src="'. _ROOTDIR . _IMGDIR .'icon_'.$class.'.png" width="64" height="64" alt="[Icon]" /></td>
		<td>
		';
		if ($msg) echo $msg . ' ';
		echo $result . '
		</td>
	</tr>
</table>
	';
}

function getFooterType() {
	// Prep variables
	global $db;
	global $request_array;
	if ($request_array[0] == 'gallery') return 'gallery';
	else return 'regular';
}

function get_include_contents($filename, $var_array=0) {
	// Pass variables from array $var_array
	global $request_array;
	$var_array['request_array'] = $request_array;
	foreach ($var_array as $key => $val) {
		${$key} = $val;
	}
	// Get contents of include file $filename	
	if (is_file($filename)) {
		ob_start();
		include $filename;
		$contents = ob_get_contents();
		ob_end_clean();
		return $contents;
	}
	return false;
}

/***********************
 * NEW ADMIN FUNCTIONS *
 ***********************/

function getAdminPage($page=0) {
	global $request_array;
	// Determine admin page
	if (!$page) $page = $request_array[1];
	if (empty($page)) $page = 'pages';
	// Get file
	$admin_file = _MODULEDIR . $page .'.admin.php';
	require $admin_file;
}

function printAdminMenu() {
	global $request_array;
	echo '<div id="adminMenu">';
	foreach (glob(_MODULEDIR . '*' . _ADMINEXT) as $module) {
		$module = basename($module, _ADMINEXT);
		if ($module == $request_array[1]) $selected = ' class="selected"';
		else $selected = '';
		echo '<a href="/admin/'. $module .'"'. $selected .'>'. ucfirst($module) .'</a>';
	}
	echo '<a href="/admin?logout=1">Logout</a>';
	echo '</div>';
}

function procUpload($upload, $savepath) {
// $upload = PHP internal identifier for newly uploaded file
// $savepath = directory to save file into
	if ( $_FILES[$upload]['size'] ) { /* Handle File Upload */
		// Move temp file to permenent location
		$filepath = $savepath . $_FILES[$upload]['name']; 
		if (!is_dir($savepath)) mkdir($savepath);
		move_uploaded_file( $_FILES[$upload]['tmp_name'], $filepath );
		if ( file_exists($filepath) ) {
			$success = TRUE;
		}
		else {
			$success = FALSE;
		}
	}
	return $success;
}

function printPayPalButton($item) {
	?>

<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart" />
<input type="hidden" name="business" value="" />
<input type="hidden" name="lc" value="US" />
<input type="hidden" name="item_name" value="<?=$item['Title']?>" />
<input type="hidden" name="item_id" value="<?=$item['ImageID']?>" />
<input type="hidden" name="amount" value="<?=$item['Price']?>" />
<input type="hidden" name="currency_code" value="USD" />
<input type="hidden" name="button_subtype" value="products" />
<input type="hidden" name="no_shipping" value="2" />
<input type="hidden" name="add" value="1" />
<input type="hidden" name="bn" value="PP-ShopCartBF:btn_cart_LG.gif:NonHosted" />
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_cart_SM.gif" name="submit" alt="PayPal - The safer, easier way to pay online!" style="width: 96px; height: 21px: border: 0;" />
</form>

	<?php
}

function getNewestImageID($CategoryID) {
	global $db;
	$result = $db->select('images', '`ImageID`', "WHERE `CategoryID` = $CategoryID ORDER BY `DateModified` DESC LIMIT 0, 1");
	$row = $db->getRow($result);
	return $row['ImageID'];
}

?>