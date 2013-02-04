<h2><?=$recipeTitle?><span class="by">By <? if (isset($recipeUser)) { echo $recipeUser; }?></span></h2>
<img src="<?=$recipeImage?>" title="<?=$recipeTitle?>" alt="<?=$recipeTitle?>" width="100%" class="recipe-image" />
<p><?=$recipeDescription?></p>