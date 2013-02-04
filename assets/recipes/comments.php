<div id="comments">
	<h4>Comments</h4>
	<?	
	echo $commentstable;	
	if (isset($_SESSION['id'])) {
	?>
	<textarea rows="4" name="comment" id="comment-input" class="placeholder" title="Comments here..."></textarea>
  <input type="submit" value="Submit" id="comment-submit" />
	<?
	}		
	?>
</div>