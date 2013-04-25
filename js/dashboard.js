// JavaScript Document

//function to populate the slider with follower's tweets
function populateFollowersTweets(screen_name){
	//hide export button
	$('#export_li').hide();
	//AJAX call to display user's time line with a call back function
		$.get('display_user_timeline.php?sname='+screen_name+'', function(data) {
			//replace the data inside wrapper slider
			  $('#wrapper_slider').html(data);
			  //start the slider
			  $('.bxslider').bxSlider({
		  auto:true});
		  //unhide the export pdf button
		  	$('#export_li').show();
			});
}
  
  
 //exporting the pdf
function export_pdf(){
<<<<<<< HEAD
 	var html='';
    //We retrieve text from each li and add it to the HTML var
		$('.bxslider li').each(function() {
		 
		 //Checking whose slideshow we are printing.
		 if($('#timeline_title').html()=='<h2>My Home Timeline</h2>'){
		 	 var img=$(this).find('img').attr('src');
		 }else{
		 	var img='http://twitterapp.6te.net/img/twitter_bird_icon.png';
		 }
          html=html+'<p style="border-top:1px dotted #666;background-color:#FFF"><table width="600"><tr><td width=80><img src="'+img+'"></td><td width=400>'+$(this).text()+'</td></tr></table></p>';
=======
	var timelineTitle=$('#timeline_title').html();
	//HTML variable contains the actaul HTML code to print
 	var html='<h1>'+timelineTitle+'</h1><hr>';
    //We retrieve text from each li and add it to the HTML var
		$('.bxslider li').each(function() {
          html=html+'<li>'+$(this).text()+'</li>';
>>>>>>> d8fe19af109ad4ec95b16e6ecf868fe11ddbdf3a
        });
		//We set this html into a hidden teat are dorm
		$('#content').val(html);
		//submit the form with POST methof to export_pdf.php
	$('#export_form').submit();
}
  
//show all the followers which are/were hidden during search
function setDefaultText(){
		$('#searchBox').val("Type follower's name");
		 //hide search result
		 $('#searchResult').hide();
}

//to display current user's home timeline
function displayHomeTimeline(){
<<<<<<< HEAD
	var myScreenName=$('#home_screen_name').html();
	var user_image=$('#home_user_image').attr('src');
=======
>>>>>>> d8fe19af109ad4ec95b16e6ecf868fe11ddbdf3a
	//hide export link so that no one accesses it in between processing
	$('#export_li').hide();
	//Set title to my home time line
	 $('#timeline_title').html('<h2>My Home Timeline</h2>');
<<<<<<< HEAD
 	//Input the screen_name in the hidden text
	  $('#screen_name').val(myScreenName);
	  //Input the follower's image link
	 $('#user_image').val(user_image);
=======
>>>>>>> d8fe19af109ad4ec95b16e6ecf868fe11ddbdf3a
	 //display the loader image
	$('#wrapper_slider').html('<img src="img/loader.gif">');
	//display user's home time line with an AJAX call
	$.get('display_home_timeline.php', function(data) {
			//Replace the data inside wrapper slider
			  $('#wrapper_slider').html(data);
			  //Start the slider after the data is loaded
			  $('.bxslider').bxSlider({
			  auto:true});
			  //display the export button after everything loads fine
			  $('#export_li').show();
	});
}


//The activites that happen after the page is loaded
$(document).ready(function(){
					
				//put the default title of the slide show as User's timeline
				$('#timeline_title').html('<h2>My Home Timeline!</h2>');
				
				//Populate default home timeline
				displayHomeTimeline();
				
			  //for populating follower's tweets in the slider
			  $('#followers_list>li').click(function(){
				  //follower's screen_name 
				  var follower_name=$(this).text();
<<<<<<< HEAD
				  var user_image=$(this).find('img').attr('src');
				  //Set the title to the follower's screen name, retrieving it from the list
				  $('#timeline_title').html('<h2>'+follower_name+'\'s Statuses</h2>');
				  //Input the screen_name in the hidden text
				  $('#screen_name').val(follower_name);
				    //Input the follower's image link
				  $('#user_image').val(user_image);
=======
				  //Set the title to the follower's screen name, retrieving it from the list
				  $('#timeline_title').html('<h2>'+follower_name+'\'s Statuses</h2>');
>>>>>>> d8fe19af109ad4ec95b16e6ecf868fe11ddbdf3a
				  //Display the loader image before any activity starts
				  $('#wrapper_slider').html('<img src="img/loader.gif">');
				  //call the function, which max an AJAX request to laod the tweets
				  populateFollowersTweets(follower_name);
				  $('#followers_list>li').show();
			  });
			  
			
			  //Searching the followers
			  //by default hide the list
			  $("#searchResult").hide();
			  $("#searchBox").keyup(function(){
						//if tthere's nothing in the search box, fade away the search result div,otherwise fade it in
						if($("#searchBox").val().length==0){
							$("#searchResult").fadeOut();
						}else{
							$("#searchResult").fadeIn();
						}
							// Retrieve the input field text and reset the count to zero
							var filter = $(this).val(), count = 0;
							// Loop through the search list
							$(".search_list li").each(function(){
								// If the list item does not contain the text phrase fade it out
								if ($(this).text().search(new RegExp(filter, "i")) < 0) {
									$(this).fadeOut();
								// Show the list item if the phrase matches and increase the count by 1
								} else {
									$(this).show();								
								}
							});
			});
			  
			  
			 
	
	//When the search box is clicked, remove the "Type follower's name" text
	$('#searchBox').click(function(){
		$(this).val('');
	});
  	
	//
	$('.search_list>li').click(function(){
		//follower's screen_name 
				  var follower_name=$(this).text();
<<<<<<< HEAD
				  var user_image=$(this).find('img').attr('src');
				 
				  //Set the title to the follower's screen name, retrieving it from the list
				  $('#timeline_title').html('<h2>'+follower_name+'\'s Statuses</h2>');
				  //Input the screen_name in the hidden text
				  $('#screen_name').val(follower_name);
				  //Input the follower's image link
				  $('#user_image').val(user_image);
=======
				  //Set the title to the follower's screen name, retrieving it from the list
				  $('#timeline_title').html('<h2>'+follower_name+'\'s Statuses</h2>');
>>>>>>> d8fe19af109ad4ec95b16e6ecf868fe11ddbdf3a
				  //Display the loader image before any activity starts
				  $('#wrapper_slider').html('<img src="img/loader.gif">');
				  //call the function, which max an AJAX request to laod the tweets
				  populateFollowersTweets(follower_name);
				  //set the default text value in the search box
				  setDefaultText();
	});
	
	//On blur event for search box to hide search result
	$('#searchBox').blur(function(){
		//if delay is not put, the function is called and everything is hidden before clicking on the user's name
		setTimeout(function(){
			$('#searchBox').val("Type follower's name");
		 	$('#searchResult').fadeOut();
		 },500);
	});
	
});
