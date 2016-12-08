<span id="contact-information">
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
</span>