<?php
session_start();
include('includes/article.php');
include('includes/connection.php');

	if(isset($_GET['delete_comment']))
	{
		$id = $_GET['delete_comment'];
			
			$sql = "DELETE FROM comments WHERE id = ? ";
			$query = $pdo->prepare($sql);
			$query->bindValue("1", $id);
			$query->execute();
			
		header('Location: a_single_political_post_edit.php');
	}
	if(isset($_GET['edit_title']))
	{
		$_SESSION['political_title'] = $_GET['edit_title'];
	}
	if(isset($_SESSION['admin']) && isset($_SESSION['political_title']))
	{	
		if(isset($_POST['update_political_article']))
		{
			$political_title = $_POST['political_title'];
			$_SESSION['political_title'] = $political_title;
			$political_description = $_POST['political_description'];
			$political_tags = $_POST['political_tags'];
			$_SESSION['political_tags'] = $political_tags;
			
			if(empty($political_title) || empty($political_description) || empty($political_tags))
			{
				$error='All fields are required !!';
			}
			else
			{
				$political_username = $_SESSION['username'];
				$id = $_SESSION['id'];
				$sql = "UPDATE political SET political_title = ?, political_description = ?, political_tags = ?, political_username = ? WHERE id = ?";
				$query = $pdo->prepare($sql);
				$query->bindValue("1", $political_title);
				$query->bindValue("2", $political_description);
				$query->bindValue("3", $political_tags);
				$query->bindValue("4", $political_username);
				$query->bindValue("5", $id);
				$query->execute();
				
				$old_political_title = $_SESSION['old_political_title'];
				
				$sql = "UPDATE comments SET article_title = ? WHERE article_title = ?";
				$query = $pdo->prepare($sql);
				$query->bindValue("1", $political_title);
				$query->bindValue("2", $old_political_title);
				$query->execute();
				
				$sql = "UPDATE views SET article_title = ? WHERE article_title = ?";
				$query = $pdo->prepare($sql);
				$query->bindValue("1", $political_title);
				$query->bindValue("2", $old_political_title);
				$query->execute();
				
				$tags = explode(',', $political_tags);
				$size = sizeof($tags);
				for($i = 0;$i < $size;$i++)
				{
					$query = $pdo->prepare('INSERT into tags(tags)values(?)');
					$query->bindValue(1, $tags[$i]);
					$query->execute();
				}
				
				header("Location: a_single_political_post.php?political_title=$political_title");
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
			<?php
					$political_title = $_SESSION['political_title'];
					$_SESSION['old_political_title'] = $political_title;
					$political_article =  new Article;
					$political_articles = $political_article->fetch_political_article($political_title);
					$i=0;
						$id = $political_articles['id'];
						$_SESSION['id'] = $id;
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
						$political_username = $political_articles['political_username'];
						$political_time_stamp = $political_articles['political_time_stamp'];
			?>			
			<article id="article-single"> 
				<form role="form" action="a_single_political_post_edit.php" method="post">
				<h1>
					<div class="prl-form-row">
						<div class="prl-form-controls prl-comment-name">
							<input type="text" name="political_title" class="prl-form-width-large" value="<?php echo $political_title; ?>">
						</div>
					</div>
				</h1>
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
							<textarea cols="30" rows="20" name="political_description" class="prl-width-1-1" ><?php echo $political_description; ?></textarea>
								<div class="prl-span-12">
									<div class="prl-form-row space-top">
										<button class="prl-button prl-button-primary" name="update_political_article" type="submit">Update Political Article</button>
									</div>
								</div>
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
									<div class="prl-form-row">
										<div class="prl-form-controls prl-comment-name">
											<input type="text" name="political_tags" class="prl-form-width-large" value="<?php echo $political_tags; ?>" >
										</div>
									</div>
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
				</form>
			</article>
			 <div id="comment" class="prl-panel">
			<h5 class="prl-block-title"><?php echo $article_count; ?> comments</h5>
				<ul class="prl-comment-list">
				<?php	$comment = new Article;
						$comments = $comment->fetch_comments($political_title);
						foreach($comments as $comment)
						{
							$id = $comment['id'];
							$name = $comment['name'];
							$email = $comment['email'];
							$comment_time_stamp = $comment['comment_time_stamp'];
							$single_comment = $comment['comment'];
				?>	<li>
						<article class="prl-comment">
							<header class="prl-comment-header">
								<img class="prl-comment-avatar" src="50.jpg" alt="">
								<h4 class="prl-comment-title"><?php echo $name; ?><a href="a_single_political_post_edit.php?delete_comment=<?php echo $id; ?>" style="float:right;font-size:15px;color:red;margin-right:15px;" title="Delete Comment" >x</a></h4>
								<div class="prl-comment-meta">Written by <?php echo $email; ?> on <?php echo date('D F j\t\h, H:i a, Y',strtotime($comment_time_stamp)); ?></div>
							</header>
							<div class="prl-comment-body">
								<p><?php echo $single_comment; ?></p>
							</div>
						</article>
					</li>
				<?php 	}	?>
				</ul>
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