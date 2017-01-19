<?php require_once("global.php"); ?>
<html>
<head>

	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="favicon.ico/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="favicon.ico/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="favicon.ico/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="favicon.ico/manifest.json">
	<link rel="mask-icon" href="favicon.ico/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">
	<!-- end favicon -->

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>State Street Brats<?= isset($titleAddition) ? " | $titleAddition" : ""; ?></title>
	<meta name="description" content="<?= isset($metaDescription) ? $metaDescription : ''; ?>" />
	<meta name="robots" content="index,follow" />
	
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="custom_bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="custom_bootstrap/css/bootstrap-theme.min.css">
	<script src="custom_bootstrap/js/bootstrap.min.js"></script>

	<!-- jquery ui -->
	<link rel="stylesheet" href="jquery_ui/jquery-ui.min.css">
	<link rel="stylesheet" href="jquery_ui/jquery-ui.structure.min.css">
	<link rel="stylesheet" href="jquery_ui/jquery-ui.theme.min.css">
	<script src="jquery_ui/jquery-ui.min.js"></script>
	

	

	<!-- Ninja Slider -->
	<!-- Used for the image slider -->
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link href="ninja_slider/ninja-slider.css" rel="stylesheet" type="text/css" />
    <script src="ninja_slider/ninja-slider.js" type="text/javascript"></script>
    
    <!-- unslider -->
    <!-- Used for the review slider -->
    <link href="unslider/unslider-master/dist/css/unslider.css" type="text/css" rel="stylesheet" />
    <link href="unslider/unslider-master/dist/css/unslider-dots.css" type="text/css" rel="stylesheet" />

    <!-- slide -->
    <!--
    <link href="slide/slide.css" type="text/css" rel="stylesheet" />
    <script src="slide/slide.js"></script>
    -->

	<!-- Neon -->
    <link href="neon/css/neon.css" rel="stylesheet">
    <script type="text/javascript" src="neon/js/jquery.getRgb.js"></script>
    <script type="text/javascript" src="neon/js/jquery.neon.js"></script>
    <script src="neon/js/simpleNeon.js"></script>
    <script>$(function() {$.initNeon()});</script>

    <!-- global custom syle -->
	<link href="globalStyle.css" rel="stylesheet" type="text/css" />
	<script>
	$(function(){
		$("a[href^=http]").attr({ "target":"_blank"});
		    $( "#dialog" ).dialog({
		      autoOpen: false,
		    });
		 	$(".progressive-night").append("&nbsp;<span class='glyphicon glyphicon-question-sign'></span>");
		    $( ".progressive-night .glyphicon-question-sign" ).on( "click", function(e) {
		    	var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
		    	//var x = Math.round($(this).offset().left);
		    	var x = 20;
   				var y = Math.round($(this).offset().top);
		     	$( "#dialog" ).dialog( "open" );
   				$("#dialog").parent().css("position", "absolute").css("top", y + "px").css("left", x + "px");
   				document.documentElement.scrollTop = document.body.scrollTop = scrollTop;
		    });
	});
	</script>

</head>
<body>
	<div id="dialog">
		<h5>Progressive Night Rules</h5>
			<ul>
				<li>9 - 10pm: 5 drinks for $5.</li>
				<li>10 - 11pm: 4 drinks for $5.</li>
				<li>11 - 12pm: 3 drinks for $5.</li>
				<li>12 - close: 2 drinks for $5.</li>
			</ul>
	</div>
	<?php
		require_once ("helpers/navbar.php");
	?>