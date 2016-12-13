<span id="contact-information" style="min-height: 100%;">
	<span class="col-md-6 col-xs-12">
		<h1 class="huge neon-sign">Contact</h1>
		<h2>603 State St</h2>
		<h2>Madison, WI</h2>
		<h3>608-255-5544</h3>
		<h3 class="hidden-xs">statestreetbrats@yahoo.com</h3>
		<span class="col-xs-8 col-xs-offset-2 text-center visible-xs" style="margin-bottom: 2em;">
			<a href="mailto:statestreetbrats@yahoo.com" style="margin-bottom: 2em;">
				<img class="img-responsive" src="images/mail.png" />
			</a>
		</span>
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
</span>