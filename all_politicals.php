<?php
session_start();
include('includes/article.php');
include('includes/connection.php');

if(isset($_POST['login']))
{ 
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(empty($username) || empty($password))
	{
		$error = 'All fields are required !!';
	}
	else
	{
		$query = $pdo -> prepare("SELECT * FROM admin WHERE username = ? AND password= ?");
		$query->bindValue(1, $username);
		$query->bindValue(2, $password);
		$query->execute();
		$num = $query->rowCount();
		if($num==1)
		{	
			$_SESSION['username'] = $username;
			$_SESSION['admin'] = true;
			header('Location: a_index.php');
			exit();
		}
		if(!isset($_SESSION['username']))
		{
			$error = 'Incorrect login details !!';
		}
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
							<li class="menu_item-home current"><a href="all_politicals.php"><i class="fa fa-bullhorn"></i> Political</a></li>
							<li ><a href="all_polls.php"><i class="fa fa-flag"></i> Polls</a></li>
							<li ><a href="all_gallery.php"><i class="fa fa-camera"></i> Gallary</a></li>	
							<li ><a href="contactus.php"><i class="fa fa-envelope"></i> Contact Us</a></li>								
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
			<div class="prl-grid prl-grid-divider"> 
				<section id="main" class="prl-span-12">
					<div id="sliderTab">
						<div id="mainFlexslider" class="slider_content flexslider" >
							<ul class="slides">
							<?php
							
								$political_scroll =  new Article;
								$political_scroller = $political_scroll->fetch_political_article_all();
								$i=0;
								foreach($political_scroller as $political_scroll)
								{
									$political_title = $political_scroll['political_title'];
										$count = new Article;
										$political_count = $count->fetch_political_article_count($political_title);
										$article_count = $political_count['article_count'];
										
										$view = new Article;
										$political_view = $view->fetch_political_article_view_count($political_title);
										$view_count = $political_view['view_count'];
									$political_description = $political_scroll['political_description'];
									$political_image = $political_scroll['political_image'];
									$array = explode(',', $political_image);
									$political_cover = $array[0];
									$political_tags = $political_scroll['political_tags'];
									$tags = explode(',', $political_tags);
									$political_time_stamp = $political_scroll['political_time_stamp'];
							
									if($i == 8)
									{ break; }
							?>
									<li>
										<article> 
											<div class="slider_title">
												<div class="slider-post-meta">
													<span class="prl-post-rating">
														<i class="fa fa-eye"></i>&nbsp;<?php echo $view_count; ?> views
													</span> 
													<i class="fa fa-comment-o"></i> <?php echo $article_count; ?> comments
												</div>
												<h2><a href="single_political_post.php?political_title=<?php echo $political_title; ?>"><?php echo $political_title; ?></a></h2>
											</div>
											<a href="single_political_post.php?political_title=<?php echo $political_title; ?>"><img src="political_articles/<?php echo $political_cover; ?>" alt="slider"></a>
									   </article>
									</li>
						<?php		$i++;
								}	?>
							</ul>
							<script type="text/javascript">
								$(function(){
									$('#mainFlexslider').flexslider({
										animation: "fade",
										prevText: '<i class="fa fa-angle-left icon-large"></i>', 
										nextText: '<i class="fa fa-angle-right icon-large"></i>', 
										manualControls: "#main-slider-control-nav li"
									});
								});
							</script>
						</div>
						<div class="slider_tabs">
							<ul class="tabs" id="main-slider-control-nav">
								<?php
							
								$political_scroll =  new Article;
								$political_scroller = $political_scroll->fetch_political_article_all();
								$i=0;
								foreach($political_scroller as $political_scroll)
								{
									$political_title = $political_scroll['political_title'];
							
									if($i == 8)
									{ break; }
							?>
									<li><div class="tab_content"><a href="#"><?php echo $political_title; ?></a></div></li>
						<?php		$i++;
								}	?>
							</ul>
						</div>
						<div class="clear"></div>
					</div>
				</section>
				<section id="main" class="prl-span-9">
					<div class="prl-homepage-widget">
						<h5 class="prl-block-title alizarin">View Political</h5>
						<br/>
						<div class="prl-grid prl-grid-divider"> 
						<?php
							
							$political_article =  new Article;
							$political_articles = $political_article->fetch_political_article_all();
							$i=0;
							foreach($political_articles as $political_article)
							{
								$political_title = $political_article['political_title'];
									$count = new Article;
									$political_count = $count->fetch_political_article_count($political_title);
									$article_count = $political_count['article_count'];
									
									$view = new Article;
									$political_view = $view->fetch_political_article_view_count($political_title);
									$view_count = $political_view['view_count'];
								$political_description = $political_article['political_description'];
								$political_image = $political_article['political_image'];
								$array = explode(',', $political_image);
								$political_cover = $array[0];
								$political_tags = $political_article['political_tags'];
								$tags = explode(',', $political_tags);
								$political_time_stamp = $political_article['political_time_stamp'];
								if($i%2 == 1)
								{	
						?>			</div>
									<div class="prl-grid prl-grid-divider">
						<?php	}
						?>	<div class="prl-span-6">
								<div class="prl-post-content">
									<a  href="single_political_post.php?political_title=<?php echo $political_title; ?>" class="prl-thumbnail">
										<span class="prl-overlay">
											<img src="political_articles/<?php echo $political_cover; ?>" alt="Test">
											<span class="prl-overlay-area o-photo"></span>
										</span>
									</a>    
									<h3><a href="single_political_post.php?political_title=<?php echo $political_title; ?>"><?php echo $political_title; ?></a> <span class="prl-badge prl-badge-warning" style="font-weight:normal">Images</span></h3> 
									<div class="prl-article-meta">
										<i class="fa fa-calendar-o"></i>&nbsp;<?php echo date('D F j\t\h, Y',strtotime($political_time_stamp)); ?>
										&nbsp;&nbsp;
										<i class="fa fa-comment-o"></i>&nbsp;<?php echo $article_count; ?>
										&nbsp;&nbsp;<i class="fa fa-eye"></i>&nbsp;<?php echo $view_count; ?>
										&nbsp;&nbsp;<i class="fa fa-tags"></i>&nbsp;
										<?php 
											$size = sizeof($tags);
											for($i=0;$i < $size;$i++)
											{
												$tag = $tags[$i];
												if($i == $size-1)
													echo $tag;
												else
													echo $tag." , ";
											}
										?>
									</div>  
							<?php	$political_description = strip_tags($political_description);

									if (strlen($political_description) > 500) {

										// truncate string
										$stringCut = substr($political_description, 0, 230);

										$political_description = substr($stringCut, 0, strrpos($stringCut, ' '))."... <a href='single_political_post.php?political_title=$political_title'>Read More</a>"; 
									}
								?>
									<p><?php echo $political_description; ?></p>
								</div>
								<hr class='prl-grid-divider'>
							</div>
						<?php	$i++;
							}
						?>
						</div> 
					</div>    
				</section>
				<aside id="sidebar" class="prl-span-3">
						<div id="login-3" class="widget widget-login prl-panel">
							<h5 class="prl-block-title">Login</h5>
							<div>
								 <form role="form" action="index.php" method="POST" enctype="multipart/form-data">
									<div class="prl-form-row prl-login-username">
										<input type="text" placeholder="Username" name="username" class="prl-width-1-1">
									</div>
									<div class="prl-form-row prl-login-password">
										<input type="password" placeholder="Password" name="password" class="prl-width-1-1">
									</div>	
									<div class="prl-form-row">
										<button class="prl-button prl-button-primary" name="login" type="submit">Login</button>
									</div>
								</form>	
							</div>
						</div>
					<div id="post-pic-widget" class="widget photos-widget prl-panel">	
						<h5 class="prl-block-title">Recent Gallery</h5>
						<div class="pt-wrapper">
							<div class="pt-inner prl-clearfix">
								<a href="single.html" ><img src="assets/images/_small/1.jpg" alt="Lorem ipsum dolor sit amet" /></a>
								<a href="single.html" ><img src="assets/images/_small/2.jpg" alt="Lorem ipsum dolor sit amet" /></a>
								<a href="single.html" ><img src="assets/images/_small/3.jpg" alt="Lorem ipsum dolor sit amet" /></a>
								<a href="single.html" ><img src="assets/images/_small/4.jpg" alt="Lorem ipsum dolor sit amet" /></a>
								<a href="single.html" ><img src="assets/images/_small/5.jpg" alt="Lorem ipsum dolor sit amet" /></a>
								<a href="single.html" ><img src="assets/images/_small/6.jpg" alt="Lorem ipsum dolor sit amet" /></a>
							</div>
						</div>
					</div>	
					<div id="tag_cloud-2" class="widget widget_tag_cloud prl-panel"><h5 class="prl-block-title">Tags</h5>
						<div class="tagcloud"><a href='http://www.presslayer.com/?tag=artwork' class='tag-link-6' title='2 topics' style='font-size: 16.4pt;'>Artwork</a>
							<a href='http://www.presslayer.com/?tag=photo' class='tag-link-7' title='2 topics' style='font-size: 16.4pt;'>Photo</a>
							<a href='http://www.presslayer.com/?tag=video' class='tag-link-9' title='3 topics' style='font-size: 22pt;'>Video</a>
							<a href='http://www.presslayer.com/?tag=videos' class='tag-link-4' title='1 topic' style='font-size: 8pt;'>Videos</a>
							<a href='http://www.presslayer.com/?tag=videos' class='tag-link-3' title='1 topic' style='font-size: 8pt;'>Music</a>
							<a href='http://www.presslayer.com/?tag=videos' class='tag-link-3' title='1 topic' style='font-size: 8pt;'>HTML5</a>
							<a href='http://www.presslayer.com/?tag=videos' class='tag-link-3' title='1 topic' style='font-size: 8pt;'>CSS3</a>
							<a href='http://www.presslayer.com/?tag=videos' class='tag-link-3' title='1 topic' style='font-size: 8pt;'>Web Design</a>
						</div>
					</div>
				</aside>
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