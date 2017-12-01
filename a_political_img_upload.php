<?php
session_start();
include('includes/article.php');
include('includes/connection.php');
	if(isset($_SESSION['admin']) && isset($_SESSION['political_title']) && isset($_SESSION['political_tags']))
	{	
		if(isset($_FILES['files']))
		{
			$errors= array();
			
			foreach($_FILES['files']['tmp_name'] as $key => $tmp_name )
			{
				$randstr = ""; 
				  for($i=0; $i<7; $i++){ 
					 $randnum = mt_rand(0,61); 
					 if($randnum < 10){ 
						$randstr .= chr($randnum+48); 
					 }else if($randnum < 36){ 
						$randstr .= chr($randnum+55); 
					 }else{ 
						$randstr .= chr($randnum+61); 
					 } 
				  } 
				  echo $randstr; 
				$file_name = $randstr.$_FILES['files']['name'][$key];
				$file_size =$_FILES['files']['size'][$key];
				$file_tmp =$_FILES['files']['tmp_name'][$key];
				$file_type=$_FILES['files']['type'][$key];	
				if($file_size > 5242880)
				{
					$_SESSION['article_status'] = 0;
					header('Location: a_all_politicals.php');
					exit();
				}
				else
				{
					$desired_dir="political_articles";
					if(empty($errors)==true)
					{
						if(is_dir($desired_dir)==false)
						{
							mkdir("$desired_dir", 0700);		// Create directory if it does not exist
						}
						if(is_dir("$desired_dir/".$file_name)==false)
						{
							if(empty($political_image))
							{
								$political_image = $file_name;
							}
							else
							{
								$political_image = $political_image . "," . $file_name;
							}
							move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
						}
						else
						{		
							$_SESSION['article_status'] = 2;
							header('Location: a_all_political.php');
							exit();		
						}		
					}
				}
			}
			
			$political_title = $_SESSION['political_title'];
			$query = $pdo->prepare('UPDATE political SET political_image = ? , political_time_stamp = ? WHERE political_title = ? ');
				$query->bindValue(1, $political_image);
				$query->bindValue(2, date('Y-m-d H:i:s'));
				$query->bindValue(3, $political_title);
				$query->execute();
			
			$_SESSION['political_title'] = NULL;
			$_SESSION['political_tags'] = NULL;

			if(empty($error))
			{
				$_SESSION['article_status'] = 1;
				header('Location: a_all_politicals.php');
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
	
	<!-- FOR MULTI IMAGE -->
	
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
							<li class="menu_item-home current"><a href="a_all_politicals.php"><i class="fa fa-bullhorn"></i>View Political</a></li>
							<li >
								<a href="a_all_polls.php"><i class="fa fa-flag"></i>View Polls</a>
								<ul>
									<li><a href="a_all_polls.php">Add poll</a></li>
									<li><a href="a_single_poll.php">Add Choice</a></li>
								</ul>
							</li>
							<li ><a href="a_all_gallery.php"><i class="fa fa-camera"></i>View Gallary</a></li>
							<li ><a href="a_contactus.php"><i class="fa fa-envelope"></i> Contact Us</a></li>				
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
				
				<section id="main" class="prl-span-12">
					<h5 class="prl-block-title alizarin">Add Politicals</h5>
						<div class="prl-form-row prl-login-username">
							<label>Political Title</label>
							<input type="text" placeholder="" name="" value="<?php echo $_SESSION['political_title']; ?>" class="prl-width-1-1" disabled>
						</div>
						<br/>
						<div class="prl-form-row prl-login-password">
							<label>Political Tags</label>
							<input type="text" placeholder="" name="" value="<?php echo $_SESSION['political_tags']; ?>" class="prl-width-1-1" disabled>
						</div>
						<br/>
						<form action="a_political_img_upload.php" method="POST" enctype="multipart/form-data">
							<input type="file" name="files[]" multiple/>
							<input type="submit"/>
						</form>						
					<hr/>
					<div class="prl-homepage-widget">
						<h5 class="prl-block-title alizarin">View Politicals</h5>
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
								$political_username = $political_article['political_username'];
								$political_time_stamp = $political_article['political_time_stamp'];
								if($i%2 == 1)
								{	
						?>			</div>
									<div class="prl-grid prl-grid-divider">
						<?php	}
						?>	<div class="prl-span-6">
								<div class="prl-post-content">
									<a  href="a_single_political_post.php?political_title=<?php echo $political_title; ?>" class="prl-thumbnail">
										<span class="prl-overlay">
											<img src="political_articles/<?php echo $political_cover; ?>" alt="Test">
											<span class="prl-overlay-area o-photo"></span>
										</span>
									</a>    
									<h3><a href="a_single_political_post.php?political_title=<?php echo $political_title; ?>"><?php echo $political_title; ?></a> <span class="prl-badge prl-badge-warning" style="font-weight:normal">Images</span></h3> 
									<div class="prl-article-meta">
										<i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $political_username; ?>
										&nbsp;&nbsp;
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

										$political_description = substr($stringCut, 0, strrpos($stringCut, ' '))."... <a href='a_single_political_post.php?political_title=$political_title'>Read More</a>"; 
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
<?php 
	}
	else
	{
		header('Location: error/page_error.php');
	}
?>       