<?php
// code here to switch the selected nav item
$homeNav='';
$recipesNav='';
$cookbookNav='';
$loginRegisterNav='';
if (isset($_GET['nav'])) {
	$nav = $_GET['nav'];
} else {
	$nav = 'home';
}
switch ($nav) {
	case 'home':
		$homeNav = ' ui-tabs-selected ui-state-active';
	break;
	case 'recipes':
		$recipesNav = ' ui-tabs-selected ui-state-active';
	break;
	case 'loginregister':
		$loginRegisterNav = ' ui-tabs-selected ui-state-active';
	break;
	case 'cookbook':
		$cookbookNav = ' ui-tabs-selected ui-state-active';
	break;	
	default :
		$homeNav = ' ui-tabs-selected ui-state-active';
	break;
}
?>

<nav id="main-nav" class="ui-tabs ui-widget ui-widget-content ui-corner-all ui-widget-header">
	<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-corner-all">
		<li class="ui-state-default ui-corner-top <?=$homeNav?>"><a href="/index.php?nav=home">Home</a></li>
		<li class="ui-state-default ui-corner-top <?=$recipesNav?>"><a href="/recipes.php?nav=recipes">Recipes</a></li>
		<? if (isset($_SESSION['id'])) { ?>
		<li class="ui-state-default ui-corner-top <?=$cookbookNav?>"><a href="/cookbook.php?nav=cookbook">Cookbook</a></li>	
		<? } else { ?>
		<li class="ui-state-default ui-corner-top <?=$loginRegisterNav?>"><a href="/login-register.php?nav=loginregister">Login / Register</a></li>
		<? } ?>			
	</ul>
	<div class="welcome"><? if (isset($_SESSION['id'])) { ?>Welcome <?=$firstname; echo "&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"/logout.php\">Logout</a>"; } ?></div>
</nav>