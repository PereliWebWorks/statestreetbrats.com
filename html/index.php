<?php require_once("helpers/globalHead.php"); ?>

<?php require_once("helpers/socialMediaIcons.php"); ?>
<?php require_once("helpers/headerSlider.php"); ?>


<?php require_once ("helpers/contentStart.php"); ?>
<!-- CONTENT -->



<span class="row">
	<span class="col-md-3 xs-hidden"></span>
	<span class="col-xs-12 col-md-6">
		<div class="yelp-slider">
			<div>
				<i>
					"Great place to stop for a sandwich with the family. Brats and burgers are always a hit at State Street Brats."
				</i>
				<br/>
				<span>-Mark C.</span>
			</div>
			<div>
				<i>
					"State Street Brat is amazing!"
				</i>
				<br/>
				<span>-Alix J. </span>
			</div>
			<div>
				<i>
					"I love State Street Brat's! The Food is great, try the Bacon Cheddar Curds. The staff is friendly, knowledgeable and quick."
				</i>
				<br/>
				<span>-Faheem B.</span>
			</div>
			<div>
				<i>
					"Delicious!! Brauts were cooked well and tasted great!"
				</i>
				<br/>
				<span>-Nick R.</span>
			</div>
			<div>
				<i>
				"Located smack dab in the epicenter of food, folks and fun, on the UW-Madison campus, Brats delights with ample table space, an outdoor patio and the best curds and red brats anywhere."
				</i>
				<br/>
				<span>-Wilkins K.</span>
			</div>
			<div>
				<i>
				"The brats are always great.  Love the split-grilled taste, and the lightly toasted buns (thanks for not cutting corners on those!)"
				</i>
				<br/>
				<span>-Bobby B.</span>
			</div>
			<div>
				<i>
				"The best sports bar in America."
				</i>
				<br/>
				<span>-Michael P.</span>
			</div>
			<div>
				<i>
				"I suggest this restaurant to anyone who visits Madison. Make sure you try out the cheese curds and get there early for the cheap beer."
				</i>
				<br/>
				<span>-John G.</span>
			</div>
			<div>
				<i>
				"What are you doing sitting at home reading this when you could be at this place having a brat basket?  Get over yourself and go have a brat."
				</i>
				<br/>
				<span>-Joel M.</span>
			</div>
		</div>
	</span>
	<span class="col-md-3 xs-hidden"></span>
</span>


  
  <script src="slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
      $(".yelp-slider").slick({
      	dots: true,
      	autoplay: true,
      	autoplaySpeed: 10000
      });
      
    });
  </script>





<!-- END CONTENT -->
<?php require_once("helpers/contentEnd.php");?>

<?php require_once("helpers/globalFoot.php"); ?>
























