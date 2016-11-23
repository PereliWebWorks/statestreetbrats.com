<?php require_once("helpers/globalHead.php"); ?>

<?php require_once("helpers/socialMediaIcons.php"); ?>
<?php //require_once("helpers/headerSlider.php"); ?>


<?php require_once ("helpers/contentStart.php"); ?>
<!-- CONTENT -->


	
<span class="row">
	<span class="col-md-8 col-xs-12">
		<div class="row bubble">
			<span class="col-md-4 hidden-xs">
				<img src="images/employeeWithLiquor.jpg" class="img-responsive body-image" />
			</span>
			<span class="col-md-8 col-xs-12">
				<img src="images/vectors/ribbons_badges/banner1.png" class="col-xs-12 img-responsive banner-image" />
				<div class="sub-bubble">
					<h2 class="col-xs-12 text-center">Open 10am to 2am</h2>
					<span class="col-xs-12">
						<a href="#" class="col-xs-6 text-center">
							<h3 class="text-center">Menu</h3>
						</a>
						<a href="#" class="col-xs-6 text-center">
							<h3 class="text-center">Contact</h3>
						</a>
					</span>
				</div>
			</span>
		</div>

		<div class="row bubble">
			<h1 class="col-xs-12 text-center">Today's Specials</h1>
			<ul>
				<li><h4 class="">Special 1</h4></li>
				<li><h4 class="">Special 2</h4></li>
				<li><h4 class="">Special 3</h4></li>
			</ul>
		</div>


		<div class="row bubble">
			<h1 class="col-xs-12 text-center">Madison Loves State Street Brats</h1>
			<div class="col-md-8 col-xs-12 slider-container">
				<div class="my-slider">
					<ul>
						
					</ul>
				</div>
			</div>
			<img src="images/BuckyBadger.png" class="col-md-4 hidden-xs img-responsive" />
		</div>

	</span>



	<span class="col-md-4 hidden-xs">
		<div class="bubble row">
			            <a class="twitter-timeline"  href="https://twitter.com/search?q=%40statestbrats" data-widget-id="800423506945146880"
			            data-chrome="transparent"
			            data-tweet-limit="6">Tweets about @statestbrats</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
		</div>
	</span>
</span>

	






<!-- END CONTENT -->
<?php require_once("helpers/contentEnd.php");?>

<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>

<script src="unslider/unslider-master/dist/js/unslider-min.js"></script>
<script>
		jQuery(document).ready(function($) {
			$('.my-slider').unslider({
				arrows: false,
				autoplay: true,
				delay: 7000,
				infinite: true
			});
		});
	</script>

<?php require_once("helpers/globalFoot.php"); ?>
























