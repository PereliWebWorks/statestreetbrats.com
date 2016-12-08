<?php require_once("helpers/globalHead.php"); ?>
<?php require_once("helpers/connectToDB.php"); ?>

<?php require_once("helpers/socialMediaIcons.php"); ?>
<?php require_once("helpers/headerSlider.php"); ?>


<?php require_once ("helpers/contentStart.php"); ?>
<!-- CONTENT -->

	
<span class="row">
	<span class="col-md-8 col-xs-12">
		<div class="row bubble slide-module-bottom">
			<span class="col-md-4 hidden-xs hidden-sm">
				<img src="images/employeeWithLiquor.jpg" class="img-responsive body-image" />
			</span>
			<span class="col-md-8 col-xs-12">
				<img src="images/vectors/ribbons_badges/banner1.png" class="col-xs-12 img-responsive banner-image" />
				<div class="sub-bubble">
					<h2 class="col-xs-12 text-center">Open 11am to 2am</h2>
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

		<div class="row bubble slide-module-bottom">
			<?php $day = "thursday"; ?>
			<h1 class="col-xs-12 text-center"><?= ucfirst($day) ?>'s Specials</h1>
			<img src="images/bratman.png" class="col-md-2 hidden-xs hidden-sm img-responsive" />
			<span class="col-md-8 col-xs-12">
				<span class="col-md-3 hidden-xs hidden-sm"></span>
				<span class="col-md-9 col-xs-12">
					<ul class="col-xs-12">
					<?php
						$query = "SELECT text FROM specials WHERE day=:day";
						$stmt = $db->prepare($query);
						$stmt->bindParam(":day", $day);
						$stmt->execute();
					?>
					<?php if ($stmt->rowCount() !== 0) : //if there are speiclas today ?>
						<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
							<li><h3><?= $row["text"] ?></h3></li>
						<?php endwhile ?>
					<?php else : ?>
						<h4>There are no specials today.</h4>
					<?php endif ?>
					</ul>
					<span class="col-xs-12" id="all-specials-container">
						<span id="all-specials">
							<h3 class="col-xs-12 text-center">All Specials</h3>
							<?php
								$days = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");
								for ($i = 0 ; $i < sizeof($days) ; $i++) :
									$day = $days[$i];
									$query = "SELECT * FROM specials WHERE day=\"$day\"";
									$stmt = $db->prepare($query);
									$stmt->execute();
									if ($stmt->rowCount() > 0) : ?>	
										<h4><?= ucfirst($day); ?></h4>
										<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
											<ul>
												<li><?= $row["text"]; ?></li>
											</ul>
										<?php endwhile ?>
									<?php endif ?>
								<?php endfor ?>
						</span>
						<span class="col-xs-12">
							<input type="button" class="btn btn-default" value="Show All Specials" id="show-specials-btn"/>
							<input type="button" class="btn btn-default" value="Hide Specials" id="hide-specials-btn" />
						</span>
						<style>
							#all-specials, #hide-specials-btn{display:none;}
						</style>
						<script>
							$("#show-specials-btn").click(function(){
								$("#all-specials").slideDown();
								$("#show-specials-btn").fadeToggle(500, function(){
									$("#hide-specials-btn").fadeToggle()});
							});
							$("#hide-specials-btn").click(function(){
								$("#all-specials").slideUp();
								$("#hide-specials-btn").fadeToggle(500, function(){
									$("#show-specials-btn").fadeToggle()});
							});
						</script>
					</span>
				</span>
			</span>
			<img src="images/bratman_reversed.png" class="col-md-2 hidden-xs hidden-sm img-responsive" />
		</div>


		<div class="row bubble slide-module-bottom">
			<img src="images/BuckyBadger.png" class="col-md-4 hidden-xs hidden-sm img-responsive" />
			<span class="col-md-8 col-xs-12">
				<h1 class="col-xs-12 text-center">Madison Loves State Street Brats</h1>
				<div class="col-xs-12 slider-container">
					<div id="review-slider">
						<ul>
						<?php
							$quotes = array(
								"Great place to stop for a sandwich with the family. Brats and burgers are always a hit at State Street Brats.",
								"State Street Brat is amazing!",
								"I love State Street Brat's! The Food is great, try the Bacon Cheddar Curds. The staff is friendly, knowledgeable and quick.",
								"Delicious!! Brauts were cooked well and tasted great!",
								"Brats delights with ample table space, an outdoor patio and the best curds and red brats anywhere.",
								"The brats are always great.  Love the split-grilled taste, and the lightly toasted buns (thanks for not cutting corners on those!)",
								"The best sports bar in America.",
								"I suggest this restaurant to anyone who visits Madison. Make sure you try out the cheese curds and get there early for the cheap beer.",
								"What are you doing sitting at home reading this when you could be at this place having a brat basket?  Get over yourself and go have a brat."
								);
							$names = array(
								"Mark C.",
								"Alix J.",
								"Faheem B.",
								"Nick R.",
								"Wilkins K.",
								"Bobby B.",
								"Michael P.",
								"John G.",
								"Joel M."
								);
							for ($i = 0 ; $i < sizeof($quotes) ; $i++) :
							?>
								<li class="review">
									<i class="review-text">
										<?= $quotes[$i] ?>
									</i>
									<br/>
									<span class="review-name">
										-<?= $names[$i] ?> 
									</span>
								</li>
							<?php endfor ?>
						</ul>
					</div>
				</div>
			</span>
		</div>

		<div class="row bubble slide-module-bottom">
			<span class="col-md-6 col-xs-12">
				<h2>603 State St</h2>
				<h2>Madison, WI</h2>
				<h2>608-255-5544</h2>
			</span>
			<span class="col-md-6 col-xs-12">
				<div id="map" class="col-xs-12">
				</div>
				<script>
			      var map;
			       
			      var myLatLong = {lat: 43.074943, lng: -89.395988};
			      function initMap() {
			        map = new google.maps.Map(document.getElementById('map'), {
			          center: myLatLong,
			          zoom: 15
			        });

			        var marker = new google.maps.Marker({
			          position: myLatLong,
			          map: map,
			          title: 'State Street Brats'
			        });
			      }
			    </script>
			    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBv7rEmfbNnGIymEysxReJXhoUS0jG-0r0&callback=initMap"
			    async defer></script>
			</span>
		</div>

	</span>




	<span class="col-md-4 hidden-xs slide-module-bottom">
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
			$('#review-slider').unslider({
				arrows: false,
				autoplay: true,
				delay: 7000,
				infinite: true
			});
		});
	</script>

<?php require_once("helpers/globalFoot.php"); ?>
























