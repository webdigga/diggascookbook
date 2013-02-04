<div class="grid_640">
	<?php
		if (isset($_GET['flag']) && $_GET['flag']==='edit') {
			require_once($_SERVER['DOCUMENT_ROOT'].'/assets/cookbook/edit-recipe.php');
		} else {
			require_once($_SERVER['DOCUMENT_ROOT'].'/assets/cookbook/add-recipe.php');
		}		
	?>
</div>

<div class="grid_300">
	<?php 	
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/search/recipe-search.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/cookbook/my-recipes.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/assets/adverts/mpu.php');
	?>	
</div>