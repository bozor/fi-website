<?php
	$x = rand(1,3);
	$y = rand(1,3);
	$ans = $x * $y;
	session_start();
	$_SESSION['x'] = $x;
	$_SESSION['y'] = $y;
	$_SESSION['answer'] = $ans; 
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>new title</title>

<link rel="stylesheet" type="text/css" href="css/reset-min.css" />
<link rel="stylesheet" type="text/css" href="css/screen.css" />

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3.12&sensor=false"></script>
<script type="text/javascript" src="js/tile.stamen.js"></script>
<script type="text/javascript" src="js/jquery.tweet.min.js"></script>
<script type="text/javascript" src="js/scrollTo.min.js"></script>
<script type="text/javascript" src="js/isotope.min.js"></script>
<script type="text/javascript" src="js/fastclick.js"></script>
<script type="text/javascript" src="js/common.js"></script>

<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="css/ie.css" />
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
	<script type="text/javascript" src="js/ie9.js"></script>
<![endif]-->

</head>
<body>
	<header id="top">
		<div class="content">
			<div id="header-overlay">
				<a href="#" id="logo">logo</a>
				
				<span id="mobile-menu"></span>
			</div>
			<ol id="nav">
				<li><a href="#">Home</a></li>
				<li id="nav-about">
					<a href="#">Section 1</a>
					<div>
						<ul>
							<li><a href="#">Item 1</a></li>
							<li><a href="#">Item 2</a></li>
						</ul>
					</div>
				</li>
				<li id="nav-products">
					<a href="#">Section 2</a>
					<div>
						<ul>
							<li><a href="#">Item 1</a></li>
							<li><a href="#">Item 2</a></li>
							<li><a href="#">Item 3</a></li>
							<li><a href="#">Item 4</a></li>
						</ul>
					</div>
				</li>
				<li id="nav-application">
					<a href="#">Section 3</a>
					<div>
						<ul>
							<li><a href="#">Item 1</a></li>
						</ul>
					</div>
				</li>
				<li id="nav-news">
					<a href="#">Section 4</a>
					<div>
						<ul>
							<li><a href="#">Item 1</a></li>
							<li><a href="#">Item 2</a></li>
							<li><a href="#">Item 3</a></li>
							<li><a href="#">Item 4</a></li>
						</ul>
					</div>
				</li>
				<li id="nav-contact">
					<a href="#">Section 5</a>
					<div>
						<ul>
							<li><a href="#">Item 1</a></li>
							<li><a href="#">Item 2</a></li>
						</ul>
					</div>
				</li>
			</ol>
		</div>
	</header>
	<section id="main">
		<div id="wrapper">
			<article id="splash">
				<div id="map"></div>
			<!--<div class="flexible-container">
				<iframe id="map" width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
			</div>-->
			</article>
			<div class="col-3">
				<article id="content">
					<h1>Content</h1>
				</article>
				<article id="other">
					additional
					<div class="twitter"></div>
				</article>
				<article id="links">
					<div>
						<ul>
							<li><a href="#">A link</a></li>
						</ul>
					</div>
				</article>
			</div>
		</div>
	</section>
	<footer>
		<div class="content">
			<div id="footer-text">
				<a id="back-to-top">Top</a>
				<p id="copyright">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<p id="footer-address">Donec tristique tempus ligula elementum vehicula. In ultricies pretium nisl vel eleifend. Nulla facilisi. Nullam
				dignissim tincidunt sapien, in adipiscing nisi tincidunt non.</p>
			</div>
			<ol>
				<li><a href="#">Home</a></li>
				<li>
					<a href="#">Section 1</a>
					<div>
						<ul>
							<li><a href="#">Item 1</a></li>
							<li><a href="#">Item 2</a></li>
						</ul>
					</div>
				</li>
				<li>
					<a href="#">Section 2</a>
					<div>
						<ul>
							<li><a href="#">Item 1</a></li>
							<li><a href="#">Item 2</a></li>
							<li><a href="#">Item 3</a></li>
							<li><a href="#">Item 4</a></li>
						</ul>
					</div>
				</li>
				<li>
					<a href="#">Section 3</a>
					<div>
						<ul>
							<li><a href="#">Item 1</a></li>
						</ul>
					</div>
				</li>
				<li>
					<a href="#">Section 4</a>
					<div>
						<ul>
							<li><a href="#">Item 1</a></li>
							<li><a href="#">Item 2</a></li>
							<li><a href="#">Item 3</a></li>
							<li><a href="#">Item 4</a></li>
						</ul>
					</div>
				</li>
				<li>
					<a href="#">Section 5</a>
					<div>
						<ul>
							<li><a href="#">Item 1</a></li>
							<li><a href="#">Item 2</a></li>
						</ul>
					</div>
				</li>
			</ol>
			
		</div>
	</footer>
</body>
</html>