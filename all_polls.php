<?php
   session_start();
   include_once('includes/connection.php');
   include_once('includes/article.php');
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
					<span class="prl-header-custom-text"><i class="fa fa-phone-square"></i>8686401033</span>
					<span class="prl-header-time"><i class="fa fa-clock-o"></i> Monday - Nov 12th, 2013</span>
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
							<li class="menu_item-home current"><a href="all_polls.php"><i class="fa fa-flag"></i> Polls</a></li>
							<li ><a href="all_gallery.php"><i class="fa fa-camera"></i> Gallary</a></li>	
							<li ><a href="contactus.php"><i class="fa fa-envelope"></i> Contact Us</a></li>								
						</ul>

						<a href="#" class="prl-nav-toggle prl-nav-menu" title="Nav" data-prl-offcanvas="{target:'#offcanvas'}"></a>
						<div class="prl-nav-flip">
							<a href="#" class="prl-nav-toggle prl-nav-toggle-search" title="Search" data-prl-offcanvas="{target:'#offcanvas-search'}"></a>
						</div> 
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
				<section id="main" class="prl-span-9">
					<div class="prl-homepage-widget">
						<h5 class="prl-block-title alizarin">Polls</h5>
						<div class="prl-grid prl-grid-divider"> 
							
							<?php 
							
							$function = new Article;
							$functions = $function->allpolls();
							$number = 0;
							
								foreach ($functions as $function)
								{	
									$function4 = new Article;
									$functions4 = $function4->allpollschoices($function['id']);
									$choices = 1;
									foreach ($functions4 as $function4)
									{
										$choices++;
									}
									if($choices >1)
									{
									$number++;
									if($number ==3)
										{ ?>
											<hr class="prl-grid-divider">
										
							<?php		$number=1;}
									$function2 = new Article;
									$functions2 = $function2->noofvotes($function['id']);
									$voters = 0;
									foreach ($functions2 as $function2)
									{
										$voters++;
									}
								?>
								
								<div class="prl-span-6">
									<div class="prl-post-content">
										<!-- BEGIN PROGRESS PORTLET-->
										<div class="widget purple">
											<div class="widget-title">
												<h3><a href="single_poll.php?id=<?php echo $function['id']; ?>"><?php echo $function['title'];?></a> </h3>
												<span class="tools">
													<a href="javascript:;" class="icon-chevron-down"></a>
													<a href="javascript:;" class="icon-remove"></a>
												</span>
											</div>
											
											<div class="widget-body">
												<ul class="unstyled">
													<?php
												$function1 = new Article;
												$functions1 = $function1->allpollschoices($function['id']);
												foreach ($functions1 as $function1)
												{
													$function3 = new Article;
													$functions3 = $function3->allpollsvotes($function1['id'], $function['id']);
													$votes=0;
													foreach ($functions3 as $function3)
													{
															$votes++;
													}
													if(!empty($voters))
													{
														$percentage = (100*$votes)/$voters;
													}
													else
													{
														$percentage = 0;
													}
											?>
													<li>
														<span class="btn btn-inverse"> <i class="icon-fire"></i></span><?php echo $function1['choice'];?> <strong class="label label-important"> <?php echo $percentage; ?>%</strong>
														<div class="space10"></div>
														<div class="progress progress-danger">
															<div style="width: <?php echo $percentage; ?>%;" class="bar"></div>
														</div>
													</li>
										<?php   } ?>
												</ul>
											</div>
										</div>  
														
									</div>
								</div>
								<?php 
								}
								}
								?>
							          
						</div>
						<hr class="prl-grid-divider">
									
						<div class="pagin pagin-center">
							<a href="#"><i class="fa fa-angle-double-left"></i></a>
							<a href="#">1</a>
							<a href="#" class="active">2</a>
							<a href="#">3</a>
							<a href="#">4</a>
							<a href="#">5</a>
							<a href="#"><i class="fa fa-angle-double-right"></i></a>				
						</div>        
					</div>    
				</section>
				<aside id="sidebar" class="prl-span-3">
							<div class="widget widget-recent-post prl-panel">
								<h5 class="prl-block-title">Recent posts</h5>	
								<ul class="prl-list prl-list-line">
									<li>
										<article class="clearfix">
											<a href="single.html" class="prl-thumbnail"><img src="assets/images/_small/1.jpg" width="60" height="60" alt="Praesent lectus orci"></a>
											<div>
											<h4><a href="single.html" title="">Nulla ullamcorper tellus suscipit quam tincidunt</a></h4>
											<!--<span class="prl-article-meta prl-clearfix"><i class="fa fa-calendar-o"></i> Nov 13th, 2013</span>-->
											</div>
										</article>
									</li>
									<li>
										<article class="clearfix">
											<a href="single.html" class="prl-thumbnail"><img src="assets/images/_small/2.jpg" width="60" height="60" alt="Praesent lectus orci"></a>
											<div>
											<h4><a href="single.html" title="">Pellentesque erat arcu, pulvinar vel varius blandit, pretium vel arcu</a></h4>
											<!--<span class="prl-article-meta prl-clearfix"><i class="fa fa-calendar-o"></i> Nov 13th, 2013</span>-->
											</div>
										</article>
									</li>
									<li>
										<article class="clearfix">
											<a href="single.html" class="prl-thumbnail"><img src="assets/images/_small/3.jpg" width="60" height="60" alt="Praesent lectus orci"></a>
											<div>
											<h4><a href="single.html" title="">Lorem ipsum dolor sit amet, consectetur</a></h4>
											<!--<span class="prl-article-meta prl-clearfix"><i class="fa fa-calendar-o"></i> Nov 13th, 2013</span>-->
											</div>
										</article>
									</li>
								</ul>
							</div>	
							<div id="login-3" class="widget widget-login prl-panel">
								<h5 class="prl-block-title">Login</h5>
								<div>
									<form class="prl-form">
										<div class="prl-form-row prl-login-username">
											<input type="text" placeholder="Username" class="prl-width-1-1">
										</div>
										<div class="prl-form-row prl-login-password">
											<input type="password" placeholder="Password" class="prl-width-1-1">
										</div>	
										<div class="prl-form-row">
											<button class="prl-button prl-button-primary" type="submit">Login</button>
										</div>
										<div class="prl-form-row">
											<a href="#">Lost your password?</a>
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
							<div id="search-3" class="widget widget_search prl-panel">
								<h5 class="prl-block-title">Search</h5>
								<form role="search" method="get" id="searchform" action="#" class="prl-form" >
									<div><label class="screen-reader-text" for="s">Search for:</label>
									<input type="text" value="" name="s" id="s" />
									<input type="submit" id="searchsubmit" value="Search" />
									</div>
								</form>
							</div>				
				</aside>
			</div> 
		</div>
		<footer id="footer" role="contentinfo">
			<div class="footer-widget">
				<div class="prl-container">
					<div class="prl-grid prl-grid-divider">
						<div class="prl-span-3">
							<div class="widget widget-recent-post prl-panel">
								<h5 class="prl-block-title">Recent posts</h5>	
								<ul class="prl-list prl-list-line">
									<li>
										<article class="prl-clearfix">
											<a href="single.html" class="prl-thumbnail"><img src="assets/images/_small/1.jpg" width="60" height="60" alt=""></a>
											<div>
											<h4><a href="single.html" title="">Nulla ullamcorper tellus suscipit quam tincidunt</a></h4>
											
											</div>
										</article>
									</li>
									<li>
										<article class="prl-clearfix">
											<a href="single.html" class="prl-thumbnail"><img src="assets/images/_small/2.jpg" width="60" height="60" alt=""></a>
											<div>
											<h4><a href="single.html" title="">Pellentesque erat arcu, pulvinar vel varius blandit, pretium vel arcu</a></h4>
											
											</div>
										</article>
									</li>
									<li>
										<article class="prl-clearfix">
											<a href="single.html" class="prl-thumbnail"><img src="assets/images/_small/3.jpg" width="60" height="60" alt=""></a>
											<div>
											<h4><a href="single.html" title="">Lorem ipsum dolor sit amet, consectetur</a></h4>
											
											</div>
										</article>
									</li>
								</ul>
							</div>		
						</div>
						<div class="prl-span-3">
							<div id="social-widget-2" class="widget social-widget prl-panel">		<!-- BEGIN WIDGET -->
								<h5 class="prl-block-title carot">Social Network</h5>
								<div class="sw-wrapper">
									<div class="sw-inner prl-clearfix">
										<a href="#" class="fa fa-facebook" title="Facebook" data-prl-tooltip></a>
										<a href="https://twitter.com/#" class="fa fa-twitter" title="Twitter" data-prl-tooltip></a>
										<a href="http://www.youtube.com/#" class="fa fa-youtube" title="Youtube" data-prl-tooltip></a>
										<a href="#" class="fa fa-google-plus" title="Google plus" data-prl-tooltip></a>
									</div>
								</div>
							</div>					
							<div class="widget widget_newsletter prl-panel">
								<h5 class="prl-block-title">Newsletter</h5>
								<p>Were this world an endless plain, and by sailing eastward we could for ever reach new distances</p>
								<form class="prl-form">
									<fieldset>
										<div class="prl-form-row prl-newsletter-email"><input type="text" placeholder="" class="prl-width-1-1"></div>
										<div class="prl-form-row"><button class="prl-button prl-button-newsletter" type="submit">Subscribe</button></div>
									</fieldset>
								</form>
							</div>		
						</div>
						<div class="prl-span-3">
							<div id="tweets-widget-2" class="widget twitter_widget prl-panel">
								<h5 class="prl-block-title">Facebook from @PressLayer</h5>
								<ul id="twitter_list_tweets-widget-2" class="prl-list prl-list-line">
									<li>Freebie Friday: Free Marketplace Files for May&nbsp;<a href="http://t.co/ovNcdbkQgm">http://t.co/ovNcdbkQgm</a> <em>&mdash; 3 hours ago</em></li>
									<li>Outstanding New Marketplace Items: ThemeForest and 3DOcean<a href="http://t.co/cEW6KG136I">http://t.co/cEW6KG136I</a> <em>&mdash; 1 day ago</em></li>
									<li>@<a href="http://twitter.com/skjreilly">skjreilly</a>&nbsp;thanks for bringing this to our attention. We will be in touch with the Author about this. ^TC <em>&mdash; 1 day ago</em></li>
								</ul>
								<div class="tw_btn">
									<a href="https://twitter.com/PressLayer" class="twitter-follow-button" data-show-count="false">Follow @PressLayer</a>
									<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
								</div>
		  
							</div>
						</div>
						<div class="prl-span-3">
							<div id="tweets-widget-2" class="widget twitter_widget prl-panel">
								<h5 class="prl-block-title">Facebook from @PressLayer</h5>
								<ul id="twitter_list_tweets-widget-2" class="prl-list prl-list-line">
									<li>Freebie Friday: Free Marketplace Files for May&nbsp;<a href="http://t.co/ovNcdbkQgm">http://t.co/ovNcdbkQgm</a> <em>&mdash; 3 hours ago</em></li>
									<li>Outstanding New Marketplace Items: ThemeForest and 3DOcean<a href="http://t.co/cEW6KG136I">http://t.co/cEW6KG136I</a> <em>&mdash; 1 day ago</em></li>
									<li>@<a href="http://twitter.com/skjreilly">skjreilly</a>&nbsp;thanks for bringing this to our attention. We will be in touch with the Author about this. ^TC <em>&mdash; 1 day ago</em></li>
								</ul>
								<div class="tw_btn">
									<a href="https://twitter.com/PressLayer" class="twitter-follow-button" data-show-count="false">Follow @PressLayer</a>
									<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
								</div>
		  
							</div>
						</div>
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
        