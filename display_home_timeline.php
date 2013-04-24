<?php
	//call twitter API library
	require("lib/twitteroauth/twitteroauth.php");
	//start session
	session_start();
	if($_SESSION['logged_in']=='true'){
			$home_timeline=$_SESSION['home_timeline'];
				echo '<ul class="bxslider">';
			foreach($home_timeline as $item){
				echo '<li>';
				echo '<a href="http://twitter.com/'.$item->user->screen_name.'" target="_blank"><img src="'.$item->user->profile_image_url.'"/></a><b>@'.$item->user->screen_name.'</b>';
				echo '	<p>';
				echo '		<table><tr><td valign="top"><img src="img/twitter_bird_icon.png"/></td><td>'.$item->text.'</td></tr></table>';
				echo '	</p>';
				echo '</li>';
			}
			echo '</ul>';
	}else{
		header('location:error.php?e=3');
	}
?>

