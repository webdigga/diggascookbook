/* Leave the bottom line space in! */
.nivoSlider {
	position:relative;
	width:100%;	
	overflow: hidden;
}
.nivoSlider img {
	position:absolute;
	top:0px;
	left:0px;
	max-width: none;
}
.nivo-main-image {
	display: block !important;
	position: relative !important; 
	width: 100% !important;
}
/* If an image is wrapped in a link */
.nivoSlider a.nivo-imageLink {
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:100%;
	border:0;
	padding:0;
	margin:0;
	z-index:6;
	display:none;
}
/* The slices and boxes in the Slider */
.nivo-slice {
	display:block;
	position:absolute;
	z-index:5;
	height:100%;
	top:0;
}
.nivo-box {
	display:block;
	position:absolute;
	z-index:5;
	overflow:hidden;
}
.nivo-box img { display:block; }

/* Caption styles */
.nivo-caption {
	position:absolute;
	left:0px;
	bottom:0px;
	background:#000;
	color:#fff;
	width:100%;
	z-index:8;
	padding: 5px 10px;
	opacity: 0.8;
	overflow: hidden;
	display: none;
	-moz-opacity: 0.8;
	filter:alpha(opacity=8);
	-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
	-moz-box-sizing: border-box;    /* Firefox, other Gecko */
	box-sizing: border-box;         /* Opera/IE 8+ */
}
.nivo-caption p {
	padding:5px;
	margin:0;
}
.nivo-caption a {
	display:inline !important;
}
.nivo-html-caption {
    display:none;
}
/* Direction nav styles (e.g. Next & Prev) */
.nivo-directionNav a {
	position:absolute;
	top:45%;
	z-index:9;
	cursor:pointer;
}
.nivo-prevNav {
	left:0px;
}
.nivo-nextNav {
	right:0px;
}
/* Control nav styles (e.g. 1,2,3...) */
.nivo-controlNav {
	text-align:center;
	padding: 15px 0;
}
.nivo-controlNav a {
	cursor:pointer;
}
.nivo-controlNav a.active {
	font-weight:bold;
}
/*
Skin Name: Nivo Slider default Theme
Skin URI: http://nivo.dev7studios.com
Description: A default skin for the Nivo Slider.
Version: 1.0
Author: Gilbert Pellegrom
Author URI: http://dev7studios.com
Supports Thumbs: true
*/
.slider-wrapper { 
	width: 100%;
}
.theme-default .nivoSlider {
	position:relative;
	background:#fff url(/img/newsreader/loading.gif) no-repeat 50% 50%;
	margin-bottom:10px;
	overflow: visible;
}
.theme-default .nivoSlider img {
	position:absolute;
	top:0px;
	left:0px;
	display:none;
}
.theme-default .nivoSlider a {
	border:0;
	display:block;
}
.theme-default .nivo-controlNav {
	text-align: left;
	padding: 0;
	position: relative;
	z-index: 10;
}
.theme-default .nivo-controlNav a {
	display:inline-block;
	width:18px;
	height:18px;
	background:url(/img/newsreader/bullets.png) no-repeat -6px -4px;
	text-indent:-9999px;
	border:0;
	margin: 0 2px;
}
.theme-default .nivo-controlNav a.active {
	background-position:-6px 120%;;
}
.theme-default .nivo-directionNav a {
	display:block;
	width:30px;
	height:30px;
	background: url(/img/newsreader/arrows.png) no-repeat;
	text-indent:-9999px;
	border:0;
	top: auto;
	bottom: -36px;
	z-index: 11;
}
.theme-default .nivo-directionNav a:hover {	
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
}
.theme-default a.nivo-nextNav {
	background-position:-30px 50%;	
	right: 10px;
	top: 45%;
}
.theme-default a.nivo-prevNav {
	background-position: 0px 50%;
	left: 10px;
	top: 45%;
}
.theme-default .nivo-caption {
	font-family: Helvetica, Arial, sans-serif;
}
.theme-default .nivo-caption a {
	color:#fff;
	border-bottom:1px dotted #fff;
}
.theme-default .nivo-caption a:hover {
	color:#fff;
}
.theme-default .nivo-controlNav.nivo-thumbs-enabled {
	width: 80%;
}
.theme-default .nivo-controlNav.nivo-thumbs-enabled a {
	width: auto;
	height: auto;
	background: none;
	margin-bottom: 5px;
}
.theme-default .nivo-controlNav.nivo-thumbs-enabled img {
	display: block;
	width: 120px;
	height: auto;
}
