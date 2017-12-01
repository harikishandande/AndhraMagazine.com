<?php
session_start();
include('includes/article.php');
include('includes/connection.php');
	if(isset($_SESSION['admin']))
	{	
	   if(isset($_POST['poll']))
	   {
		$poll = $_POST['poll'];
		$query = $pdo -> prepare('INSERT INTO votes (choice_id,title_id) VALUES (?,?)');
		 $query->bindValue(1, $poll);
		 $query->bindValue(2, $_SESSION['poll_id']);
		 $query->execute();
		 $num = $query->rowCount();
		 if($num==1)
		 {
			header('Location: a_single_poll.php');
			exit();
		 }
   	   }
		if(isset($_POST['submitchoices']))
	   {		
			$array=$_POST['choice'];
			if(empty($array))
			{
				$error="All fields are required !";
			}
			else
			{
				foreach($array as $choice)
				{	
					
					if(strlen($choice)>0)
					{
						
						$query = $pdo->prepare('INSERT into choices (title_id,choice) VALUES(?,?)');
							$query->bindValue(1, $_SESSION['poll_id']);
							$query->bindValue(2, $choice);
							$query->execute();
							header('Location: a_single_poll.php');
					}
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
	
		<link href="./poll_css/custom.css?v=1.0.2" rel="stylesheet">
  <link href="./poll_skins/all.css?v=1.0.2" rel="stylesheet">
  <script src="./poll_js/jquery.js"></script>
  <script src="./poll_js/icheck.js?v=1.0.2"></script>
  <script src="./poll_js/custom.min.js?v=1.0.2"></script>
  
  <script type="text/javascript" src="reCopy.js"></script>
	<script type="text/javascript">
	$(function()
	{
	var removeLink = ' <a class="btn btn-danger btn-xs" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false">remove</a>';
	$('a.add').relCopy({ append: removeLink});	
	});
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
							<li class="menu_item-home current"><a href="a_index.php"><i class="fa fa-home"></i> Add User</a>
							<li ><a href="a_all_movies.php"><i class="fa fa-film"></i> View Movies</a></li>
							<li ><a href="a_all_politicals.php"><i class="fa fa-bullhorn"></i>View Political</a></li>
							<li class="menu_item-home current">
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
        <section id="main" class="prl-span-9">
			<?php 
							$_SESSION['poll_id'] = $_GET['id'];
							$function = new Article;
							$functions = $function->polltitle($_GET['id']);
							foreach ($functions as $function)
							{	
								$function1 = new Article;
								$functions1 = $function1->allpollschoices($function['id']);
							?>
			<article id="article-single"> 
				<h1><a href="single.html"><?php echo $function['title']; ?></a></h1>
				<hr class="prl-grid-divider">
				<div class="prl-grid">	
					<div class="prl-span-9 prl-span-flip">
						<div class="prl-entry-content">
							<div class="demo-list clear">
							<form action="add_choices.php" method="POST">
								  <ul>
								  <?php
										foreach ($functions1 as $function1)
										{
								  ?>
									<li>
									  <input type="radio" id="<?php echo $function1['id']; ?>" name="poll" value="<?php echo $function1['id']; ?>" checked>
									  <label for="input-1"><?php echo $function1['choice']; ?></label>
									</li>
									
								  <?php
								  }
								  ?>
								  </ul>
								  <div class="prl-form-row">
										<button class="prl-button prl-button-primary" name="submit" type="submit">Vote</button>
								  </div>
							</form>	
								  <script>
								  $(document).ready(function(){
									var callbacks_list = $('.demo-callbacks ul');
									$('.demo-list input').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){
									  callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
									}).iCheck({
									  checkboxClass: 'icheckbox_square-red',
									  radioClass: 'iradio_square-red',
									  increaseArea: '20%'
									});
								  });
								  </script>
							</div>
						</div> <!-- .prl-entry-content -->
					<form action="add_choices.php" method="POST">
						<div class="control-group">
										<div class="controls">
											<div class="clone"> 
												<input class="input span12" type="text" name="choice[]" placeholder="New choice"/>
											</div>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div>
												<a href="#" class="add btn btn-info btn-mini" rel=".clone">Add More</a>
											</div>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											 <button class="btn btn-success btn-large" name="submitchoices" type="submit" >Submit</button>
										</div>
									</div>
					</form>
					</div>
					<div class="prl-span-3 prl-entry-meta">
						<div class="prl-article-meta">
							<span><i class="fa fa-calendar-o"></i> Nov 18th, 2013</span> 
							<span><a href="#comment"><i class="fa fa-comment-o"></i> 23</a></span>
							<i class="fa fa-eye"></i> 123
						</div>
						<hr class="prl-article-divider">
							<p class="rating-head">User rating: 3.76 (440)</p>
							<p class="prl-post-rating prl-user-rating">
								<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i>
							</p>						
						<hr class="prl-article-divider">
							<ul class="prl-list prl-list-sharing">
								<li class="header">SHARING</li>
								<li><a href="#"><i class="fa fa-facebook-square"></i> Facebook</a></li>
								<li><a href="#"><i class="fa fa-twitter-square"></i> Twitter</a></li>
								<li><a href="#"><i class="fa fa-google-plus-square"></i> Google plus</a></li>
								<li><a href="#" onclick="window.print();" id="print-page" ><i class="fa fa-print"></i> Print this article</a></li>
							</ul>
						<hr class="prl-article-divider">
							<p class="prl-article-tags"><span class="prl-article-tags-header">TAGS:</span> <a href="#">News</a>, <a href="#">Wordpress</a>, <a href="#">HTML</a>, <a href="#">CSS</a>, <a href="#">Web Design</a></p>
					</div>
			   
				</div> <!-- .prl-grid -->
			</article>
			<?php } ?>
			<hr class="prl-grid-divider">
			<div class="prl-article-author clearfix">
				<img src="http://placekitten.com/100/100" class="author-avatar" width="100" height="100" alt="Author" >
				<div class="author-info">
					<h5>PressLayer</h5>
					<p>Donec et ligula mauris, vel feugiat urna. Donec at neque non eros vestibulum posuere lacinia sit amet orci. Maecenas non mauris eu augue consectetur pharetra at sit amet leo.</p>
				</div>
			</div>
			
			<div class="prl-homepage-widget prl-panel">
				<h5 class="prl-block-title">Related articles  <span class="prl-block-title-link right"><a href="#">ALL POSTS <i class="fa fa-caret-right"></i></a></span></h5>
				<div class="prl-grid prl-grid-divider">
					<div class="prl-span-4">
						<article class="prl-article">
							<a class="prl-thumbnail" href="#">
								<span class="prl-overlay">
									<img src="assets/images/_p/1.jpg" alt="Praesent lectus orci">
									<span class="prl-overlay-area o-video"></span>
								</span>
							</a>
							<h3 class="prl-article-title"><a href="#">Praesent lectus orci, volutpat ultrices</a> <span class="prl-badge prl-badge-warning">Video</span></h3> 
							<div class="prl-article-meta">
								<i class="fa fa-calendar-o"></i> Nov 18th, 2013&nbsp;&nbsp;<i class="fa fa-comment-o"></i> 23
							</div>    
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lectus orci, volutpat ultrices porta ac, ultricies eget sem.</p>
						</article>
					</div>
					<div class="prl-span-4">
						<article class="prl-article">
							<a class="prl-thumbnail" href="#">
								<span class="prl-overlay">
									<img src="assets/images/_p/1.jpg" alt="Praesent lectus orci">
									<span class="prl-overlay-area o-video"></span>
								</span>
							</a>
							<h3 class="prl-article-title"><a href="#">Praesent lectus orci, volutpat ultrices</a> <span class="prl-badge prl-badge-warning">Video</span></h3> 
							<div class="prl-article-meta">
								<i class="fa fa-calendar-o"></i> Nov 18th, 2013&nbsp;&nbsp;<i class="fa fa-comment-o"></i> 23
							</div>    
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lectus orci, volutpat ultrices porta ac, ultricies eget sem.</p>
						</article>
					</div>
					<div class="prl-span-4">
						<article class="prl-article">
							<a class="prl-thumbnail" href="#">
								<span class="prl-overlay">
									<img src="assets/images/_p/1.jpg" alt="Praesent lectus orci">
									<span class="prl-overlay-area o-video"></span>
								</span>
							</a>
							<h3 class="prl-article-title"><a href="#">Praesent lectus orci, volutpat ultrices</a> <span class="prl-badge prl-badge-warning">Video</span></h3> 
							<div class="prl-article-meta">
								<i class="fa fa-calendar-o"></i> Nov 18th, 2013&nbsp;&nbsp;<i class="fa fa-comment-o"></i> 23
							</div>    
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lectus orci, volutpat ultrices porta ac, ultricies eget sem.</p>
						</article>
					</div>
				</div>
			</div>    		   
			<div id="comment" class="prl-panel">
			<h5 class="prl-block-title">2 comments</h5>
				<ul class="prl-comment-list">
					<li>
						<article class="prl-comment">
							<header class="prl-comment-header">
								<img class="prl-comment-avatar" src="50.jpg" alt="">
								<h4 class="prl-comment-title">Author</h4>
								<div class="prl-comment-meta">Written by Super User on 12 April 2012. Posted in Blog</div>
							</header>
							<div class="prl-comment-body">
								<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
								<button class="prl-button small light">Reply</button>
							</div>
						</article>
						<ul>
							<li>
								<article class="prl-comment">
									<header class="prl-comment-header">
										<img class="prl-comment-avatar" src="50.jpg" alt="">
										<h4 class="prl-comment-title">Author</h4>
										<div class="prl-comment-meta">Written by Super User on 12 April 2012. Posted in Blog</div>
									</header>
									<div class="prl-comment-body">
										<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
										<button class="prl-button small light">Reply</button>
									</div>
								</article>
								<ul>
									<li>
										<article class="prl-comment">
											<header class="prl-comment-header">
												<img class="prl-comment-avatar" src="50.jpg" alt="">
												<h4 class="prl-comment-title">Author</h4>
												<div class="prl-comment-meta">Written by Super User on 12 April 2012. Posted in Blog</div>
											</header>
											<div class="prl-comment-body">
												<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
												<button class="prl-button small light">Reply</button>
											</div>
										</article>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<article class="prl-comment">
							<header class="prl-comment-header">
								<img class="prl-comment-avatar" src="50.jpg" alt="">
								<h4 class="prl-comment-title">Author</h4>
								<div class="prl-comment-meta">Written by Super User on 12 April 2012. Posted in Blog</div>
							</header>
							<div class="prl-comment-body">
								<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
								<button class="prl-button small light">Reply</button>
							</div>
						</article>
					</li>
					<li>
						<article class="prl-comment">
							<header class="prl-comment-header">
								<img class="prl-comment-avatar" src="50.jpg" alt="">
								<h4 class="prl-comment-title">Author</h4>
								<div class="prl-comment-meta">Written by Super User on 12 April 2012. Posted in Blog</div>
							</header>
							<div class="prl-comment-body">
								<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
								<button class="prl-button small light">Reply</button>
							</div>
						</article>
					</li>
				</ul>

				<div id="respond">
					<h5 class="prl-block-title">Leave a reply</h5>
					<form class="prl-form prl-form-stacked">
						<fieldset>
							<div class="prl-grid">
								<div class="prl-span-6">
									<div class="prl-form-row">
										<label class="prl-form-label" for="name">Name *</label>
										<div class="prl-form-controls prl-comment-name"><input id="name" type="text" placeholder="" ></div>
									</div>
									<div class="prl-form-row">
										<label class="prl-form-label" for="email">Email *</label>
										<div class="prl-form-controls prl-comment-email"><input id="email" type="text" placeholder="" ></div>
									</div>
								</div>
								<div class="prl-span-6">
									<div class="prl-form-row">
										<label class="prl-form-label" for="website">Website</label>
										<div class="prl-form-controls prl-comment-url"><input id="website" type="text" placeholder="" ></div>
									</div>
									<div class="prl-form-row">
										<label class="prl-form-label" for="anti-spam">Anti-Spam *</label>
										<div class="prl-form-controls"><input id="anti-spam" type="text" placeholder="" class="prl-form-width-small" > <span class="prl-form-help-inline"><img src="assets/images/spam.png" alt="anti spam"></span></div>
									</div>
								</div>
								<div class="prl-span-12">
									<div class="prl-form-row space-top">
										<label class="prl-form-label" for="form-s-t">Comment *</label>
										<div class="prl-form-controls">
											<textarea id="form-s-t" cols="30" rows="8" placeholder="" class="prl-width-1-1"></textarea>
										</div>
									</div>
								</div>
								<div class="prl-span-12">
									<div class="prl-form-row space-top">
										<button class="prl-button prl-button-primary" type="submit">Post Comment</button>
										<em class="prl-form-help-inline">Required fields are marked (*)</em>

									</div>
								</div>
							</div>
							
						</fieldset>
					</form>
				</div>
			</div><!-- #comment -->			  
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