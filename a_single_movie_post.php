<?php
session_start();
include('includes/article.php');
include('includes/connection.php');

	if(isset($_GET['delete_title']))
	{
		$movie_title = $_GET['delete_title'];
			$sql = "DELETE FROM movies WHERE movie_title = ? ";
			$query = $pdo->prepare($sql);
			$query->bindValue("1", $movie_title);
			$query->execute();
			
			$sql = "DELETE FROM comments WHERE article_title = ? ";
			$query = $pdo->prepare($sql);
			$query->bindValue("1", $movie_title);
			$query->execute();
			
			$sql = "DELETE FROM views WHERE article_title = ? ";
			$query = $pdo->prepare($sql);
			$query->bindValue("1", $movie_title);
			$query->execute();
			
		header('Location: a_all_movies.php');
	}
	if(isset($_GET['movie_title']))
	{
		$_SESSION['movie_title'] = $_GET['movie_title'];
	}
	if(isset($_SESSION['admin']) && isset($_SESSION['movie_title']))
	{	
		if(isset($_GET['post_comment']))
		{	
			$movie_title = $_SESSION['movie_title'];
			$name = $_GET['name'];
			$email = $_GET['email'];
			$spam = $_GET['spam'];
			$comment = $_GET['comment'];
			if(empty($name) || empty($email) || empty($spam) || empty($comment))
			{
				$error='All fields are required !!';
			}
			else if($spam == 'T292')
			{
				$query = $pdo->prepare('INSERT into comments(article_title,name,email,comment,comment_time_stamp)values(?,?,?,?,?)');
					$query->bindValue(1, $movie_title);
					$query->bindValue(2, $name);
					$query->bindValue(3, $email);
					$query->bindValue(4, $comment);
					$query->bindValue(5, date('Y-m-d H:i:s'));
					$result = $query->execute();
					
					$success='commented successfully !!';
			}
			else
			{
				$error='Captcha you entered is wrong !!';
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
	
	<!-- CARASOUL -->
	
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' />
	<noscript>
		<style>
			.es-carousel ul{
				display:block;
			}
		</style>
	</noscript>
	<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
		<div class="rg-image-wrapper">
			{{if itemsCount > 1}}
				<div class="rg-image-nav">
				<a href="#" class="rg-image-nav-prev">Previous Image</a>
					<a href="#" class="rg-image-nav-next">Next Image</a>
				</div>
			{{/if}}
			<div class="rg-image"></div>
			<div class="rg-loading"></div>
			<div class="rg-caption-wrapper">
				<div class="rg-caption" style="display:none;">
					<p></p>
				</div>
			</div>
		</div>
	</script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.tmpl.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.elastislide.js"></script>
	<script type="text/javascript" src="js/gallery.js"></script>
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
			<?php
					$movie_title = $_SESSION['movie_title'];
					$movie_article =  new Article;
					$movie_articles = $movie_article->fetch_movie_article($movie_title);
					$i=0;
					
						$movie_title = $movie_articles['movie_title'];
							$count = new Article;
							$movie_count = $count->fetch_movie_article_count($movie_title);
							$article_count = $movie_count['article_count'];
							
							$view = new Article;
							$movie_view = $view->fetch_movie_article_view_count($movie_title);
							$view_count = $movie_view['view_count'];
						$movie_description = $movie_articles['movie_description'];
						$movie_image = $movie_articles['movie_image'];
						$array = explode(',', $movie_image);
						
						$movie_tags = $movie_articles['movie_tags'];
						$tags = explode(',', $movie_tags);
						$movie_username = $movie_articles['movie_username'];
						$movie_time_stamp = $movie_articles['movie_time_stamp'];
			?>			
			<article id="article-single"> 
				<h1><a href="a_single_movie_post.php?movie_title=<?php echo $_SESSION['movie_title']; ?>"><?php echo $movie_title; ?><a href="a_single_movie_post.php?delete_title=<?php echo $movie_title; ?>" style="float:right;font-size:15px;color:red;">Delete</a><a href="a_single_movie_post_edit.php?edit_title=<?php echo $movie_title; ?>" style="float:right;font-size:15px;color:blue;margin-right:20px;">Edit</a></h1></a>
				
				<hr class="prl-grid-divider">
				<div class="prl-grid">	
					<div class="prl-span-9 prl-span-flip">
								<?php 	if(isset($error))
										{ 	?>
											<h4 style ="color:#ff0000;text-align:center"><?php echo $error; ?> </h4>
								<?php	} 	
										if(isset($success))
										{ ?>
											<h4 style ="color:green;text-align:center"><?php echo $success; ?> </h4>
								  <?php } ?>
						<div class="prl-entry-content">
							<div class="space-bot">
								<div id="rg-gallery">
									<!-- Elastislide Carousel Thumbnail Viewer -->
									<div class="es-carousel-wrapper">
										<div class="es-nav">
											<span class="es-nav-prev">Previous</span>
											<span class="es-nav-next">Next</span>
										</div>
										<div class="es-carousel">
											<ul>
										<?php
											for($i=0;$i < sizeof($array);$i++)
											{
										?>		<li><a href="#"><img src="movie_articles/<?php echo $array[$i]; ?>" data-large="movie_articles/<?php echo $array[$i]; ?>" /></a></li>
									<?php	}	?>
											</ul>
										</div>
									</div>
									<!-- End Elastislide Carousel Thumbnail Viewer -->
								</div><!-- rg-thumbs -->
							</div>
							<p><?php echo $movie_description; ?></p>
						</div> <!-- .prl-entry-content -->
					</div>
					<div class="prl-span-3 prl-entry-meta">
						<div class="prl-article-meta">
						<p class="rating-head">Details</p>
							<p style='font-size: 8pt;'><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;<?php echo date('D F j\t\h, Y',strtotime($movie_time_stamp)); ?></p> 
							<p style='font-size: 8pt;'><i class="fa fa-comment-o"></i> <?php echo $article_count; ?></p>
							<p style='font-size: 8pt;'><i class="fa fa-eye"></i> <?php echo $view_count; ?></p>
							<hr class="prl-article-divider">
							<div id="tag_cloud-2" class="widget widget_tag_cloud prl-panel"><p class="rating-head">Tags</p>
								<div class="tagcloud">
									<?php
										$size = sizeof($tags);
										for($i=0;$i < $size;$i++)
										{
											$tag = $tags[$i];
											if($i == $size-1){
									?>			<a href='#' class='tag-link-3' title='1 topic' style='font-size: 8pt;'><?php echo $tag; ?></a>
									<?php	}else{
									?>			<a href='#' class='tag-link-3' title='2 topic' style='font-size: 8pt;'><?php echo $tag; ?></a>
								<?php		}
										}
								?>
								</div>
							</div>
						</div>
						<hr class="prl-article-divider">
							<ul class="prl-list prl-list-sharing">
								<li class="header">SHARING</li>
								<li><a href="#"><i class="fa fa-facebook-square"></i> Facebook</a></li>
								<li><a href="#"><i class="fa fa-twitter-square"></i> Twitter</a></li>
								<li><a href="#"><i class="fa fa-google-plus-square"></i> Google plus</a></li>
								<li><a href="#" onclick="window.print();" id="print-page" ><i class="fa fa-print"></i> Print this article</a></li>
							</ul>
					</div>
			   
				</div> <!-- .prl-grid -->
			</article>
			 <div id="comment" class="prl-panel">
			<h5 class="prl-block-title"><?php echo $article_count; ?> comments</h5>
				<ul class="prl-comment-list">
				<?php	$comment = new Article;
						$comments = $comment->fetch_comments($movie_title);
						foreach($comments as $comment)
						{
							$name = $comment['name'];
							$email = $comment['email'];
							$comment_time_stamp = $comment['comment_time_stamp'];
							$single_comment = $comment['comment'];
				?>	<li>
						<article class="prl-comment">
							<header class="prl-comment-header">
								<img class="prl-comment-avatar" src="50.jpg" alt="">
								<h4 class="prl-comment-title"><?php echo $name; ?></h4>
								<div class="prl-comment-meta">Written by <?php echo $email; ?> on <?php echo date('D F j\t\h, H:i a, Y',strtotime($comment_time_stamp)); ?></div>
							</header>
							<div class="prl-comment-body">
								<p><?php echo $single_comment; ?></p>
							</div>
						</article>
					</li>
				<?php 	}	?>
				</ul>
				<div id="respond">
					<h5 class="prl-block-title">Leave a reply</h5>
					<form class="prl-form prl-form-stacked">
						<fieldset>
							<div class="prl-grid">
								<form role="form" action="a_single_movie_post.php" method="post">
									<div class="prl-span-6">
										<div class="prl-form-row">
											<label class="prl-form-label" for="article_title">Article Title</label>
											<div class="prl-form-controls ">
												<input id="article_title" type="text" value="<?php echo $movie_title;?>" disabled >
											</div>
										</div>
										<div class="prl-form-row">
											<label class="prl-form-label" for="email">Email *</label>
											<div class="prl-form-controls prl-comment-email">
												<input type="text" name="email" >
											</div>
										</div>
									</div>
									<div class="prl-span-6">
										<div class="prl-form-row">
											<label class="prl-form-label" for="name">Name *</label>
											<div class="prl-form-controls prl-comment-name">
												<input type="text" name="name" >
											</div>
										</div>
										<div class="prl-form-row">
											<label class="prl-form-label" for="anti-spam">Anti-Spam *</label>
											<div class="prl-form-controls">
												<input type="text" name="spam" class="prl-form-width-small" >
												<span class="prl-form-help-inline"><img src="assets/images/spam.png" alt="anti spam"></span>
											</div>
										</div>
									</div>
									<div class="prl-span-12">
										<div class="prl-form-row space-top">
											<label class="prl-form-label" for="form-s-t">Comment *</label>
											<div class="prl-form-controls">
												<textarea cols="30" rows="8" name="comment" class="prl-width-1-1"></textarea>
											</div>
										</div>
									</div>
									<div class="prl-span-12">
										<div class="prl-form-row space-top">
											<button class="prl-button prl-button-primary" name="post_comment" type="submit">Submit</button>
											<em class="prl-form-help-inline">Required fields are marked (*)</em>
										</div>
									</div>
								</form>
							</div>
						</fieldset>
					</form>
				</div>
			</div><!-- #comment -->			  
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