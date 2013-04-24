<?php
	//call twitter API library
	require("lib/twitteroauth/twitteroauth.php");
	//start session
	session_start();
	
	//function to print user timelines
	function printUserTimeline($screen_name){
			//Token credentials
			$oauth_token = $_SESSION['oauth_token'];
			$oauth_token_secret = $_SESSION['oauth_token_secret'];
			//Instantiate an object of TwitterOauth with above credentials.
			$connection = new TwitterOAuth('ocWWqIMafchaBN1nDS4A', 'zmKbuMGgqfb3Onar1Q9FO8HI62QBUTTXIYNsIIX1Xwg', $oauth_token, $oauth_token_secret);
	  		//Get the requested user's time line
			$tweets=$connection->get('statuses/user_timeline',array('screen_name' => $screen_name, 'count' => 10));
			//count variable
			$i=0;
			//populating the tweets
			foreach($tweets as $item){
				echo '<li>';
				echo '<a href="http://twitter.com/'.$item->user->screen_name.'" target="_blank"><img src="'.$item->user->profile_image_url.'"/></a><b>@'.$screen_name.'</b>';
				echo '	<p>';
				echo '		<table><tr><td valign="top"><img src="img/twitter_bird_icon.png"/></td><td>'.$item->text.'</td></tr></table>';
				echo '	</p>';
				echo '</li>';
				//count the number of tweets retrieved
				$i++;
			}
			
			//if the count is 0
			if($i==0){
				//If no posts are retrieved from the API
				echo '<b>Some Problem :-(</b>\Can be because of the following :You are calling the API in a very short interval
				or Problem with the connection. Please try again!';
			}
	
		}
		//if this script is not accessed properlu, we redirect the user to the error page.
		if($_SESSION['logged_in']=='true'){
			//Get screen name
			$screen_name=$_GET['sname'];
			//Slider class declaration
			echo '<ul class="bxslider">';
			//print the requested user's timeline
				printUserTimeline($screen_name);
			//close the declaration class
			echo '</ul>';
		}else{
			header('Location:error.php?e=3');
		}
	
?>