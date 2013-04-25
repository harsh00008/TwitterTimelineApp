<?php
	require("lib/twitteroauth/twitteroauth.php");
	session_start();
	if($_SESSION['logged_in']!='true' || !isset($_SESSION['user_info'])){
		header('Location:error.php?e=3');
	}
	//user info
	$user_info=$_SESSION['user_info'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="/lib/slider/jquery.bxslider.css" type="text/css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<!-- jQuery library (served from Google) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="lib/slider/jquery.bxslider.js"></script>
<!-- bxSlider CSS file -->




<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to your Dashboard!</title>
</head>

<body>
<center>
<img src="img/loader.gif" id="loader" style="display:none"/>
<?php
			
		//Function tp print follower's lists
		function printFollowersList(){
				//follower's info
				$followers=$_SESSION['followers_list'];
				//display followers
				
				foreach($followers as $item){
					echo '<li><table><tr><td><img src="'.$item->profile_image_url.'"></td><td>'.$item->screen_name.'</td></tr></table></li>';
				}
				
		}
?>

            <div id="page_content">
            <h1>Welcome <?php 
				
				echo $user_info->screen_name;
			
			?></h1> 
            <div id="wrapper_menu">
            	<ul class="menu">
                	<li onclick="displayHomeTimeline()">My Home Timeline</li>
                     <li onclick="window.open('problem.php','Problem Statement','width =800,height=600')">Problem Statement</li>
                    <li id="export_li" onclick="export_pdf()">Export to PDF</li>
                    <li onclick="window.location='logout.php'">Logout</li>
                    
                </ul>
            </div>
            
                 
                
                <ul id="sections">
                    <li>
                            <!--Contains user's screen name -->
                            <div id="timeline_title"></div>
                           
                            <!-- Slider -->
                            <div id="wrapper_slider">
                                <ul class="bxslider">
                                    
                                </ul>
                            </div>
                              <form action="export_pdf.php" method="post" id="export_form" hidden="hidden">
                                     <textarea name="content" id="content" hidden="hidden"></textarea>
                              </form>
                                
                             
                    </li>
                    <li>
                     <h2>Your Followers</h2>
                            <ul id="bottom_section"> 
                            <li style="width:220px">
                                        <input type="text" id="searchBox" value="Type follower's name"/>
                                                <div id="searchResult">
                                                	<ul class="search_list">
                                                          <?php
                                                   			 //display the follower's list
                                                  			  printFollowersList();
                                               			 ?>             
                                                         </ul>
                                                   </div>
                             </li>
                             <li style="width:450px"> 
                                    <div id="wrapper_followers">
                                           
                                              <?php
                                                    //display the follower's list
													echo '<ul id="followers_list">';
                                                    	printFollowersList();
													echo '</ul>';
                                                ?>
                                    </div>
                              </li>
                              </ul>
                    </li>
                </ul>
            </div>
                
    <div id="footer"><p>An app for RTCamps Evaluation Team. Developed by <a href="mailto:harsh00008@gmail.com" style="color:white">Harsh Malewar</a></p></div>
</center>

<script src="js/dashboard.js"></script>
</body>
</html>