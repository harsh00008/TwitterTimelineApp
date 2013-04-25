<?php
session_start();
require("lib/twitteroauth/twitteroauth.php");

//API credentials
$oauth_verifier = $_REQUEST['oauth_verifier'];
$oauth_token = $_SESSION['oauth_token'];
$oauth_token_secret = $_SESSION['oauth_token_secret'];

//to check if the requet is valid
if(isset($oauth_token) && isset($oauth_token_secret) && isset($oauth_verifier) && !isset($_REQUEST['denied'])){
	$connection = new TwitterOAuth('ocWWqIMafchaBN1nDS4A', 'zmKbuMGgqfb3Onar1Q9FO8HI62QBUTTXIYNsIIX1Xwg', $oauth_token, $oauth_token_secret);
	$access_token = $connection->getAccessToken($oauth_verifier);
	$user_info = $connection->get('account/verify_credentials');
	
	if(isset($user_info->error)){
		//Something is wrong. Redirecting to error page.
		header('Location : error.php?e=2');
	}else{
		//Everything went OK! Redirecting to the dashboard page
		$_SESSION['logged_in']='true';
		$_SESSION['user_info']=$user_info;
		
		//Put the tweets from hometime line into session for further use. upto count 10
		$home_timeline=$connection->get('statuses/home_timeline',array(count=>10));	
		//pass the home timeline with session	
		$_SESSION['home_timeline']=$home_timeline;
		
		//Getting followers ids
		$followers=$connection->get('followers/ids',array('screen_name' =>$user_info->screen_name ));
		//Hydrating followers ids for screen names
		$count=0;
		foreach($followers->ids as $item){
			//populate an array of follower ids for hydration
			$follower_list=$item.','.$follower_list;
			$count++;
			if($count==10){
				break;
			}
		}
		
	
		//Hydrate the follower ids with screen names
		$followers_name=$connection->get('users/lookup',array('user_id'=>$follower_list));
		//Pass the follower's screen name to sessions
		$_SESSION['followers_list']=$followers_name;
		//redirect to the user dashboard
		header('Location:dashboard.php');
	}
}else{
	//if there's some error, redirect to the error page
	header('Location:error.php?e=1');
}


?>


