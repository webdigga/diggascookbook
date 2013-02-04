/* Author: David White */



var email, password, flag;

$(document).ready(function(){	

	function getParameterByName(name){
		name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
		var regexS = "[\\?&]" + name + "=([^&#]*)";
		var regex = new RegExp(regexS);
		var results = regex.exec(window.location.search);
		if(results == null) {
			flag = "";
		} else {
			flag = decodeURIComponent(results[1].replace(/\+/g, " "));
		}
	}

	function validateEmail($email) {		
		var emailReg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if( !emailReg.test( $email ) ) {		
			$('input[name=usremail]').addClass('error');
			$('.email-error').show();
			$('.email-already-exists').hide();
			return false;			
		} else {
			$('input[name=usremail]').removeClass('error');
			$('.email-error').hide();
			return true;
		}
	}
	
	function validatePassword($password) {	
		if($('input[name=password]').val()==='' || $('input[name=password]').val()===$('input[name=password]').attr('title')) {
			$('input[name=password]').addClass('error');
			return false;
		} else if( $password.length < 5 || $password.length > 15 ) {		
			$('input[name=password]').addClass('error');			
			return false;			
		} else {
			$('input[name=password]').removeClass('error');			
			return true;
		}
	}
			
	// newsreader
	$('#slider').nivoSlider();
	// Accordion
	$("#accordion").accordion();
	// submit button
	$("input:submit").button();
	// tag button
	$("button").button();

	// tags dialog box
	$('#add-recipe button').click(function(){
		$( "#tag-recipe" ).dialog({
				height: 690,
				width: 650,			
				resizable: false,
				modal: true
		});	
		$('div.ui-dialog').appendTo('#add-recipe');
	});
	
	// delete recipe dialog box	
	$('.delete').click(function(){

		var recipeId = $(this).attr('title');
	
		$("#dialog-confirm").dialog({
			position: ['center','middle'],
			resizable: false,
			width:400,
			modal: true,
			buttons: {
				'Delete Recipe?': function(){
					$(this).dialog('close');
					$.post('/delSubmit.php', {
						"delRecId": recipeId
					}, 
					function(deleteData){	
						//alert(deleteData);
						window.location = "cookbook.php?nav=cookbook";
					})
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			}
		});		
	});
	
	// just registered dialog box
	getParameterByName('flag');
	
	if (flag === 'register') {
		$("#dialog-register").dialog({
			position: ['center','middle'],
			resizable: false,
			width:400,
			modal: true,
			buttons: {				
				OK: function() {
					$(this).dialog('close');
				}
			}
		});
	}
	
	if (flag === 'reminder') {
		$("#dialog-reminder").dialog({
			position: ['center','middle'],
			resizable: false,
			width:400,
			modal: true,
			buttons: {				
				OK: function() {
					$(this).dialog('close');
				}
			}
		});
	}	
	
	// search box
	var selectedItem = 0;	
	$( "#tags" ).autocomplete({
			source: "/recipe-list.php",
			minLength: 2,
			select: function( event, ui ) {
				selectedItem = ui.item.id;				
			}
	});	
	$('#recipe-search-icon').click(function(){
		if (selectedItem ===0) {
			return false;
		} else {
			window.location.href = '/recipes.php?nav=recipes&recipeid=' + selectedItem;
		}
	});
	
	// placeholder
	$('input.placeholder, textarea.placeholder, #register input[type="text"]').each(function() {
		var normal_color = '#000';		
		var placeholder_color = ($(this).hasClass('retain')) ? '#000' : '#aaa';		
		var placeholder = $(this).attr('title');
		$(this).attr('value', placeholder).css('color', placeholder_color).bind('click', function() {
			if ($(this).attr('value') == placeholder) {
				$(this).attr('value', '').css('color', normal_color);
			}
		}).bind('blur', function() {
			if ($(this).attr('value') == '') {
				$(this).attr('value', placeholder).css('color', placeholder_color);
			}
		});
	});
	
	function livePlaceholder (e) {	
		$('.' + e).each(function() {
			var normal_color = '#000';			
			var placeholder_color = ($(this).hasClass('retain')) ? '#000' : '#aaa';			
			var placeholder = $(this).attr('title');
			$(this).attr('value', placeholder).css('color', placeholder_color).bind('click', function() {
				if ($(this).attr('value') == placeholder) {
					$(this).attr('value', '').css('color', normal_color);
				}
			}).bind('blur', function() {
				if ($(this).attr('value') == '') {
					$(this).attr('value', placeholder).css('color', placeholder_color);
				}
			});
		});
	}
	
	/* add form */
	/* add new ingredient */
	$('.add-button.ingred .plus').live("click", function(){	
		// count how many we already have
		var count = 0;
		$('textarea.ingredient').each(function(){
			count++;
		});			
		var insertCount = count -1;		
		// insert new field		
		$('textarea.ingredient').eq(insertCount).after('<textarea type="text" value="" name="ingredient[]" class="placeholder addition ingredient ingredient' + (insertCount + 1) + '" title="&lt;Ingredient name and measurement&gt;" rows="3" style="color: rgb(170, 170, 170); "></textarea>');
		livePlaceholder("ingredient" + (insertCount + 1));
	});
	/* delete ingredient */
	$('.add-button.ingred .minus').click(function(){
		// count how many we already have
		var count = 0;
		$('textarea.ingredient').each(function(){
			count++;
		});	
		count = count-1;		
		if(count != 0) {
			$('textarea.ingredient').eq(count).remove();		
		} else {
			$('.add-button.ingred .minus').hide;
		}
	});
	/* add new preparation */
	$('.add-button.prep .plus').live("click", function(){	
		// count how many we already have
		var count = 0;
		$('textarea.preparation').each(function(){
			count++;
		});			
		var insertCount = count -1;	
		var stepCount = count +1;	
		// insert new field	
		$('textarea.preparation').eq(insertCount).after('<textarea type="text" value="" name="preparation[]" class="placeholder addition preparation preparation' + (insertCount + 1) + '" title="&lt;Step '+ stepCount +'&gt;" rows="3" style="color: rgb(170, 170, 170); "></textarea>');
		livePlaceholder("preparation" + (insertCount + 1));
	});
	/* delete preparation */
	$('.add-button.prep .minus').click(function(){	
		// count how many we already have
		var count = 0;
		$('textarea.preparation').each(function(){
			count++;
		});	
		count = count-1;	
		if(count !== 0) {
			$('textarea.preparation').eq(count).remove();			
		}
	});
	
	/* validation */	
	$("form#add-recipe").submit(function() {			
		$('form#add-recipe input[type=text], form#add-recipe textarea, form#add-recipe input[type=file]').each(function(){			
			if($(this).val()==='' || $(this).val()===$(this).attr('title')) {		
				$(this).addClass('error');				
			} else {
				$(this).removeClass('error');					
			}	
		});	
		
		if ($('#add-recipe').hasClass('edit-recipe')) {
			$('input[type=file]').removeClass('error');
		}

		if ($(this).find(".error").length > 0) {			
			return false;
		}
		
	});
	/* when we type in the field we need to add visual validation */
	$('form#add-recipe input[type=text], form#add-recipe textarea').live("focusout", function(){		
		if ($(this).val()==='' || $(this).val()===$(this).attr('title')) {
			$(this).addClass('error');
		} else {			
			$(this).removeClass('error');
		}	
	});
	$('form#add-recipe input[type=text], form#add-recipe textarea').live("focusin", function(){
		$(this).removeClass('error');
	});	
	$("form#add-recipe input[type=file]").change(function() {
		$(this).toggleClass('error');
	});	
	
	/* register validation */
	$("form#register").submit(function() {	
	
		$('form#register input').each(function(){
			if($(this).val()==='' || $(this).val()===$(this).attr('title')) {		
				$(this).addClass('error');				
			} else {
				$(this).removeClass('error');					
			}
		});	

		email = $('input[name=usremail]').val();			
		validateEmail(email);
		password = $('input[name=password]').val();		
		validatePassword(password);

		if ($(this).find(".error").length > 0) {			
			return false;
		}		
		
	});	
	// email validation	
	$('form#register input[type=text]').live("focusout", function(){		
		if ($(this).hasClass('email')) {			
			email = $('input[name=usremail]').val();
			validateEmail(email);
		} else if ($(this).hasClass('password')) {		
			password = $('input[name=password]').val();		
			validatePassword(password);				
		}	else {
			if ($(this).val()==='' || $(this).val()===$(this).attr('title')) {
				$(this).addClass('error');
			} else {			
				$(this).removeClass('error');
			}				
		}
	});
	$('form#register input[type=text]').live("focusin", function(){
		if ($(this).hasClass('email')) {
			$(this).removeClass('error');
			$('.email-error').hide();			
		} else {
			$(this).removeClass('error');
		}
	});
	
	
	//tag cloud script 
	//get tag feed	
	$.getJSON("/tag-cloud-feed.php?callback=?", function(data) {  
		//create list for tag links  
		$("<ul>").attr("id", "tag-list").appendTo("#tag-cloud");  
													
		//create tags  
		$.each(data.tags, function(i, val) {  
															
			//create item  
			var li = $("<li>");  
															
			//create link  
			$("<a>").text(val.tag).attr({title:"See all pages tagged with " + val.tag, href:"/results.php?nav=recipes&tag=" + val.tagid}).appendTo(li); 

			//set tag size  
			li.children().css("fontSize", (val.freq / 10 < 1) ? val.freq / 10 + 1 + "em": (val.freq / 10 > 2) ? "2em" : val.freq / 10 + "em");
															
			//add to list  
			li.appendTo("#tag-list");  
		});           
	});  
	
	/* add comment */
	$("#comment-submit").click(function() {
		// check if value is blank or placeholder text
		if ($('#comment-input').val()!=$('#comment-input').attr('title') && $('#comment-input').val() !='') {
			$.post("/comments.php", {"comment-input": $('#comment-input').val(), "recipeid": $("#recipeid").val(), "userkey": $("#userkey").val()}
			, function(datacomm) {
				//alert(datacomm);
				// format and output result
				$("#comments").html(datacomm);
			});
		}
	});
	
	/* tweets */	
	getTwitters('tweet', { 
		id: 'jamieoliver', 
		count: 1, 
		enableLinks: true, 
		ignoreReplies: true, 
		clearContents: true,
		template: '<img height="50" width="50" src="%user_profile_image_url%" alt="twitter profile image" /> <a href="http://twitter.com/%user_screen_name%">%user_name%</a> said: "%text%" <a href="http://twitter.com/%user_screen_name%/statuses/%id%">%time%</a>'
	});
	getTwitters('tweet2', { 
		id: 'gordonramsay01', 
		count: 1, 
		enableLinks: true, 
		ignoreReplies: true, 
		clearContents: true,
		template: '<img height="50" width="50" src="%user_profile_image_url%" alt="twitter profile image" /> <a href="http://twitter.com/%user_screen_name%">%user_name%</a> said: "%text%" <a href="http://twitter.com/%user_screen_name%/statuses/%id%">%time%</a>'
	});
	getTwitters('tweet3', { 
		id: 'Raymond_Blanc', 
		count: 1, 
		enableLinks: true, 
		ignoreReplies: true, 
		clearContents: true,
		template: '<img height="50" width="50" src="%user_profile_image_url%" alt="twitter profile image" /> <a href="http://twitter.com/%user_screen_name%">%user_name%</a> said: "%text%" <a href="http://twitter.com/%user_screen_name%/statuses/%id%">%time%</a>'
	});
	getTwitters('tweet4', { 
		id: 'Nigella_Lawson', 
		count: 1, 
		enableLinks: true, 
		ignoreReplies: true, 
		clearContents: true,
		template: '<img height="50" width="50" src="%user_profile_image_url%" alt="twitter profile image" /> <a href="http://twitter.com/%user_screen_name%">%user_name%</a> said: "%text%" <a href="http://twitter.com/%user_screen_name%/statuses/%id%">%time%</a>'
	});
	getTwitters('tweet5', { 
		id: 'rivercottage', 
		count: 1, 
		enableLinks: true, 
		ignoreReplies: true, 
		clearContents: true,
		template: '<img height="50" width="50" src="%user_profile_image_url%" alt="twitter profile image" /> <a href="http://twitter.com/%user_screen_name%">%user_name%</a> said: "%text%" <a href="http://twitter.com/%user_screen_name%/statuses/%id%">%time%</a>>'
	});
	

	
	
});