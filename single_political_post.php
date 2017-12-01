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

	if(isset($_GET['post_comment']))
	{	
		$political_title = $_SESSION['political_title'];
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
				$query->bindValue(1, $political_title);
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
	if(isset($_GET['political_title']))
	{
		$_SESSION['political_title'] = $_GET['political_title'];
	}	
	if($_SESSION['political_title'])
	{
		$sql = "UPDATE views SET view_count =  view_count + 1 WHERE article_title = ? ";
			$query = $pdo->prepare($sql);

			$query->bindValue("1", $_SESSION['political_title']);
			$query->execute();
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
        <section id="main" class="prl-span-9"> 
			<?php
					$political_title = $_SESSION['political_title'];
					$political_article =  new Article;
					$political_articles = $political_article->fetch_political_article($political_title);
					$i=0;
					
						$political_title = $political_articles['political_title'];
							$count = new Article;
							$political_count = $count->fetch_political_article_count($political_title);
							$article_count = $political_count['article_count'];
							
							$view = new Article;
							$political_view = $view->fetch_political_article_view_count($political_title);
							$view_count = $political_view['view_count'];
						$political_description = $political_articles['political_description'];
						$political_image = $political_articles['political_image'];
						$array = explode(',', $political_image);
						
						$political_tags = $political_articles['political_tags'];
						$tags = explode(',', $political_tags);
						$political_username = $political_articles['political_username'];
						$political_time_stamp = $political_articles['political_time_stamp'];
			?>			
			<article id="article-single"> 
				<h1><a href="single_political_post.php?political_title=<?php echo $_SESSION['political_title']; ?>"><?php echo $political_title; ?></h1></a>
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
										?>		<li><a href="#"><img src="political_articles/<?php echo $array[$i]; ?>" data-large="political_articles/<?php echo $array[$i]; ?>" /></a></li>
									<?php	}	?>
											</ul>
										</div>
									</div>
									<!-- End Elastislide Carousel Thumbnail Viewer -->
								</div><!-- rg-thumbs -->
							</div>
							<p><?php echo $political_description; ?></p>
						</div> <!-- .prl-entry-content -->
					</div>
					<div class="prl-span-3 prl-entry-meta">
						<div class="prl-article-meta">
						<p class="rating-head">Details</p>
							<p style='font-size: 8pt;'><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;<?php echo date('D F j\t\h, Y',strtotime($political_time_stamp)); ?></p> 
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
						$comments = $comment->fetch_comments($political_title);
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
								<div class="prl-comment-meta"><?php echo date('D F j\t\h, H:i a, Y',strtotime($comment_time_stamp)); ?></div>
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
								<form role="form" action="a_single_political_post.php" method="post">
									<div class="prl-span-6">
										<div class="prl-form-row">
											<label class="prl-form-label" for="article_title">Article Title</label>
											<div class="prl-form-controls ">
												<input id="article_title" type="text" value="<?php echo $political_title;?>" disabled >
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
<?php
	}
?>