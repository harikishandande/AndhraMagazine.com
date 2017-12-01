<?php
session_start();
include('includes/article.php');
include('includes/connection.php');
	if(isset($_SESSION['admin']))
	{	
		$username = $_SESSION['username'];
			$user =  new Article;
			$users = $user->fetch_admin_status($username);
		$user_status = $users['status'];
		
		if(isset($_GET['username']))
		{
			$username = $_GET['username'];
			$sql = "DELETE FROM admin WHERE username = ? ";
			$query = $pdo->prepare($sql);
			$query->bindValue("1", $username);
			$result = $query->execute();
		}
				
		if(isset($_POST['add_user']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$status = $_POST['status'];
			
			if(empty($username) || empty($password) || empty($status))
			{
				$error='All fields are required !!';
			}
			else
			{
				$query = $pdo->prepare('INSERT into admin(username,password,status)values(?,?,?)');
					$query->bindValue(1, $username);
					$query->bindValue(2, $password);
					$query->bindValue(3, $status);
					$result = $query->execute();
				if($result)
				{
					$success='User added successfully !!';
				}
				else
				{
					$error='Username already exist, TRY AGAIN !!';
				}
			}
		}
		
		if(isset($_POST['change_info']))
		{
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			
			if(empty($phone) || empty($email))
			{
				$error1='All details are required !!';
			}
			else
			{
				$sql = "UPDATE contact_info SET phone = ?, email = ?";
				$query = $pdo->prepare($sql);
				$query->bindValue("1", $phone);
				$query->bindValue("2", $email);
				$result = $query->execute();
				if($result)
				{
					$success1='Contact-Info updated successfully !!';
				}
				else
				{
					$error1='Entered valid details, TRY AGAIN !!';
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
	
	<style>
	
	</style>

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
				<div id="main" class="prl-span-12"> 
					<div class="prl-span-12">
				<?php
				if($user_status == 'administrator')
				{
				?>	
			<?php 	if(isset($error))
					{ 	?>
						<h4 style ="color:#ff0000;text-align:center"><?php echo $error; ?> </h4>
			<?php	} 	
					if(isset($success))
					{ ?>
						<h4 style ="color:green;text-align:center"><?php echo $success; ?> </h4>
			<?php	} ?>
			  
						<h5 class="prl-block-title sienna">Add Administrator / Controller</h5>
						
						<form role="form" action="a_index.php" method="POST" enctype="multipart/form-data">
							<div class="prl-form-row prl-login-username">
								<label>Username</label>
								<input type="text" placeholder="Username" name="username" class="prl-width-1-1">
							</div>
							<div class="prl-form-row prl-login-password">
								<label>Password</label>
								<input type="text" placeholder="Password" name="password" class="prl-width-1-1">
							</div>	
							<div class="prl-form-row prl-login-password">
								<label>Status</label>
								<select class="prl-form-control" name="status">
									<option>[  SELECT  ]</option>
									<option>Controller</option>
									<option>Administrator</option>
								</select>
							</div>
							<div class="prl-form-row">
								<button class="prl-button prl-button-primary" name="add_user" type="submit">Add User</button>
							</div>
						</form>	
						<br/>
						
						<h5 class="prl-block-title sienna">View Controller</h5>
						<div class="widget prl-panel">
							<script>
								$(function () {
									$("#accordion").jAccordion(); 
								});	
							</script>
							<div id="accordion" class="prl-accordion">
						<?php 
							$user =  new Article;
							$users = $user->fetch_admin_all();	
							foreach($users as $user)
							{
						?>		<section>
									<a href="#acc1" id="acc1" class="head"><?php echo $user['username']; ?></a>
									<div class="acc-content">
										<a style="color:red;" href="a_index.php?username=<?php echo $user['username']; ?>">Delete</a>
										<h4>User name : <?php echo $user['username']; ?></h4>
											
										<h4>User password : <?php echo $user['password']; ?></h4>
										
										<h4>User status : <?php echo $user['status']; ?></h4>
									</div>
								</section>
					<?php	}	?>
							</div>
						</div>
					<br/>	
		<?php	} ?>
					
					<?php
						
						$contact = new Article;
						$contact_info = $contact->fetch_contact_info();	
						$phone = $contact_info['phone'];
						$email = $contact_info['email'];
						
					?>
			<?php 	if(isset($error1))
					{ 	?>
						<h4 style ="color:#ff0000;text-align:center"><?php echo $error1; ?> </h4>
			<?php	} 	
					if(isset($success1))
					{ ?>
						<h4 style ="color:green;text-align:center"><?php echo $success1; ?> </h4>
			<?php	} ?>
						<h5 class="prl-block-title sienna">Change Contact Info</h5>
						<form role="form" action="a_index.php" method="POST" enctype="multipart/form-data">
							<div class="prl-form-row prl-login-username">
								<label>Phone no</label>
								<input type="text" placeholder="Phone No" name="phone" value="<?php echo $phone; ?>" class="prl-width-1-1" />
							</div>
							<div class="prl-form-row prl-login-username">
								<label>Email</label>
								<input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>" class="prl-width-1-1" />
							</div>
							<div class="prl-form-row">
								<button class="prl-button prl-button-primary" name="change_info" type="submit">Change Number</button>
							</div>
						</form>	
					</div>
				</div>
			</div><!--.prl-grid-->
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