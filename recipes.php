<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="css/style.php">

	<script src="js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
<header>
	<div class="container">	
	<?php
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/header/header.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/navigation/navigation.php');
	?>
	</div>
</header>
<div role="main" id="main">	
	<?php
		require_once($_SERVER['DOCUMENT_ROOT'].'/pages/recipes.php');		
	?>
</div>
<footer>
<?
	require_once($_SERVER['DOCUMENT_ROOT'].'/assets/adverts/leaderboard.php');
?>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/js/libs/jquery-1.8.0.min.js"><\/script>')</script>
<script src="/js/libs/jquery-ui-1.8.23.custom.min.js"></script>

<!-- scripts concatenated and minified via ant build script-->
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<!-- end scripts-->

<script>
	var _gaq=[['_setAccount','UA-17527981-3'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

</body>
</html>
