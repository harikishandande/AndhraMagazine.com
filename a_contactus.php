<?php
session_start();
include('includes/article.php');
include('includes/connection.php');
	if(isset($_SESSION['admin']))
	{	
		if(isset($_GET['delete_message']))
		{
			$id = $_GET['delete_message'];
				
				$sql = "DELETE FROM contactus WHERE id = ? ";
				$query = $pdo->prepare($sql);
				$query->bindValue("1", $id);
				$query->execute();
				
			header('Location: a_contactus.php');
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
				<div class="prl-header-right">
					<span class="prl-header-custom-text"> <strong style="text-transform:capital;"><a class="" href="a_index.php"></i><i class="fa fa-user"></i><?php echo $_SESSION['username']; ?></a></strong></span>
					<span class="prl-header-time"> <strong style="text-transform:capital;"><a class="" href="logout.php"><i class="fa fa-share"></i> LogOut</a></strong></span>
				</div>	
			</header>

			<style>
				a:hover{color:#fff;}
			</style>
			
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
							<li ><a href="a_index.php"><i class="fa fa-home"></i> Add User</a>
							<li ><a href="a_all_movies.php"><i class="fa fa-film"></i> View Movies</a></li>
							<li ><a href="a_all_politicals.php"><i class="fa fa-bullhorn"></i>View Political</a></li>
							<li >
								<a href="a_all_polls.php"><i class="fa fa-flag"></i>View Polls</a>
								<ul>
									<li><a href="a_all_polls.php">Add poll</a></li>
									<li><a href="a_single_poll.php">Add Choice</a></li>
								</ul>
							</li>
							<li ><a href="a_all_gallery.php"><i class="fa fa-camera"></i>View Gallary</a></li>
							<li class="menu_item-home current"><a href="a_contactus.php"><i class="fa fa-envelope"></i> Contact Us</a></li>				
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
					<a href="a_index.php">Add User</a>
				</li>
				<li class="nav-item">
					<a href="a_all_movies.php">View Movies</a>
				</li>
				<li class="nav-item">
					<a href="a_all_politicals.php">View Political</a>
				</li>
				<li class="nav-item">
					<a href="a_all_polls.php">Add Poll</a>
					<ul class="nav-submenu">
						<li class="nav-submenu-item">
							<a href="a_all_polls.php">Add Polls</a>
						</li>
						<li class="nav-submenu-item">
							<a href="a_single_poll.php">Add Choices</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="a_all_gallery.php">View Gallery</a>
				</li>
				<li class="nav-item">
					<a href="contactus.php">Contact Us</a>
				</li>
			</ul>
		</nav>
		
</div></div>
		</div>

		<div class="prl-container">
			<div class="prl-grid prl-grid-divider">   
				<section id="main">
					 <h5 class="prl-block-title">Messages</h5>
					<ul class="prl-comment-list">
					<?php	$message = new Article;
							$messages = $message->fetch_contactus();
							foreach($messages as $message)
							{
								$id = $message['id'];
								$name = $message['name'];
								$email = $message['email'];
								$subject = $message['subject'];
								$single_message = $message['message'];
								$time_stamp = $message['time_stamp'];
					?>	<li>
							<article class="prl-comment">
								<header class="prl-comment-header">
									<img class="prl-comment-avatar" src="50.jpg" alt="">
									<h4 class="prl-comment-title"><?php echo $subject; ?><a href="a_contactus.php?delete_message=<?php echo $id; ?>" style="float:right;font-size:15px;color:red;margin-right:15px;" title="Delete Message" >x</a></h4>
									<div class="prl-comment-meta">Written by <?php echo $name; ?> on <?php echo date('D F j\t\h, H:i a, Y',strtotime($time_stamp)); ?></div>
								</header>
								<div class="prl-comment-body">
									<p><?php echo $single_message; ?></p>
								</div>
							</article>
						</li>
					<?php 	}	?>
					</ul>
				</section>
			</div> 
		</div>
		<footer id="footer" role="contentinfo">
			<div class="footer-widget">
				<div class="prl-container">
					<div class="prl-grid prl-grid-divider">
				
					</div>
				</div>
			</div>
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
<?php 
	}
?>       