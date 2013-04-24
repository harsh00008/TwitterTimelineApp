<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Oops!Some problem!</title>
</head>

<body><center>
<div id="page_content">
<h1 style="color:#900">Some Problem :-(</h1>
<p>
	<?php
		/**
			Error Code Summary
			Error Code 1:set_twitter_data.php is not accessed properly
			Error Code 2: Invalid tokens or request is denied
			Error Code 3: Session expired or inappropriate access of dashboard.php with invalid session variable
		**/
		$error_code=$_GET['e'];
		switch($error_code){
			case 1:
				echo 'Did you try going out of the flow?';
			break;
		
			case 2:
				echo 'Either the token issued was invalid or you denied the request!';
			break;
			
			case 3:
				echo 'You should sign in again. Probably your session expired!';	
			break;
			
			default:
				echo 'There was some problem. Please try signing in again!';
		}
		echo 'Click <a href="index.php">here</a> to continue';
	?>
</p>

</div>
</center>
</body>
</html>