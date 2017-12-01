<?php
session_start();
include('includes/article.php');
include('includes/connection.php');
	if(isset($_SESSION['admin']))
	{	
	
		if(isset($_SESSION['article_status']))
		{
			if($_SESSION['article_status'] == 1)
			{
				$_SESSION['article_status'] = NULL;
				$success='Article uploaded successfully !!';
			}
			else if($_SESSION['article_status'] == 0)
			{
				$_SESSION['article_status'] = NULL;
				$error='Image file size must be less than 2 MB !!';
			}
			else if($_SESSION['article_status'] == 2)
			{
				$_SESSION['article_status'] = NULL;
				$error='Image file already exist !!';
			}
		}

		if(isset($_POST['movie_article']))
		{
			$movie_title = $_POST['movie_title'];
			$_SESSION['movie_title'] = $movie_title;
			$movie_description = $_POST['movie_description'];
			$movie_tags = $_POST['movie_tags'];
			$_SESSION['movie_tags'] = $movie_tags;
			
			if(empty($movie_title) || empty($movie_description) || empty($movie_tags))
			{
				$error='All fields are required !!';
			}
			else
			{
				$movie_username = $_SESSION['username'];
				$query = $pdo->prepare('INSERT into movies(movie_title,movie_description,movie_tags,movie_username,movie_time_stamp)values(?,?,?,?,?)');
					$query->bindValue(1, $movie_title);
					$query->bindValue(2, $movie_description);
					$query->bindValue(3, $movie_tags);
					$query->bindValue(4, $movie_username);
					$query->bindValue(5, date('Y-m-d H:i:s'));
					$result = $query->execute();
				
				$tags = explode(',', $movie_tags);
				$size = sizeof($tags);
				for($i = 0;$i < $size;$i++)
				{
					$query = $pdo->prepare('INSERT into tags(tags)values(?)');
					$query->bindValue(1, $tags[$i]);
					$query->execute();
				}
				
				if($result)
				{
					$query = $pdo->prepare('INSERT into views(article_title)values(?)');
					$query->bindValue(1, $movie_title);
					$query->execute();
					
					header('Location: a_movie_img_upload.php');
				}
				else
				{
					$error='Article already exist !!';
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
	
	<!-- FOR MULTI IMAGE -->
	<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
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
							<li class="menu_item-home current"><a href="a_all_movies.php"><i class="fa fa-film"></i> View Movies</a></li>
							<li ><a href="a_all_politicals.php"><i class="fa fa-bullhorn"></i>View Political</a></li>
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
			
			<?php 	if(isset($error))
					{ 	?>
						<h4 style ="color:#ff0000;text-align:center"><?php echo $error; ?> </h4>
			<?php	} 	
					if(isset($success))
					{ ?>
						<h4 style ="color:green;text-align:center"><?php echo $success; ?> </h4>
			  <?php } ?>
			  
					<h5 class="prl-block-title alizarin">Add Movies</h5>
						<form role="form" action="a_all_movies.php" method="post">
							<div class="prl-form-row prl-login-username">
								<label>Movie Title &nbsp;&nbsp;[<small style="color:red;">&nbsp;&nbsp;Remember movie title to upload images&nbsp;&nbsp;</small>]</label>
								<input type="text" placeholder="Movie Title" name="movie_title" class="prl-width-1-1"> 
							</div>
							<div class="prl-form-row prl-login-username">
								<label>Movie Description</label>
								<textarea placeholder="Movie Description" name="movie_description" id="textarea" rows="3" style="height:150px"></textarea>
							</div>
							<br/>
							<div class="prl-form-row prl-login-password">
								<label>Movie Tags</label>
								<input type="text" placeholder="Movie Tags [ add more tags with , separated ]" name="movie_tags" class="prl-width-1-1">
							</div>	
							<div class="prl-form-row">
								<button class="prl-button prl-button-primary" name="movie_article" type="submit">Add Movie Article</button>
							</div>
						</form>
					<br/>	
					<div class="prl-homepage-widget">
						<h5 class="prl-block-title alizarin">View Movies</h5>
						<br/>
						<div class="prl-grid prl-grid-divider"> 
						<?php
							
							$movie_article =  new Article;
							$movie_articles = $movie_article->fetch_movie_article_all();
							$i=0;
							foreach($movie_articles as $movie_article)
							{
								$movie_title = $movie_article['movie_title'];
									$count = new Article;
									$movie_count = $count->fetch_movie_article_count($movie_title);
									$article_count = $movie_count['article_count'];
									
									$view = new Article;
									$movie_view = $view->fetch_movie_article_view_count($movie_title);
									$view_count = $movie_view['view_count'];
								$movie_description = $movie_article['movie_description'];
								$movie_image = $movie_article['movie_image'];
								$array = explode(',', $movie_image);
								$movie_cover = $array[0];
								$movie_tags = $movie_article['movie_tags'];
								$tags = explode(',', $movie_tags);
								$movie_username = $movie_article['movie_username'];
								$movie_time_stamp = $movie_article['movie_time_stamp'];
								if($i%2 == 1)
								{	
						?>			</div>
									<div class="prl-grid prl-grid-divider">
						<?php	}
						?>	<div class="prl-span-6">
								<div class="prl-post-content">
									<a  href="a_single_movie_post.php?movie_title=<?php echo $movie_title; ?>" class="prl-thumbnail">
										<span class="prl-overlay">
											<img src="movie_articles/<?php echo $movie_cover; ?>" alt="Test">
											<span class="prl-overlay-area o-photo"></span>
										</span>
									</a>    
									<h3><a href="a_single_movie_post.php?movie_title=<?php echo $movie_title; ?>"><?php echo $movie_title; ?></a> <span class="prl-badge prl-badge-warning" style="font-weight:normal">Images</span></h3> 
									<div class="prl-article-meta">
										<i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $movie_username; ?>
										&nbsp;&nbsp;
										<i class="fa fa-calendar-o"></i>&nbsp;<?php echo date('D F j\t\h, Y',strtotime($movie_time_stamp)); ?>
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
								<?php	$movie_description = strip_tags($movie_description);

									if (strlen($movie_description) > 500) {

										// truncate string
										$stringCut = substr($movie_description, 0, 230);

										$movie_description = substr($stringCut, 0, strrpos($stringCut, ' '))."... <a href='a_single_movie_post.php?movie_title=$movie_title'>Read More</a>"; 
									}
								?>									
									<p><?php echo $movie_description; ?></p>
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
?>       