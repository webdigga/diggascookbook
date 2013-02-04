/* Leave the bottom line space in! */
#reciperate {
	float: left;
	width: 115px;
}
#recipe-rate-result {
	font-size: 0.9em;
	font-weight: bold;
	font-style: italic;
}
div.rating-cancel,div.star-rating{
	float:left;
	width:17px;
	height:15px;
	text-indent:-999em;
	cursor:pointer;
	display:block;
	background:transparent;
	overflow:hidden
}
div.star-rating,div.star-rating a{
	background:url(/img/rating/star.gif) no-repeat 0 0px;
	text-indent: 9999px;
}
div.rating-cancel a,div.star-rating a{
	display:block;
	width:16px;
	height:100%;
	background-position:0 0px;
	border:0
}
div.star-rating-on a{
	background-position:0 -16px!important;
}
div.star-rating-hover a{
	background-position:0 -32px;
}
/* Read Only CSS */
div.star-rating-readonly a{
	cursor:default !important;
}
/* Partial Star CSS */
div.star-rating{
	background:transparent!important;
	overflow:hidden!important
}
