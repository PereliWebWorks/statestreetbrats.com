<div id="theme-holder">
	<div id="theme-top">
		<h1 id="theme-top-logo"><a href="/" title="Return to State Street Brats Homepage"><img src="/themes/default/ssb-web-logo01.png" width="370" height="257" alt="State Street Brats" /></a></h1>
		<div id="theme-top-fill"></div>
		<img id="theme-top-tr" src="/themes/default/frame-tr.png" alt="" />
	</div>
	<div id="theme-head">
		<div class="theme-left"></div>
		<div id="theme-head-sidebar">
			<img id="open-late" src="/themes/default/open-late.png" width="278" height="38" alt="Open 11 AM til LATE!" />
			<div class="contact-info"><a href="/location" title="View Map and Contact Information">603 State St, Madison WI &bull; Call 255-5544</a></div>
			<img id="bratman" src="/themes/default/bratman-right-202px" width="128" height="202" alt="" />
			<div id="bratman-says">
				<img id="bratman-says-tail" src="/themes/default/speech-box-tail.png" width="23" height="20" alt="" />
				<h1>Today's Specials</h1>
<?php
// Load specials
global $db;
$temp = $db->select('pages', '*, UNIX_TIMESTAMP(DateModified) AS `DateModified`', "WHERE `PageID`='8'");
$specials = $db->getRow($temp);
// Display specials
echo '<a name="specials-'. $specials['DateModified'] .'"></a>'. $specials['Content'];
echo '<div id="bratman-says-like"><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.statestreetbrats.com/#specials-'. $specials['DateModified'] .'" send="true" layout="button_count" width="90" show_faces="false" colorscheme="dark" font="Arial"></fb:like></div>'
?>
			</div>
		</div>
		<div id="theme-head-photo">
<?php
// Load slideshow photos
$temp = $db->select('images', '*', "ORDER BY `Order`");
while ($slide = $db->getRow($temp)) {
	echo '<img src="/images/photos/header/'. $slide['Filename'] .'" width="507" height="458" alt="['. $slide['Title'] .']" />';
}
?>
		</div>
		<div class="theme-right"></div>
	</div>
	<div id="theme-nav">
		<div id="theme-nav-left"></div>
		<div id="theme-nav-bar"><?php print_menu() ?></div>
		<div id="theme-nav-right"></div>
	</div>
	<div id="theme-body">
		<div class="theme-left"></div>
		<div id="theme-body-main">