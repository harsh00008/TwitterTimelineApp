<?php

	session_start();
	$_SESSION['logged_in']='false';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Twitter Timeline App</title>
</head>

<body><center><br />

    <div id="page_content">
    <h1>Twitter Timeline App</h1>
          <table><tr> <td><img src="img/twitter_bird.png" /></td> 
            <td><a href="log_user.php"><img src="img/sign_in_with_twitter.png" id="login_button"/></a></td></tr></table>
   
    </div>
    
     <div id="footer"><p>An app for RTCamps Evaluation Team. Developed by <a href="mailto:harsh00008@gmail.com" style="color:white">Harsh Malewar</a></p></div>
</center>

</body>
</html>