/* Leave the bottom line space in! */
#my-recipes {
	width:300px;
}
#my-recipes ul {
	margin:0;
	padding:0;
}
#my-recipes .edit {
  margin-right:5px;
	cursor:pointer;
}
#my-recipes .delete {
	cursor:pointer;
}
#my-recipes .edit, #my-recipes .delete {
	float: right;
	display: inline-block;	
}
#my-recipes ul li {
  padding:10px;
	list-style: none;
}
#my-recipes ul li a.recipe-title {
	width: 200px;
	display: inline-block;
	color: #333;
	text-decoration: none;
}
#my-recipes li:nth-child(odd) {
  background-color:#eee;
}
#my-recipes li:nth-child(even) {
  background-color:#fff;
}
#dialog-confirm {
	display:none;
}
