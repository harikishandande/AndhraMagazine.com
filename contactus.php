<?php
session_start();
include('includes/article.php');
include('includes/connection.php');

if(isset($_POST['submit']))
{	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	if(empty($name) or empty($email) or empty($subject) or empty($message))
	{
		$error="All fields are required!!";
	}
	else
	{	global $pdo; 
		$query = $pdo -> prepare('INSERT INTO contactus (name,email,subject,message,time_stamp) VALUES (?,?,?,?,?)');
			$query -> bindValue(1,$name);
			$query -> bindValue(2,$email);
			$query -> bindValue(3,$subject);
			$query -> bindValue(4,$message);
			$query -> bindValue(5,date('Y-m-d H:i:s'));
			$query -> execute();
		$success="Submitted successfully!!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
    <title>Andhra Magazine</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/weather-icons.min.css">
	<link rel="stylesheet" href="assets/css/megafish.css">
    <link rel="stylesheet" href="assets/css/framework.css">
    <link rel="stylesheet" href="assets/flexslider/flexslider-alt.css">
    <link rel="stylesheet" href="assets/flexslider/flexslider-tab.css">
	
	<link rel="stylesheet" href="style.css" type='text/css' media="screen" />
	<link rel='stylesheet' href='assets/css/print.css' id="print-style-css" type='text/css' media="print" />
	
	<script type="text/javascript" src="ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
	
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript" ></script>
    <script src="assets/js/custom.js"></script>

</head>
<body class="site-boxed">
	<div class="site-wrapper">
		<div class="prl-container">

			<header id="masthead" class="clearfix">
				<div class="prl-header-logo"><a href="#"><img src="assets/images/logo.png" alt="Original" /></a></div>
				
				<div class="prl-header-social">
					<a href="fb-link" class="fa fa-facebook" title="Facebook" data-prl-tooltip></a>
					<a href="tt-link" class="fa fa-twitter" title="Twitter" data-prl-tooltip></a>
					<a href="yb-link" class="fa fa-youtube" title="Youtube" data-prl-tooltip></a>
					<a href="gg-link" class="fa fa-google-plus" title="Google plus" data-prl-tooltip></a>
				</div>
				<?php
						
						$contact = new Article;
						$contact_info = $contact->fetch_contact_info();	
						$phone = $contact_info['phone'];
						$email = $contact_info['email'];
					?>
				<div class="prl-header-right">
					<span class="prl-header-custom-text"><i class="fa fa-phone-square"></i> <?php echo $phone; ?></span>
					<span class="prl-header-time"><i class="fa fa-clock-o"></i> <?php echo date('D F j\t\h, Y'); ?></span>
				</div>	
			</header>

			<script>
				$(function () {
					var example = $('#sf-menu').superfish({
						delay:       400,
						animation:   {opacity:'show',height:'show'},
						speed:       'fast', 
						autoArrows:  false
					});
					
				});
			</script>

			<nav id="nav" class="prl-navbar" role="navigation">
				<div class="nav-wrapper"> 
					<div class='nav-container clearfix'>
						<ul class="sf-menu" id="sf-menu">
							<li ><a href="index.php"><i class="fa fa-home"></i> Home</a>
							<li ><a href="all_movies.php"><i class="fa fa-film"></i> Movies</a></li>
							<li ><a href="all_politicals.php"><i class="fa fa-bullhorn"></i> Political</a></li>
							<li ><a href="all_polls.php"><i class="fa fa-flag"></i> Polls</a></li>
							<li ><a href="all_gallery.php"><i class="fa fa-camera"></i> Gallary</a></li>	
							<li class="menu_item-home current"><a href="contactus.php"><i class="fa fa-envelope"></i> Contact Us</a></li>								
						</ul>

						<a href="#" class="prl-nav-toggle prl-nav-menu" title="Nav" data-prl-offcanvas="{target:'#offcanvas'}"></a>
				 
					</div>	
				</div><!-- nav-wrapper -->
			</nav>

			<!-- OFF CANVAS -->

<div id="offcanvas-search" class="prl-offcanvas">
	<div class="prl-offcanvas-bar prl-offcanvas-bar-flip">
	<form class="prl-search">
		<input class="prl-search-field" type="search" placeholder="search...">
	</form>
  </div>
</div>

<div id="offcanvas" class="prl-offcanvas">
	<div class="prl-offcanvas-bar">

		
		<nav class="side-nav">
			<ul class="nav-list">
				<li class="nav-item">
					<a href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a href="all_movies.php">Movies</a>
				</li>
				<li class="nav-item">
					<a href="all_politicals.php">Political</a>
				</li>
				<li class="nav-item">
					<a href="all_polls.php">Polls</a>
				</li>
				<li class="nav-item">
					<a href="all_gallery.php">Gallery</a>
				</li>
				<li class="nav-item">
					<a href="contactus.php">Contact Us</a>
				</li>
			</ul>
		</nav>
		
</div></div>
		</div>

		<div class="prl-container">
			<div class="prl-grid" >
				<div class="prl-span-12">		
					<div id="map_canvas" style="height:400px;"></div>
						<script>
							jQuery(function($){
								$("#map_canvas").gMap({zoom: 14, markers: [ { latitude: '16.5000', longitude: '80.6400',html: '<h3>Title</h3><p>You can write something about your company, address, phone...ect. HTML is allowed.</p>'} ], mapTypeControl: false, zoomControl: false, scrollwheel: false} );

							});	
						</script>
				</div>
			</div>	
			<div class="prl-grid prl-grid-divider">
				<section  class="prl-span-4">
					<h3>Andhra Magazine <small>Inc</small></h3>
					<p><i class="fa fa-map-marker"></i> 2-16-1, Krishna nagar, Near west railway station, Vijayawada 521003 - Andhra Pradesh</p>
					<hr class="prl-grid-divider" />
						<ul class="prl-list no-bullet">
							<li><i class="fa fa-phone"></i> +301 - <em>Administrator</em></li>
							<li><i class="fa fa-phone"></i> +91 8686401033 - <em>Controller</em></li>
							<li><i class="fa fa-phone"></i> +91 8080056780 - <em>Moderator</em></li>
						</ul>
					<hr class="prl-grid-divider" />
						<ul class="prl-list no-bullet">
							<li><i class="fa fa-envelope"></i> subbu@andhramagazine.com - <em>Administrator</em></li>
							<li><i class="fa fa-envelope"></i> kishan@andhramagazine.com - <em>Controller</em></li>
							<li><i class="fa fa-envelope"></i> harsha@andhramagazine.com - <em>Moderator</em></li>
						</ul>
				</section>
				<div class="prl-span-8">
					<h3>FILL THE FORM</h3>
					<p>We look forward to hearing from you!</p>
					
					<?php 
									if(isset($error))
									{ ?>
										<h4 style ="color:red;text-align:center"><?php echo $error; ?> </h4>
							  <?php }  
									if(isset($success))
									{ ?>
										<h4 style ="color:green;text-align:center"><?php echo $success; ?> </h4>
							  <?php } ?>  
					
					<form class="form" action="contactus.php" method="POST" enctype="multipart/form-data">
						<fieldset>
							<div class="prl-grid" data-prl-grid-margin>
								<div class="prl-span-6">
									<div class="prl-form-row space-bot">
										<label class="prl-form-label" for="name">Name *</label>
										<div class="prl-form-controls prl-comment-name"><input name="name" type="text" placeholder="" class="prl-width-1-1"></div>
									</div>
								</div>
								<div class="prl-span-6">
									<div class="prl-form-row space-bot">
										<label class="prl-form-label" for="email">Email *</label>
										<div class="prl-form-controls prl-comment-email"><input name="email" type="text" placeholder="" class="prl-width-1-1"></div>
									</div>
								</div>
								<div class="prl-span-12">
									<div class="prl-form-row space-bot">
										<label class="prl-form-label" for="subject">Subject</label>
										<div class="prl-form-controls prl-comment-url"><input name="subject" type="text" placeholder="" class="prl-width-1-1"></div>
									</div>
								</div>
								<div class="prl-span-12">
									<div class="prl-form-row space-bot">
										<label class="prl-form-label" for="form-s-t">Message *</label>
										<div class="prl-form-controls">
											<textarea id="form-s-t" name="message" cols="30" rows="8" placeholder="" class="prl-width-1-1"></textarea>
										</div>
									</div>
								</div>
								<div class="prl-span-12">
									<div class="prl-form-row">
										<button class="prl-button prl-button-primary" name="submit" type="submit">Send message</button>
										<em class="prl-form-help-inline">Required fields are marked (*)</em>
									</div>
								</div>
							</div>		
						</fieldset>
					</form>
				</div>
			</div>	
		</div>
		<footer id="footer" role="contentinfo">
			<div class="copyright">
				<div class="prl-container">
					<div class="left">
						&copy; 2014 by <a href="#">Andhra magazine</a> | Buzz INFO | Entertainment site!
					</div>
					<div class="right">
						Designed by <a href="#">Coding World</a>
					</div>
				</div>
			</div><!-- .copyright -->	
		</footer><!-- #footer -->
	</div><!-- .site-wrapper -->
	<a id="toTop" href="#"><i class="fa fa-long-arrow-up"></i></a>
	<script src="assets/js/superfish.js"></script>
    <script src="assets/js/jflickrfeed.min.html"></script>
    <script src="assets/js/jqinstapics.min.html"></script>
	<script src="assets/js/jquery.jAccordion.html"></script>
	<script src="assets/js/jquery.jTab.html"></script>
	<script src="assets/flexslider/jquery.flexslider-min.js"></script>
	<script src="assets/js/jquery.fitvids.html"></script>
	<script src="assets/js/jquery.masonry.min.js"></script>
	<script src="assets/js/jquery.gmap.min.html"></script>
	
	<script src="assets/js/plugins.js"></script>
	</body>
</html>       
        