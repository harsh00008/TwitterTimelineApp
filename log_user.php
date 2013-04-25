<?php

require("lib/twitteroauth/twitteroauth.php");
session_start();

	// The TwitterOAuth instance
$twitteroauth = new TwitterOAuth('ocWWqIMafchaBN1nDS4A', 'zmKbuMGgqfb3Onar1Q9FO8HI62QBUTTXIYNsIIX1Xwg');
// Requesting authentication tokens, the parameter is the URL we will be redirected to
$request_token = $twitteroauth->getRequestToken('http://twitterapp.6te.net/set_twitter_data.php');

// Saving them into the session
$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];




// If everything goes well..
if($twitteroauth->http_code==200){
    // Let's generate the URL and redirect
    $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
    header('Location: '. $url);
} else {
    // It's a bad idea to kill the script, but we've got to know when there's an error.
    header('Location: error.php?e='.$twitteroauth->http_code);
}

?>
