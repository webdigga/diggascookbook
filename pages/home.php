<div class="grid_640">
	<?php 	
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/newsreader/newsreader.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/tag-cloud/tag-cloud.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/twitter/twitter.php');
	?>	
</div>

<div class="grid_300">
	<?php 
		if (!isset($_SESSION['id'])) {
			require_once($_SERVER['DOCUMENT_ROOT'].'/assets/why-sign-up/why-sign-up.php');
		}
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/accordian/accordian.php');		
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/search/recipe-search.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/adverts/mpu.php');
	?>	
</div>