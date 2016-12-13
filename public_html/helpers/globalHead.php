<?php require_once("global.php"); ?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

	<!-- jquery ui -->
	<link href="jQuery_ui/jquery-ui.min.css" type="text/css" rel="stylesheet" />
	<link href="jQuery_ui/jquery-ui.structure.min.css" type="text/css" rel="stylesheet" />
	<link href="jQuery_ui/jquery-ui.theme.min.css" type="text/css" rel="stylesheet" />
	<script src="jQuery_ui/jquery-ui.min.js"></script>


	<!-- Bootstrap -->
	<link rel="stylesheet" href="custom_bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="custom_bootstrap/css/bootstrap-theme.min.css">
	<script src="custom_bootstrap/js/bootstrap.min.js"></script>

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

	<!-- global custom syle -->
	<link href="globalStyle.css" rel="stylesheet" type="text/css" />
	<script>
	$(function(){
		$("a[href^=http]").attr({ "target":"_blank"});
	});
	</script>

	<!-- Neon -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <link href="neon/css/neon.css" rel="stylesheet">
    <script type="text/javascript" src="neon/js/jquery.getRgb.js"></script>
    <script type="text/javascript" src="neon/js/jquery.neon.js"></script>
    <script src="neon/js/simpleNeon.js"></script>
    <script>$(function() {$.initNeon()});</script>
</head>
<body>
	<?php
		require_once ("helpers/navbar.php");
	?>