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
<title>new title test</title>

<link rel="stylesheet" type="text/css" href="css/reset-min.css" />
<link rel="stylesheet" type="text/css" href="css/screen.css" />

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3.12&sensor=false"></script>
<script type="text/javascript" src="js/tile.stamen.js"></script>
<script type="text/javascript" src="js/jquery.tweet.min.js"></script>
<script type="text/javascript" src="js/scrollTo.min.js"></script>
<script type="text/javascript" src="js/isotope.min.js"></script>
<script type="text/javascript" src="js/fastclick.js"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
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
					<form id="contact_form" action="mailer.php" method="post">
						<ul>
							<li>
								<label>Your Name</label>
								<input type="text" id="form-name" name="form-name" class="text required" />
								<input type="hidden" id="control" />
							</li>
							<li>
								<label>Your Email</label>
								<input type="text" id="form-email" name="form-email" class="text required email" />
							</li>
							<li>
								<label>Your Phone Number</label>
								<input type="text" id="form-phone" name="form-phone" class="text" />
							</li>
							<li>
								<label>Type of Enquiry</label>
								<select name="form-enquiry">
									<option value="z">Please select...</option>
									<option value="a">Sales</option>
									<option value="b">Technical</option>
									<option value="c">Support</option>
								</select>
							</li>
							<li class="option">
								<div class="a">
									<label>Your Company</label>
									<input type="text" id="form-company" name="form-company" class="text" />
									<label>Your Country</label>
									<input type="text" id="form-country" name="form-country" class="text" autocomplete="off" />
									<div id="autocomplete-container">
										<div id="autocomplete"></div>
									</div>
								</div>
								<div class="c">
									<label>Serial No.</label>
									<input type="text" id="form-serial" name="form-serial" class="text" />
									<label>Product</label>
									<input type="text" id="form-product" name="form-product" class="text" />
								</div>
							</li>
							<li class="message">
								<label>Your Message</label>
								<textarea cols="1" rows="8" id="form-message" name="form-message"></textarea>
							</li>
							<li class="control">
								<span>Please answer this simple maths question to show us you are human and not a machine:</span>
								<div>
									<label><?php echo($x); ?> &times; <?php echo($y); ?> =</label>
									<input type="text" id="control" name="control" class="text small math" />
									<label class="temp"></label>
								</div>
							</li>
							<li><button type="submit">send</button></li>
						</ul>
					</form>
					<div id="return"></div>
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
	
	<script type="text/javascript">
		$(function(){
			Ui.contactForm.init(<?php echo($ans) ?>);
			Ajax.countryAutocomplete();
		});
	</script>
</body>
</html>
