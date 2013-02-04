/* Leave the bottom line space in! */
#register {
	width: 94%;
	padding: 3%;
	background: #F2F2F2;
}
#register input, #register label  {
	width:100%;
	float:left;
	clear:left;
}
#register input[type="submit"] {
	float: right;
	width: 200px;
}
#register input {
	margin-bottom:20px;
}
#register .help-text {
	font-size: 0.8em;
	font-style: italic;
	margin-bottom:1px;
	clear:both;
}
#register .error {
	color:red!important;
}
#register .email-error {
	color:red;
	display:none;
	font-size: 0.9em;
	padding-left: 20px;
}
#register .email-already-exists {
	color:red;	
	font-size: 0.9em;
	padding-left: 20px;
}
#dialog-register, #dialog-reminder {
	display:none;
}
