<?php
/*	MythicCMS v0.1, created by Corey Caswick
 *	Copyright © 2009 Mythic Web Design <http://www.mythicwebdesign.com/>
 */

require_once 'core.php';

// Parse the URI requested to get the path/filename with no leading or trailing slashes.
// This will be the PageURI.
parse_str($_SERVER['QUERY_STRING']);	// Get query string
$request_array = explode( '/', trim( urldecode( $_GET['uri'] ), '/\\') );
$uri = $request_array['0'];

// Display the page requested
$page = new Page($uri);
$page->display();
?>