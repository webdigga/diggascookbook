<div id="reciperate" class="clearfix">
	<input type="radio" class="star" name="api-select-test" id="rating_1" value="1" <? if (isset($onecheck)) { echo $onecheck; }?>/>
	<input type="radio" class="star" name="api-select-test" id="rating_2" value="2" <? if (isset($twocheck)) { echo $twocheck; }?>/>
	<input type="radio" class="star" name="api-select-test" id="rating_3" value="3" <? if (isset($threecheck)) { echo $threecheck; }?>/>
	<input type="radio" class="star" name="api-select-test" id="rating_4" value="4" <? if (isset($fourcheck)) { echo $fourcheck; };?>/>
	<input type="radio" class="star" name="api-select-test" id="rating_5" value="5" <? if (isset($fivecheck)) { echo $fivecheck; }?>/>
	<input type="hidden" id="recipeid" value=<?=$recipeid;?>>
</div>			
<div id="recipe-rate-result"></div>	