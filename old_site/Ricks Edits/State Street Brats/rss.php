<?php

require 'core.php';
global $db;

// Get data
if ( $articlelist = $db->select('posts', '*', 'ORDER BY `DateCreated` DESC LIMIT 10') ) {
	header('Content-type: application/rss+xml');
	echo '<?xml version="1.0"?>
<rss version="2.0">
	<channel>
		<title>'. _SITE_TITLE .'</title>
		<link>http://'. $_SERVER['SERVER_NAME'] .'/</link>
		<description>'. _SITE_DESC .'</description>
		';
		while ( $article = $db->getRow($articlelist) ) {
			echo '<item>
			<title>'. $article['Title'] .'</title>
			<link>http://'. $_SERVER['SERVER_NAME'] .'/</link>
			<description>'. preg_replace("/&#?[a-z0-9]{2,8};/i","", strip_tags(substr($article['Content'], 0, 500))) .'...</description>
		</item>';
	}
	echo '
	</channel>
</rss>';
}
?>