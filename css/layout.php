/* Leave the bottom line space in! */
body {  
	background:#f2f2f2;
	color:#5C5C5C;
}
#main {
	padding: 0 20px 20px 20px;
	margin-left: auto;
  margin-right: auto;  
	max-width: 920px;
	background:#fff;
	overflow:hidden;
}
.container {
  margin-left: auto;
  margin-right: auto;
  width: 100%;
	max-width: 960px;
	background:#fff;
	overflow:hidden;
}
.grid_640, .grid_300 {
	float:left;
	overflow:hidden;
}
.grid_640 {
	width:67%;
	margin-right:3%;
}
.grid_300 {
	width:30%;	
}
.clearfix:after {
	content: ".";
	display: block;
	clear: both;
	visibility: hidden;
	line-height: 0;
	height: 0;
} 
.clearfix {
	display: inline-block;
} 
html[xmlns] .clearfix {
	display: block;
} 
* html .clearfix {
	height: 1%;
}
.diggas-dig {
	overflow:hidden;
	height:66px;
}
#accordion, #lider-wrapper, #recipe-search, #time-and-serves, #comments, #my-recipes, #login {
	margin-bottom:20px;
}
.mpu {
	margin-bottom:15px;
}
li {
	font-size: 0.8em;
	margin-bottom: 2px;
}

/* headers */
.diggascookbook {
	width: 50%;
	float: left;
	text-align: left;
	padding-left: 20px;
	font-family: Impact, Charcoal, sans-serif;
	font-size: 3em;
	margin: 0;
}
.dig-in {
	width: 30%;
	float: right;
	text-align: right;
	padding-right: 20px;
	font-style: italic;
	font-family: Impact, Charcoal, sans-serif;
	font-size: 2em;
}
/* used in recipe view page as sub headers */
h2 {
	border-bottom:1px solid #CCC;
	margin-top:0;
}
/* h3 reserved as standard - do not edit */
/* used in sidebar for headers */
h4 {
	margin:0;
	border-bottom: 1px solid white;
}
/* used in form tagging */
h5 {
	margin: 10px 0;
}
