<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
<title>home</title>

<?php include("includes/common.php") ?>

</head>

<body>
	<?php include("includes/header.php") ?>
	
	<article id="main">
		<section id="splash">
			<div class="splash-inner">
				<img src="images/splash/home.jpg" />
				<!--<a href="">
					
					<span>
						<span class="splash-title">
							<strong>Fianium</strong>
							<span>Worldwide Supplier of<br/>Ultrafast Fiber Lasers</span>
						</span>
						<span class="splash-cta">Discover our product range &rsaquo;
					</span>
				</a>-->
			</div>
			<div class="splash-bottom">
				<div class="splash-inner">
					<a href="#">
						<strong>Fianium</strong>
						<span>Worldwide Supplier of<br/>Ultrafast Fiber Lasers</span>
					</a>
					<span class="splash-cta">Discover our product range &rsaquo;</span>
				</div>
			</div>
		</section>
		<div id="wrapper">
			<div class="col-3">
				<section id="content">
					<h1>Welcome to Fianium - ultrafast fiber lasers</h1>
					<p class="large">Fianium is a fiber laser company focused on the manufacture and development of ultrafast, high power laser systems covering a wavelength range from 240nm to 2500nm.</p>
					<p>Ultrafast Fiber lasers, including picosecond lasers, femtosecond lasers and Supercontinuum sources are the singular focus of Fianium.</p>
					<p>Biophotonics applications such as fluorescence microscopy, imaging and spectroscopy are the primary applications for Supercontinuum sources.</p>
					<p>Medical therapy and ultrafast material processing are some typical applications of the high power and high energy picosecond and femtosecond fiber lasers.</p>
				</section>
				<div id="narrow">
					<section id="other">
						<div class="latest-tweets">
							<h2>latest tweets</h2>
							<div class="twitter"></div>
							<p><a href="https://twitter.com/FianiumLtd" target="_blank">Follow us on twitter</a></p>
						</div>
					</section>
					<section id="links">
						<!--<div>
							<ul>
								<li><a href="#">A link</a></li>
							</ul>
						</div>-->
						<div class="grey-box">
							<h2>Ex-demo equipment for sale</h2>
							<p><a href="#">Click here for more information</a></p>
						</div>
						<div class="red-box">
							<h2>Latest news</h2>
							<p><strong>06.01.2014:</strong> Fianium Ship 1000th Supercontinuum Fiber Laser.</p>
							<p><a href="#">Read more</a></p>
						</div>
					</section>
				</div>
			</div>
		</div>
	</article>
	
	<?php include("includes/footer.php") ?>
	<script type="text/javascript" src="js/jquery.tweet.min.js"></script>
	<script type="text/javascript">
		$(function(){
			Ui.twitter();
			
			Ui.setActiveNav($('#nav-home'));
		});
	</script>
</body>
</html>
