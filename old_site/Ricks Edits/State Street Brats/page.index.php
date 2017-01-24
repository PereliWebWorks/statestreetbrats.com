<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4dbb0a7c5359b3ef">
	var addthis_config = {
		ui_use_addressbook: true,
		ui_open_windows: true
	}
</script>

<h1>News</h1>

<div class="sidebar">

<div class="social-share">
	<h2><a class="addthis_button_compact"></a>&nbsp;Share</h2>
	<!-- AddThis Button BEGIN -->
	<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
		<a class="addthis_button_facebook"></a>
		<a class="addthis_button_twitter"></a>
		<a class="addthis_button_email"></a>
		<a class="addthis_button_print"></a>
	</div>
	<!-- AddThis Button END -->
</div>

<div class="social-subscribe">
	<h2><a class="addthis_button_rss_follow" addthis:url="http://feeds.feedburner.com/StateStreetBrats"></a>&nbsp;Follow</h2>

	<!-- AddThis Button BEGIN -->
	<div class="addthis_toolbox addthis_32x32_style addthis_default_style">
		<a class="addthis_button_facebook_follow" addthis:userid="statestreetbratswisco"></a>
		<a class="addthis_button_twitter_follow" addthis:userid="StateStBrats"></a>
		<a class="addthis_button_youtube_follow" addthis:userid="statestreetbrats08"></a>
		<a href="http://www.foursquare.com/venue/3760048" title="Check in at Foursquare!"><img src="/images/foursquare_32.png" width="32" height="32" alt="Foursquare" /></a>
	</div>
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=statestreetbrats"></script>
	<!-- AddThis Button END -->

	<!-- FeedBurner Email Signup BEGIN -->
	<p id="email-signup">
	<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=StateStreetBrats', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
	Subscribe by Email:
	<br /><input type="text" name="email"/>
	<input type="hidden" value="StateStreetBrats" name="uri"/><input type="hidden" name="loc" value="en_US"/>
	<button class="go" type="submit" name="subscribeEmail">&gt;&gt;</button>
	</form>
	</p>
	<!-- FeedBurner Email Signup END -->

<!--
	<p id="email-signup">
		<form>Subscribe by Email:
		<br /><input type="text" name="email" /><button class="go" type="submit" name="subscribeEmail">&gt;&gt;</button>
		</form>
	</p>
-->

	<p><strong>Don't miss our next big special event!</strong></p>
</div>

</div>

<div class="news">
<?php
global $db;

$temp = $db->select('posts', '*, UNIX_TIMESTAMP(`DateCreated`) AS `DateCreated`', 'LIMIT 10');
while ($post = $db->getRow($temp)) {
	echo '<div class="blog-post"><a name="post-'. $post['PostID'] .'"></a>
				<h3>'. $post['Title'] .'
				<br /><span style="font-size: 65%">'. date(_DATE_FORMAT, $post['DateCreated']) .'</span></h3>
				
				'. $post['Content'] .'
				<hr />
				<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.statestreetbrats.com/#post-'. $post['PostID'] .'" send="true" width="500" show_faces="false" colorscheme="dark" font="Arial"></fb:like>
			</div>';
}

?>
</div>